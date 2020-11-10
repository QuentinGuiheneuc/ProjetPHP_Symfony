<?php

namespace App\DataFixtures;


use DateTime;
use Faker\Factory;
use App\Entity\Offre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $offre = new Offre();
            $offre->setTitle($faker->sentence($nb = 3, true))
                ->setDescription($faker->sentence($nb = 100, $asText = true))
                ->setAdresse($faker->address)
                ->setVille($faker->city)
                ->setCodePostal($faker->numberBetween($min = 1000, $max = 9000))
                ->setDateCrea(new \DateTime())
                ->setDateUpdate(new \DateTime())
                ->setEndMission(new \DateTime())
                ->setContrat($faker->randomElement($array = array("CDD", "CDI", "free")))
                ->setTypeContrat($faker->randomElement($array = array("temps pleins", "temps partiel")));
            $manager->persist($offre);
        }
        $manager->flush();
    }
}
