<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();
        $post->setTitle('Hello World');
        $post->setContent('Hello World. This is the first post');
        $post->setCreationDate('01.03.2023');
        $post->setThumbnailUrl('https://cdn.pixabay.com/photo/2019/08/19/07/45/corgi-4415649_1280.jpg');
        $post->addAuthor($this->getReference('author1'));
        $post->addAuthor($this->getReference('author2'));
        $manager->persist($post);

        $post2 = new Post();
        $post2->setTitle('Hello Again');
        $post2->setContent('Hello World. This is the second post');
        $post2->setCreationDate('02.03.2023');
        $post2->setThumbnailUrl('https://cdn.pixabay.com/photo/2013/10/02/23/03/dog-190056_1280.jpg');
        $post2->addAuthor($this->getReference('author1'));

        $manager->persist($post2);

        $manager->flush();
    }
}
