<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Subject;

class SubjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getSubjects() as ['name' => $name]) {
            $s = new Subject();
            $s->setName($name);

            $manager->persist($s);
        }

        $manager->flush();
    }

    public function getSubjects(): array
    {

        return  [
            [
                "name" => "Java"
            ],
            [
                "name" => "Python"
            ],
            [
                "name" => "JavaScript"
            ],
            [
                "name" => "C++"
            ],
            [
                "name" => "PHP"
            ],
            [
                "name" => "Ruby"
            ],
            [
                "name" => "C#"
            ],
            [
                "name" => "Swift"
            ],
            [
                "name" => "Kotlin"
            ],
            [
                "name" => "Go"
            ],
            [
                "name" => "TypeScript"
            ],
            [
                "name" => "R"
            ],
            [
                "name" => "Perl"
            ],
            [
                "name" => "Scala"
            ],
            [
                "name" => "Objective-C"
            ],
            [
                "name" => "Rust"
            ]
        ];
    }
}
