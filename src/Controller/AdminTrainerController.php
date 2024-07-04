<?php

namespace App\Controller;

use App\Entity\Trainer;
use App\Form\TrainerType;
use App\Repository\TrainerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function createTrainer(Request $request):Response {

        $trainer = new Trainer();
        $form = $this->createForm(TrainerType::class, $trainer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()  ) {
          
            dd($form->getData());

            return $this->redirectToRoute('app_admin_trainer');
        }

        return $this->render('admin/trainer/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
