<?php

namespace App\DataFixtures;

use App\Entity\Trainer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach ($this->data() as [
            'firstName' => $firsName,
            'lastName' => $lastName,
            'profession' => $profession,
            'bio' => $bio,
        ]) {
            $trainer = new Trainer();
            $trainer->setFirstName($firsName);
            $trainer->setLastName($lastName);
            $trainer->setProfession($profession);
            $trainer->setBio($bio);

            $manager->persist($trainer);
        }

        $manager->flush();
    }

    public function data(): array
    {

        return  [
            [
                "firstName" => "Antoine",
                "lastName" => "L",
                "profession" => "Professor Symfony",
                "bio" => "Antoine L is a certified Symfony coach with over 10 years of experience."
            ],
            [
                "firstName" => "Marie",
                "lastName" => "M",
                "profession" => "JavaScript Developer",
                "bio" => "Marie M specializes in JavaScript frameworks and has been teaching for 8 years."
            ],
            [
                "firstName" => "John",
                "lastName" => "D",
                "profession" => "Java Expert",
                "bio" => "John D has 15 years of experience in Java and software architecture."
            ],
            [
                "firstName" => "Claire",
                "lastName" => "B",
                "profession" => "Data Scientist",
                "bio" => "Claire B is a data science professional with a focus on machine learning."
            ],
            [
                "firstName" => "Paul",
                "lastName" => "A",
                "profession" => "DevOps Engineer",
                "bio" => "Paul A has extensive experience in cloud computing and DevOps practices."
            ],
            [
                "firstName" => "Emma",
                "lastName" => "C",
                "profession" => "Python Developer",
                "bio" => "Emma C is a Python expert with a passion for teaching programming to beginners."
            ],
            [
                "firstName" => "Lucas",
                "lastName" => "T",
                "profession" => "AI Specialist",
                "bio" => "Lucas T has been working in artificial intelligence for over 12 years."
            ],
            [
                "firstName" => "Sophie",
                "lastName" => "G",
                "profession" => "Frontend Developer",
                "bio" => "Sophie G is a frontend development expert with a keen eye for design."
            ],
            [
                "firstName" => "Marc",
                "lastName" => "H",
                "profession" => "Backend Developer",
                "bio" => "Marc H has a decade of experience in backend development and databases."
            ],
            [
                "firstName" => "Nina",
                "lastName" => "J",
                "profession" => "Mobile Developer",
                "bio" => "Nina J develops mobile applications for both Android and iOS platforms."
            ],
            [
                "firstName" => "Alex",
                "lastName" => "K",
                "profession" => "Cybersecurity Expert",
                "bio" => "Alex K is a cybersecurity specialist with a background in ethical hacking."
            ],
            [
                "firstName" => "Julien",
                "lastName" => "L",
                "profession" => "Cloud Architect",
                "bio" => "Julien L designs and manages cloud infrastructure solutions."
            ],
            [
                "firstName" => "Elise",
                "lastName" => "N",
                "profession" => "Blockchain Developer",
                "bio" => "Elise N works on blockchain technologies and decentralized applications."
            ],
            [
                "firstName" => "Tom",
                "lastName" => "P",
                "profession" => "Software Engineer",
                "bio" => "Tom P has a diverse background in software engineering and project management."
            ],
            [
                "firstName" => "Isabelle",
                "lastName" => "Q",
                "profession" => "Database Administrator",
                "bio" => "Isabelle Q manages large-scale databases and ensures data integrity."
            ],
            [
                "firstName" => "Hugo",
                "lastName" => "R",
                "profession" => "Network Engineer",
                "bio" => "Hugo R has expertise in network design and administration."
            ],
            [
                "firstName" => "Alice",
                "lastName" => "S",
                "profession" => "UX/UI Designer",
                "bio" => "Alice S focuses on creating user-friendly interfaces and enhancing user experience."
            ],
            [
                "firstName" => "Maxime",
                "lastName" => "T",
                "profession" => "Project Manager",
                "bio" => "Maxime T oversees software development projects from inception to completion."
            ],
            [
                "firstName" => "Lea",
                "lastName" => "U",
                "profession" => "Full Stack Developer",
                "bio" => "Lea U is proficient in both frontend and backend development technologies."
            ],
            [
                "firstName" => "Victor",
                "lastName" => "V",
                "profession" => "IT Consultant",
                "bio" => "Victor V provides expert advice on IT infrastructure and systems."
            ],
            [
                "firstName" => "Celine",
                "lastName" => "W",
                "profession" => "Scrum Master",
                "bio" => "Celine W facilitates agile development processes and scrum methodologies."
            ],
            [
                "firstName" => "Matthieu",
                "lastName" => "X",
                "profession" => "Game Developer",
                "bio" => "Matthieu X develops video games and interactive entertainment."
            ],
            [
                "firstName" => "Fanny",
                "lastName" => "Y",
                "profession" => "QA Engineer",
                "bio" => "Fanny Y ensures the quality and reliability of software through rigorous testing."
            ],
            [
                "firstName" => "Louis",
                "lastName" => "Z",
                "profession" => "System Administrator",
                "bio" => "Louis Z manages and maintains IT systems and servers."
            ],
            [
                "firstName" => "Chloe",
                "lastName" => "A",
                "profession" => "Technical Writer",
                "bio" => "Chloe A creates technical documentation and user guides."
            ],
            [
                "firstName" => "Benoit",
                "lastName" => "B",
                "profession" => "SEO Specialist",
                "bio" => "Benoit B optimizes websites for search engines to improve visibility."
            ],
            [
                "firstName" => "Aline",
                "lastName" => "C",
                "profession" => "Business Analyst",
                "bio" => "Aline C analyzes business processes and helps improve efficiency."
            ],
            [
                "firstName" => "Etienne",
                "lastName" => "D",
                "profession" => "IT Support Specialist",
                "bio" => "Etienne D provides technical support and troubleshooting for IT issues."
            ],
            [
                "firstName" => "Jules",
                "lastName" => "E",
                "profession" => "Web Developer",
                "bio" => "Jules E builds and maintains websites using modern web technologies."
            ],
            [
                "firstName" => "Camille",
                "lastName" => "F",
                "profession" => "Product Manager",
                "bio" => "Camille F manages the lifecycle of digital products from conception to launch."
            ]
        ];
    }
}
