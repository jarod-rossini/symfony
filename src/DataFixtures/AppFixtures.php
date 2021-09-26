<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = \Faker\Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
            $post = new Post();
            $post->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
            ->setContent($faker->sentence($nbWords = 20, $variableNbWords = true))
            ->setAuthor($faker->name)
            ->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($post);
        }



        $manager->flush();
    }
}
