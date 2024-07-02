<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ErrorController extends AbstractController
{
    #[Route('/error', name: 'app_error')]
    public function error404(): Response
    {
        return $this->render('error/index.html.twig', [
            'message' => 'Page Not Found 404',
        ]);
    }
}
