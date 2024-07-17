<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' =>  $articleRepository->findAll() ,
        ]);
    }

    #[Route('/article/{id}', name: 'app_show_article')]
    #[IsGranted('show', 'article', 'Article not found', 404)]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' =>  $article ,
        ]);
    }
}
