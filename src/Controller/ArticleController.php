<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use Doctrine\ORM\Tools\Pagination\Paginator;

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
    // #[IsGranted('show', 'article', 'Article not found', 404)]
    #[IsGranted('show', 'article')]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' =>  $article ,
        ]);
    }


    #[Route('/article/create', name: 'create_article')]
    public function createapprentice(Request $request, EntityManagerInterface $em): Response
    {

        $article = new Article();
        $form = $this->createForm(Article::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'article Created! Knowledge is power!');

            return $this->redirectToRoute('app_article');
        }

        return $this->render('admin/article/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
