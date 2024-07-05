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

class AdminTrainerController extends AbstractController
{
    #[Route('/admin/trainer', name: 'app_admin_trainer')]
    public function index(TrainerRepository $trainerRepository): Response
    {
        $trainers = $trainerRepository->findAll();

        return $this->render('admin/trainer/list.html.twig', [
            'trainers' => $trainers
        ]);
    }

    #[Route('/admin/trainer/create', name: 'app_trainer_create')]
    public function createTrainer(Request $request, EntityManagerInterface $em): Response
    {

        $trainer = new Trainer();
        $form = $this->createForm(TrainerType::class, $trainer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($trainer);
            $em->flush();

            $this->addFlash('success', 'Trainer Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_trainer');
        }

        return $this->render('admin/trainer/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/trainer/show/{id}', name: 'app_admin_trainer_show')]
    public function showTrainer(Trainer $trainer): Response
    {
        // Dans ce contrôleur on utilise le resolver

        return $this->render('admin/trainer/show.html.twig', [
            'trainer' => $trainer,
        ]);
    }

    #[Route('/trainers/{id}/edit', name: 'admin_update_trainer')]
    public function updateTrainer( Trainer $trainer, Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TrainerType::class, $trainer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($trainer);
            $em->flush();

            $this->addFlash('success', 'Trainer Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_trainer');
        }

        return $this->render('admin/trainer/edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    #[Route('/admin/trainer/delete/{id}', name: 'delete_trainer')]
    public function deleteTrainer(Trainer $trainer, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $trainer->getId(), $request->request->get('_token'))) {
            $em->remove($trainer);
            $em->flush();

            $this->addFlash('delete success', 'Trainer Created! Knowledge is power!');
        }

        return $this->redirectToRoute('app_admin_trainer');
    }
}
