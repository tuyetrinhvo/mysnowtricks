<?php

namespace TTV\WebsiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TTV\UserBundle\Entity\User;
use TTV\WebsiteBundle\Entity\Category;
use TTV\WebsiteBundle\Entity\Image;
use TTV\WebsiteBundle\Entity\Trick;
use TTV\WebsiteBundle\Entity\Comment;


class LoadTrick implements FixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Grab');
        $category2 = new Category();
        $category2->setName('Rotation');
        $category3 = new Category();
        $category3->setName('Flip');
        $category4 = new Category();
        $category4->setName('Slide');

        $user1 = new User();
        $user1->setUsername('Trinh');
        $user1->setPassword('123');
        $user1->setSalt('je ne sais pas');
        $user1->setRole(["admin" => "admin"]);

        $user2 = new User();
        $user2->setUsername('Mai');
        $user2->setPassword('123');
        $user2->setSalt('je ne sais pas');
        $user2->setRole(["user" => "user"]);

        $image = new Image();
        $image->setExtension('mute-grab.jpg');
        $image->setAlt('mute-grab');

        $image1 = new Image();
        $image1->setExtension('profil-01.png');
        $image1->setAlt('profil-01');

        $trick1 = new Trick();
        $trick1->setName('Grab Mute');
        $trick1->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Mute : saisie de la carre frontside de la planche entre les deux pieds avec la main avant.');
        $trick1->setCategory($category1);
        $trick1->setUser($user1);
        $trick1->setImage($image);

        $comment1 = new Comment();
        $comment1->setContent("Je ne peux pas encore faire ça !");
        $comment1->setTrick($trick1);
        $comment1->setUser($user2);

        $user2->setImage($image1);

        $manager->persist($trick1);
        $manager->persist($comment1);
        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->flush();
    }
}