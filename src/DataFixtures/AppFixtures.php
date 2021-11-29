<?php

namespace App\DataFixtures;

use App\Entity\BlogCategory;
use App\Entity\BlogPost;
use App\Services\PostService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    public function __construct(PostService $postService)
    {
        $this->faker = Factory::create();
        $this->postService = $postService;
    }

    public function load(ObjectManager $manager): void
    {
        $categ1 = new BlogCategory();
        $categ1->setKeyCat('key');
        $categ1->setLng('FR');
        $categ1->setTitle('Categ 1');
        $categ1->setDescription($this->faker->text());
        $categ1->setSort(1);
        $categ1->setDateCreation(($this->faker->dateTimeBetween()));
        $categ1->setDateModification(new \DateTime());

        
        $categ2 = new BlogCategory();
        $categ2->setKeyCat('key');
        $categ2->setLng('FR');
        $categ2->setTitle('Categ 2');
        $categ2->setDescription($this->faker->text());
        $categ2->setSort(2);
        $categ2->setDateCreation(($this->faker->dateTimeBetween()));
        $categ2->setDateModification(new \DateTime());

        $categ3 = new BlogCategory();
        $categ3->setKeyCat('key');
        $categ3->setLng('FR');
        $categ3->setTitle('Categ 3');
        $categ3->setDescription($this->faker->text());
        $categ3->setSort(3);
        $categ3->setDateCreation(($this->faker->dateTimeBetween()));
        $categ3->setDateModification(new \DateTime());

        
        $manager->persist($categ1);
        $manager->persist($categ2);
        $manager->persist($categ3);
        
        // $categoryList = [
        //     [
        //         'key_cat' => 'key',
        //         'lng' => 'FR',
        //         'title' => 'Categ 1',
        //         'sort' => 1,
        //     ],
        //     [
        //         'key_cat' => 'key',
        //         'lng' => 'FR',
        //         'title' => 'Categ 2',
        //         'sort' => 2,
        //     ],
        //     [
        //         'key_cat' => 'key',
        //         'lng' => 'FR',
        //         'title' => 'Categ 3',
        //         'sort' => 3,
        //     ],
        // ];

        // foreach($categoryList as $singleCategory){
        //     $category = new BlogCategory();

        //     $category->setKeyCat($singleCategory['key_cat']);
        //     $category->setLng($singleCategory['lng']);
        //     $category->setTitle($singleCategory['title']);
        //     $category->setDescription($this->faker->text());
        //     $category->setSort($singleCategory['sort']);
        //     $category->setDateCreation($this->faker->dateTimeBetween());
        //     $category->setDateModification(new \DateTime());

        //     $manager->persist($category);
        // }

        for($i = 0; $i < 50; $i++){

            $images = ['un', 'deux', 'trois'];
            $index = array_rand($images, 1);
            $image = $images[$index];

            $this->postService->new(
                'key', $this->faker->countryCode(), $this->faker->sentence(2), 
                $image.'.jpg', 
                $this->faker->text(), $this->faker->boolean(), new \DateTime(), $this->faker->dateTimeBetween(), $categ1
            );

            // $postToAdd = new BlogPost();

            // $postToAdd->setKeyPost('key');
            // $postToAdd->setlng($this->faker->countryCode());
            // $postToAdd->setTitle($this->faker->sentence(2));
            // $postToAdd->setContent($this->faker->text());
            // $postToAdd->setEnabled($this->faker->boolean());
            // $postToAdd->setDatePublication(new \DateTime());
            // $postToAdd->setDateCreation($this->faker->dateTimeBetween());

            // $postToAdd->addCategory($categ1);

            // $manager->persist($postToAdd);
        }

        $manager->flush();
    }
}
