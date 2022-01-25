<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;


class AppFixtures extends Fixture     
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName($faker->sentence($nbWords = 2, $variableNbWords = true));
            $product->setDescription($faker->paragraph(4, true));
            // $article->setPrice($faker->randomFloat(2, 1, 999));
            // $article->setCategory($this->getReference("CAT".mt_rand(0, 4)));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
