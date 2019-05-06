<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Stock;
use App\Entity\Category;

class StockFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // Crée 3 fausses catégories

        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <=3 ; $i++)
        {
            $category = new Category();
            $category->setTitle($faker->sentence(2))
                     ->setDescription($faker->sentence(mt_rand(1,2)));

            $manager->persist($category);


        
            // Crée entre 4 et 10 articles

            for($j = 1; $j <= mt_rand(4,10); $j++)
            {
                $stock= new Stock();
                $stock->setType($faker->sentence(mt_rand(2,5)))
                    ->setEmplacement($faker->sentence(mt_rand(1,3)))
                    ->setDescription($faker->sentence(mt_rand(2,4)))
                    ->setModifiedAt($faker->dateTimeBetween('-6 months'))
                    ->setQuantite($faker->numberBetween(0,150))
                    ->setCategory($category)
                    ->setImage($faker->imageUrl(150,250));

                $manager->persist($stock);
            }
        }
        $manager->flush();
    }
}
