<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName('Anna');
        $manager->persist($author);

        $author2 = new Author();
        $author2->setName('Benni');
        $manager->persist($author2);

        $this->addReference('author1', $author);
        $this->addReference('author2', $author2);

        $manager->flush();
    }
}
