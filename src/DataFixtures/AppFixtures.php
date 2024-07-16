<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Subject;
use App\Entity\Trainer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
       
        // repository pour récupérer les données dans la base de données
        $articles = $manager->getRepository(Article::class)->findAll();
        $subjects = $manager->getRepository(Subject::class)->findAll();

        // boucle qui crée les trainers
        foreach ($this->trainers() as [
            'firstName' => $firsName,
            'lastName' => $lastName,
            'profession' => $profession,
            'bio' => $bio,
            'email' => $email
        ]) {
            $trainer = new Trainer();
            $trainer->setFirstName($firsName);
            $trainer->setLastName($lastName);
            $trainer->setEmail($email);
            $trainer->setProfession($profession);
            $trainer->setBio($bio);
            $trainer->setStars(random_int(1, 5));
            $plainPassword = '123';
            $hashedPassword = $this->passwordHasher->hashPassword($trainer, $plainPassword);
            $trainer->setPassword($hashedPassword);

            // on relie des articles au trainer, on associe des objets à l'entité Trainer
            $count = 0;
            $rand =  random_int(1, 3);
            shuffle($articles);
            while (count($articles) > 0 && $count < $rand) {
                $articleTrainer = array_pop($articles);
                $trainer->addArticle($articleTrainer);
                $count++;
            }

            // même chose pour les subjects 
            $count = 0;
            $countSubjects = count($subjects);
            $rand =  random_int(1, $countSubjects);
            shuffle($subjects) ;
            while( $count < $rand ){
                $trainer->addSubject($subjects[$count]);
                $count++;
            }

            $manager->persist($trainer);
        }

        $manager->flush();
    }

    public function trainers(): array
    {

        return  [
            [
                "firstName" => "Antoine",
                "lastName" => "L",
                "profession" => "Professor Symfony",
                "bio" => "Antoine L is a certified Symfony coach with over 10 years of experience.",
                "email" => "antoine.l@example.com"
            ],
            [
                "firstName" => "Marie",
                "lastName" => "M",
                "profession" => "JavaScript Developer",
                "bio" => "Marie M specializes in JavaScript frameworks and has been teaching for 8 years.",
                "email" => "marie.m@example.com"
            ],
            [
                "firstName" => "John",
                "lastName" => "D",
                "profession" => "Java Expert",
                "bio" => "John D has 15 years of experience in Java and software architecture.",
                "email" => "john.d@example.com"
            ],
            [
                "firstName" => "Claire",
                "lastName" => "B",
                "profession" => "Data Scientist",
                "bio" => "Claire B is a data science professional with a focus on machine learning.",
                "email" => "claire.b@example.com"
            ],
            [
                "firstName" => "Paul",
                "lastName" => "A",
                "profession" => "DevOps Engineer",
                "bio" => "Paul A has extensive experience in cloud computing and DevOps practices.",
                "email" => "paul.a@example.com"
            ],
            [
                "firstName" => "Emma",
                "lastName" => "C",
                "profession" => "Python Developer",
                "bio" => "Emma C is a Python expert with a passion for teaching programming to beginners.",
                "email" => "emma.c@example.com"
            ],
            [
                "firstName" => "Lucas",
                "lastName" => "T",
                "profession" => "AI Specialist",
                "bio" => "Lucas T has been working in artificial intelligence for over 12 years.",
                "email" => "lucas.t@example.com"
            ],
            [
                "firstName" => "Sophie",
                "lastName" => "G",
                "profession" => "Frontend Developer",
                "bio" => "Sophie G is a frontend development expert with a keen eye for design.",
                "email" => "sophie.g@example.com"
            ],
            [
                "firstName" => "Marc",
                "lastName" => "H",
                "profession" => "Backend Developer",
                "bio" => "Marc H has a decade of experience in backend development and databases.",
                "email" => "marc.h@example.com"
            ],
            [
                "firstName" => "Nina",
                "lastName" => "J",
                "profession" => "Mobile Developer",
                "bio" => "Nina J develops mobile applications for both Android and iOS platforms.",
                "email" => "nina.j@example.com"
            ],
            [
                "firstName" => "Alex",
                "lastName" => "K",
                "profession" => "Cybersecurity Expert",
                "bio" => "Alex K is a cybersecurity specialist with a background in ethical hacking.",
                "email" => "alex.k@example.com"
            ],
            [
                "firstName" => "Julien",
                "lastName" => "L",
                "profession" => "Cloud Architect",
                "bio" => "Julien L designs and manages cloud infrastructure solutions.",
                "email" => "julien.l@example.com"
            ],
            [
                "firstName" => "Elise",
                "lastName" => "N",
                "profession" => "Blockchain Developer",
                "bio" => "Elise N works on blockchain technologies and decentralized applications.",
                "email" => "elise.n@example.com"
            ],
            [
                "firstName" => "Tom",
                "lastName" => "P",
                "profession" => "Software Engineer",
                "bio" => "Tom P has a diverse background in software engineering and project management.",
                "email" => "tom.p@example.com"
            ],
            [
                "firstName" => "Isabelle",
                "lastName" => "Q",
                "profession" => "Database Administrator",
                "bio" => "Isabelle Q manages large-scale databases and ensures data integrity.",
                "email" => "isabelle.q@example.com"
            ],
            [
                "firstName" => "Hugo",
                "lastName" => "R",
                "profession" => "Network Engineer",
                "bio" => "Hugo R has expertise in network design and administration.",
                "email" => "hugo.r@example.com"
            ],
            [
                "firstName" => "Alice",
                "lastName" => "S",
                "profession" => "UX/UI Designer",
                "bio" => "Alice S focuses on creating user-friendly interfaces and enhancing user experience.",
                "email" => "alice.s@example.com"
            ],
            [
                "firstName" => "Maxime",
                "lastName" => "T",
                "profession" => "Project Manager",
                "bio" => "Maxime T oversees software development projects from inception to completion.",
                "email" => "maxime.t@example.com"
            ],
            [
                "firstName" => "Lea",
                "lastName" => "U",
                "profession" => "Full Stack Developer",
                "bio" => "Lea U is proficient in both frontend and backend development technologies.",
                "email" => "lea.u@example.com"
            ],
            [
                "firstName" => "Victor",
                "lastName" => "V",
                "profession" => "IT Consultant",
                "bio" => "Victor V provides expert advice on IT infrastructure and systems.",
                "email" => "victor.v@example.com"
            ],
            [
                "firstName" => "Celine",
                "lastName" => "W",
                "profession" => "Scrum Master",
                "bio" => "Celine W facilitates agile development processes and scrum methodologies.",
                "email" => "celine.w@example.com"
            ],
            [
                "firstName" => "Matthieu",
                "lastName" => "X",
                "profession" => "Game Developer",
                "bio" => "Matthieu X develops video games and interactive entertainment.",
                "email" => "matthieu.x@example.com"
            ],
            [
                "firstName" => "Fanny",
                "lastName" => "Y",
                "profession" => "QA Engineer",
                "bio" => "Fanny Y ensures the quality and reliability of software through rigorous testing.",
                "email" => "fanny.y@example.com"
            ],
            [
                "firstName" => "Louis",
                "lastName" => "Z",
                "profession" => "System Administrator",
                "bio" => "Louis Z manages and maintains IT systems and servers.",
                "email" => "louis.z@example.com"
            ],
            [
                "firstName" => "Chloe",
                "lastName" => "A",
                "profession" => "Technical Writer",
                "bio" => "Chloe A creates technical documentation and user guides.",
                "email" => "chloe.a@example.com"
            ],
            [
                "firstName" => "Benoit",
                "lastName" => "B",
                "profession" => "SEO Specialist",
                "bio" => "Benoit B optimizes websites for search engines to improve visibility.",
                "email" => "benoit.b@example.com"
            ],
            [
                "firstName" => "Aline",
                "lastName" => "C",
                "profession" => "Business Analyst",
                "bio" => "Aline C analyzes business processes and helps improve efficiency.",
                "email" => "aline.c@example.com"
            ],
            [
                "firstName" => "Etienne",
                "lastName" => "D",
                "profession" => "IT Support Specialist",
                "bio" => "Etienne D provides technical support and troubleshooting for IT issues.",
                "email" => "etienne.d@example.com"
            ],
            [
                "firstName" => "Jules",
                "lastName" => "E",
                "profession" => "Web Developer",
                "bio" => "Jules E builds and maintains websites using modern web technologies.",
                "email" => "jules.e@example.com"
            ],
            [
                "firstName" => "Camille",
                "lastName" => "F",
                "profession" => "Product Manager",
                "bio" => "Camille F manages the lifecycle of digital products from conception to launch.",
                "email" => "camille.f@example.com"
            ]
        ];
    
    }

    // cette méthode permet de définir l'ordre dans lequel les fixtures doivent se faire, ce comportement est défini dans l'interface que la classe AppFixture implémente, attention l'implémentation de cette interface est nécessaire.
    public function getDependencies() {

        return [
            ArticleFixtures::class,
            SubjectFixtures::class,
            ApprenticeFixtures::class,
            JuniorFixtures::class,
        ] ;
    }

}