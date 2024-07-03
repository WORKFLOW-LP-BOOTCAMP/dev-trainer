<?php

namespace App\Controller;

use App\Entity\Trainer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TrainerController extends AbstractController
{
    #[Route('/trainers', name: 'trainer_trainers')]
    public function index(EntityManagerInterface $em): Response
    {
        $trainerRepository = $em->getRepository(Trainer::class); 

        $trainers = $trainerRepository->findAll() ;

        // permet d'afficher en arrêtant les scripts die 
        // dd($trainers) ;

        return $this->render('trainer/index.html.twig', [
            'trainers' => $trainers,
        ]);
    }
}
