<?php

namespace App\DataFixtures;

use App\Entity\Apprentice;
use App\Enum\Domain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApprenticeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->apprentices() as [
            'firstName' => $firsName,
            'lastName' => $lastName,
            'profession' => $profession,
            'bio' => $bio,
            'domain' => $domain,
        ]) {
            $apprentices = new Apprentice();
            $apprentices->setProfession($profession);
            $apprentices->setFirstName($firsName);
            $apprentices->setLastName($lastName);
            $apprentices->setDomain(Domain::FullJS);
            $apprentices->setBio($bio);

            $manager->persist($apprentices);
        }

        $manager->flush();
    }

    private function apprentices(): array
    {
        return [
            [
                "firstName" => "Alice",
                "lastName" => "Johnson",
                "profession" => "Apprentice Software Developer",
                "bio" => "Alice is a seasoned software developer with over 10 years of experience in building scalable web applications. She is passionate about open-source projects and has contributed to several major frameworks.",
                "domain" => "full-js"
            ],
            [
                "firstName" => "Bob",
                "lastName" => "Smith",
                "profession" => "Apprentice Graphic Designer",
                "bio" => "Bob is a creative graphic designer who specializes in creating stunning visuals for brands. He has worked with various high-profile clients and his designs have been featured in several magazines.",
                "domain" => "full-php"
            ],
            [
                "firstName" => "Carol",
                "lastName" => "Williams",
                "profession" => "Apprentice Data Scientist",
                "bio" => "Carol is a data scientist with a strong background in statistical analysis and machine learning. She enjoys uncovering hidden patterns in data and turning insights into actionable business strategies.",
                "domain" => "statistic"
            ],
            [
                "firstName" => "David",
                "lastName" => "Brown",
                "profession" => "Apprentice Marketing Manager",
                "bio" => "David is an experienced marketing manager with a knack for creating compelling marketing campaigns. His expertise lies in digital marketing, social media strategy, and brand management.",
                "domain" => "analyst"
            ],
            [
                "firstName" => "Eve",
                "lastName" => "Davis",
                "profession" => "Apprentice Cybersecurity Analyst",
                "bio" => "Eve is a cybersecurity analyst who is dedicated to protecting organizations from cyber threats. She has a deep understanding of network security, risk management, and threat intelligence.",
                "domain" => "full-python"
            ]
        ];
    }
}
