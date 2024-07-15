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

class ApprenticeController extends AbstractController
{
    #[Route('/admin/apprentice', name: 'app_admin_apprentice')]
    public function index(ApprenticeRepository $apprenticeRepository): Response
    {
        $apprentices = $apprenticeRepository->findAll();

        return $this->render('admin/apprentice/list.html.twig', [
            'apprentices' => $apprentices,
        ]);
    }

    #[Route('/admin/apprentice/create', name: 'app_apprentice_create')]
    public function createapprentice(Request $request, EntityManagerInterface $em): Response
    {

        $apprentice = new Apprentice();
        $form = $this->createForm(ApprenticeType::class, $apprentice);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($apprentice);
            $em->flush();

            $this->addFlash('success', 'apprentice Created! Knowledge is power!');

            return $this->redirectToRoute('app_admin_apprentice');
        }

        return $this->render('admin/apprentice/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
