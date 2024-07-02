<?php

namespace App\Controller;

use App\Entity\Trainer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TrainerController extends AbstractController
{
    #[Route('/trainers', name: 'trainer_all')]
    public function index(EntityManagerInterface $em): Response
    {
        $trainers = $em->getRepository(Trainer::class)->findAll();

        return $this->render('trainer/index.html.twig', [
            'trainers' => $trainers,
            'articles' => null
        ]);
    }

    #[Route('/professor/{id}', name: 'trainer_show', defaults:['id' => 1], requirements: ['id' => '\d+'])]
    public function show(Trainer $trainer): Response{
        
        return $this->render('trainer/show.html.twig', [
            'trainer' => $trainer,
            
        ]);
    }
}
