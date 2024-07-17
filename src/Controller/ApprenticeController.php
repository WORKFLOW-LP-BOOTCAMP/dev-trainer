<?php

namespace App\Controller;

use App\Entity\Apprentice;
use App\Form\ApprenticeType;
use App\Repository\ApprenticeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_ADMIN')]
#[Route('/admin',  name: 'app_admin_')]
class ApprenticeController extends AbstractController
{
    #[Route('/apprentice', name: 'apprentices')]
    public function index(ApprenticeRepository $apprenticeRepository): Response
    {
        $apprentices = $apprenticeRepository->findAll();

        return $this->render('admin/apprentice/list.html.twig', [
            'apprentices' => $apprentices,
        ]);
    }

    #[Route('/apprentice/create', name: 'create_apprentice')]
    public function createapprentice(Request $request, EntityManagerInterface $em): Response
    {

        $apprentice = new Apprentice();
        $form = $this->createForm(ApprenticeType::class, $apprentice);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($apprentice);
            $em->flush();

            $this->addFlash('success', 'apprentice Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_apprentices');
        }

        return $this->render('admin/apprentice/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
