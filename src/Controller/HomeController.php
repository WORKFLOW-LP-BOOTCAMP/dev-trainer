<?php

namespace App\Controller;

use App\Service\ModelDVF;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ModelDVF $model): Response
    {
        // la méthode retourne un tableau, on peut utiliser les clés du tableau directement à partir de la méthode
        $trainers = $this->data()['trainers'];
        $articles = [];

        foreach ($trainers as $trainer) {
            $articles =  array_merge($articles, $trainer['articles']);
        }

        $model->loadSavedModel();

        return $this->render('home/index.html.twig', [
            'trainers' => $trainers,
            'articles' => $articles,
            'predict_value' =>  $model->predict(['RUE', '75020', 'Appartement', 60, 3, 0])
        ]);
    }

    #[Route('/trainer/{id}', name: 'app_show', defaults: ['id' => 1], requirements: ['id' => '[1,2]'])]
    public function show(int $id): Response
    {

        // j'utilise use avec la fonction anonyme pour passer la valeur $id dans le contexte de la fonction anonyme, sans quoi la fonction anonyme ne verra pas la variable
        $trainer = array_filter($this->data()['trainers'], function ($trainer) use ($id) {
            if ($trainer['id'] == $id) return $trainer;
        });

        return $this->render('home/show.html.twig', [
            'trainer' => array_pop($trainer),
        ]);
    }


    private function data(): array
    {
        return [
            "trainers" => [
                [
                    "firstName" => "Antoine",
                    "lastName" => "L",
                    "id" => 1,
                    "profession" => "Professor Symfony",
                    "bio" => "Antoine L is a certified Symfony coach with over 10 years of experience.",
                    "articles" => [
                        [
                            "title" => "The Benefits of Morning Exercise",
                            "date" => "Nov 11",
                            "content" => "Exercising in the morning can boost your metabolism and energy levels throughout the day."
                        ],
                        [
                            "title" => "Healthy Eating Tips",
                            "date" => "Nov 10",
                            "content" => "Eating a balanced diet is crucial for maintaining good health and fitness."
                        ]
                    ]
                ],
                [
                    "firstName" => "Aurélien",
                    "lastName" => "S",
                    "id" => 2,
                    "profession" => "Professor React",
                    "bio" => "Aurélien has been teaching yoga for over 8 years and specializes in Vinyasa and Hatha yoga.",
                    "articles" => [
                        [
                            "title" => "The Power of Meditation",
                            "date" => "Nov 12",
                            "content" => "Meditation can help reduce stress and improve overall well-being."
                        ],
                        [
                            "title" => "Yoga for Beginners",
                            "date" => "Nov 5",
                            "content" => "Starting a yoga practice can be intimidating, but with these tips, you can get started with confidence."
                        ]
                    ]
                ]
            ]
        ];
    }
}
