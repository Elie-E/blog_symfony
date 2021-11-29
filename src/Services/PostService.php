<?php

namespace App\Services;

use App\Entity\BlogPost;
use Doctrine\ORM\EntityManagerInterface;

class PostService
{
    public function __construct(EntityManagerInterface $entitymanager)
    {
        $this->em = $entitymanager;
    }

    public function new($key, $lng, $title, $image, $content, $enabled, $datePublication, $dateCreation, $categ)
    {
        $postToAdd = new BlogPost();

            $postToAdd->setKeyPost($key);
            $postToAdd->setlng($lng);
            $postToAdd->setTitle($title);
            $postToAdd->setImage($image);
            $postToAdd->setContent($content);
            $postToAdd->setEnabled($enabled);
            $postToAdd->setDatePublication($datePublication);
            $postToAdd->setDateCreation($dateCreation);

            $postToAdd->addCategory($categ);

            $this->em->persist($postToAdd);
    }
}