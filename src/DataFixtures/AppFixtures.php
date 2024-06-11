<?php

namespace App\DataFixtures;

use App\Entity\Presentation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        $faker->seed(2022);

        // Génération de fausses infos en utilisant Faker
        // On ouvre un tableau qui contient toutes nos infos pour les présentations
        $allPresentation = [];
        /* On commence peut être simple avec 10 présentations?? */
        for ($i=0 ; $i < 10 ; $i++) {
            $présentation = new Presentation();
            $présentation->setTitre($faker->words(5, true));
            $présentation->setSousTitre($faker->Text(100));
            $présentation->setResume($faker->realText($maxNbChars = 500, $indexSize = 3));

            $manager->persist($présentation);

            $allPresentation[] = $présentation;
        }

        $manager->flush();
    }
}
