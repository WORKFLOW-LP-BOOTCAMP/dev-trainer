<?php

namespace App\Controller;

use App\Repository\TrainerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
}
