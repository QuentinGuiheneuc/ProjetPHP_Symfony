<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Offre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $date_creat = $faker->dateTimeBetween('-6 month');

        // for ($i = 0; $i < 10; $i++) {
        //     $date_creat = $faker->dateTimeBetween('-6 month');

        //     $offre = new Offre();
        //     $offre->setTitle($faker->paragraphs($nb = 3, $asText = true))
        //         ->setDescription($faker->paragraphs($nb = 50, $asText = true))
        //         ->setAdresse($faker->address)
        //         ->setVille($faker->city)
        //         ->setCodePostal($faker->numberBetween($min = 1000, $max = 9000))
        //         ->setDateCrea($date_creat)
        //         ->setDateUpdate($date_creat)
        //         ->setEndMission($date_creat)
        //         ->setContrat("")
        //         ->setTypeContrat("");
        // }
        // $product = new Offre();
        // $manager->persist($product);
        //$manager->flush();
    }
}
