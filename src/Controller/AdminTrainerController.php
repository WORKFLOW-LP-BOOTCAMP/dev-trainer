<?php

namespace App\Controller;

use App\Entity\Trainer;
use App\Form\TrainerType;
use App\Repository\TrainerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin',  name: 'app_admin_')]
class AdminTrainerController extends AbstractController
{
    #[Route('/trainer', name: 'trainers')]
    public function index(TrainerRepository $trainerRepository): Response
    {
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $trainers = $trainerRepository->findAll();

        return $this->render('admin/trainer/list.html.twig', [
            'trainers' => $trainers,
        ]);
    }

    #[Route('/trainer/create', name: 'create_trainer')]
    public function createTrainer(Request $request, EntityManagerInterface $em): Response
    {

        $trainer = new Trainer();
        $form = $this->createForm(TrainerType::class, $trainer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($trainer);
            $em->flush();

            $this->addFlash('success', 'Trainer Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_trainers');
        }

        return $this->render('admin/trainer/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/trainer/show/{id}', name: 'show_trainer')]
    public function showTrainer(Trainer $trainer): Response
    {
        // Dans ce contrôleur on utilise le resolver

        return $this->render('admin/trainer/show.html.twig', [
            'trainer' => $trainer,
        ]);
    }

    #[Route('/trainers/{id}/edit', name: 'update_trainer')]
    public function updateTrainer( Trainer $trainer, Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TrainerType::class, $trainer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($trainer);
            $em->flush();

            $this->addFlash('success', 'Trainer Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_trainers');
        }

        return $this->render('admin/trainer/edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    #[Route('/trainer/delete/{id}', name: 'delete_trainer')]
    public function deleteTrainer(Trainer $trainer, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $trainer->getId(), $request->request->get('_token'))) {
            $em->remove($trainer);
            $em->flush();

            $this->addFlash('delete success', 'Trainer Created! Knowledge is power!');
        }

        return $this->redirectToRoute('app_admin_trainers');
    }
}
