<?php

namespace TTV\WebsiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TTV\UserBundle\Entity\Avatar;
use TTV\UserBundle\Entity\User;
use TTV\WebsiteBundle\Entity\Category;
use TTV\WebsiteBundle\Entity\Image;
use TTV\WebsiteBundle\Entity\Trick;
use TTV\WebsiteBundle\Entity\Comment;
use TTV\WebsiteBundle\Entity\Video;


class LoadTrick implements FixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Grabs');
        $category2 = new Category();
        $category2->setName('Rotation');
        $category3 = new Category();
        $category3->setName('Flips');
        $category4 = new Category();
        $category4->setName('Slides');
        $category5 = new Category();
        $category5->setName('Straight airs');
        $category6 = new Category();
        $category6->setName('Spins');
        $category7 = new Category();
        $category7->setName('Stalls');
        $category8 = new Category();
        $category8->setName('Old school');
        $category9 = new Category();
        $category9->setName('Autres');

        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);
        $manager->persist($category6);
        $manager->persist($category7);
        $manager->persist($category8);
        $manager->persist($category9);


        $avatar = new Avatar();
        $avatar->setExtension('profil-01.png');
        $avatar->setAlt('profil-01');

        $avatar1 = new Avatar();
        $avatar1->setExtension('profil-02.png');
        $avatar1->setAlt('profil-02');


        $user1 = new User();
        $user1->setUsername('Mai');
        $user1->setPassword('123');
        $user1->setEmail('mai@gmail.vn');
        $user1->setRoles(['']);
        $user1->setAvatar($avatar);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('Lys');
        $user2->setPassword('123');
        $user2->setEmail('lys@yahoo.fr');
        $user2->setRoles(['']);
        $user2->setAvatar($avatar1);
        $manager->persist($user2);


        $comment2 = new Comment();
        $comment2->setContent('Il y a quelqu\'un ici déjà fait cette figure ?');
        $comment2->setUser($user1);

        $comment3 = new Comment();
        $comment3->setContent('Personne ?!');
        $comment3->setUser($user1);

        $comment4 = new Comment();
        $comment4->setContent('Moi non plus');
        $comment4->setUser($user1);

        $comment5 = new Comment();
        $comment5->setContent('Mais je veux bien l\'essayer un jour');
        $comment5->setUser($user1);

        $comment6 = new Comment();
        $comment6->setContent('Je parle toute seule');
        $comment6->setUser($user1);

        $comment = new Comment();
        $comment->setContent('Je suis là');
        $comment->setUser($user2);

        $comment7 = new Comment();
        $comment7->setContent('C\'est quand ton prochain voyage au ski ?');
        $comment7->setUser($user2);

        $comment8 = new Comment();
        $comment8->setContent('Je partirai le mois prochain');
        $comment8->setUser($user2);

        $comment9 = new Comment();
        $comment9->setContent('Tu veux venir avec nous ?');
        $comment9->setUser($user2);

        $comment10 = new Comment();
        $comment10->setContent('Tiens moi au courant');
        $comment10->setUser($user2);

        $comment11 = new Comment();
        $comment11->setContent('J\'ai hâte');
        $comment11->setUser($user2);

        $comment1 = new Comment();
        $comment1->setContent('Il existe plusieurs types de grabs selon la position de la saisie et la main choisie pour l\'effectuer, avec des difficultés variables. On peut appeler cette figure aussi "melancholie" ou "style week"');
        $comment1->setUser($user2);


        $image = new Image();
        $image->setExtension('mute-grab.jpg');
        $image->setAlt('mute-grab');

        $image1 = new Image();
        $image1->setExtension('sad-grab.jpg');
        $image1->setAlt('sad-grab');

        $image2 = new Image();
        $image2->setExtension('indy-grab-snowboarding.jpg');
        $image2->setAlt('indy-grab-snowboarding');

        $image3 = new Image();
        $image3->setExtension('Grab-stalefish.jpg');
        $image3->setAlt('Grab-stalefish');

        $image4 = new Image();
        $image4->setExtension('grab-tail-grab.jpg');
        $image4->setAlt('grab-tail-grab');

        $image5 = new Image();
        $image5->setExtension('FrontSide180.jpg');
        $image5->setAlt('FrontSide180');

        $image6 = new Image();
        $image6->setExtension('backside-180-snowboard.jpg');
        $image6->setAlt('backside-180-snowboard');

        $image7 = new Image();
        $image7->setExtension('frontflipknuckle.jpg');
        $image7->setAlt('frontflipknuckle');

        $image8 = new Image();
        $image8->setExtension('backflip-snowboard.jpg');
        $image8->setAlt('backflip-snowboard');

        $image9 = new Image();
        $image9->setExtension('Slide-nose-slide.jpg');
        $image9->setAlt('Slide-nose-slide');

        $video = new Video();
        $video->setUrl('https://www.youtube.com/embed/M5NTCfdObfs');

        $video1 = new Video();
        $video1 ->setUrl('https://www.youtube.com/embed/t0F1sKMUChA');


        $trick1 = new Trick();
        $trick1->setName('Grab Mute');
        $trick1->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Mute : saisie de la carre frontside de la planche entre les deux pieds avec la main avant.');
        $trick1->setCategory($category1);
        $trick1->setUser($user1);
        $trick1->addComment($comment);
        $trick1->addComment($comment2);
        $trick1->addComment($comment3);
        $trick1->addComment($comment4);
        $trick1->addComment($comment5);
        $trick1->addComment($comment6);
        $trick1->addComment($comment7);
        $trick1->addComment($comment8);
        $trick1->addComment($comment9);
        $trick1->addComment($comment10);
        $trick1->addComment($comment11);
        $trick1->addImage($image);
        $trick1->addVideo($video);
        $manager->persist($trick1);


        $trick2 = new Trick();
        $trick2->setName('Grab Sad');
        $trick2->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Sad : saisie de la carre backside de la planche, entre les deux pieds, avec la main avant ;');
        $trick2->setCategory($category1);
        $trick2->setUser($user1);
        $trick2->addComment($comment1);
        $trick2->addImage($image1);
        $manager->persist($trick2);


        $trick3 = new Trick();
        $trick3->setName('Grab Indy');
        $trick3->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Indy : saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière ;');
        $trick3->setCategory($category1);
        $trick3->setUser($user1);
        $trick3->addImage($image2);
        $trick3->addVideo($video1);
        $manager->persist($trick3);


        $trick4 = new Trick();
        $trick4->setName('Grab Stalefish');
        $trick4->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Stalefish : saisie de la carre backside de la planche entre les deux pieds avec la main arrière');
        $trick4->setCategory($category1);
        $trick4->setUser($user1);
        $trick4->addImage($image3);
        $manager->persist($trick4);


        $trick5 = new Trick();
        $trick5->setName('Tail Grab et Nose Grab');
        $trick5->setDescription('Un grab consiste à attraper la planche avec la main pendant le saut. Tail grab : saisie de la partie arrière de la planche, avec la main arrière ; Nose grab : saisie de la partie avant de la planche, avec la main avant ; ');
        $trick5->setCategory($category1);
        $trick5->setUser($user1);
        $trick5->addImage($image4);
        $manager->persist($trick5);


        $trick6 = new Trick();
        $trick6->setName('Frontside');
        $trick6->setDescription('On désigne par le mot « rotation » uniquement des rotations horizontales ; les rotations verticales sont des flips. Le principe est d\'effectuer une rotation horizontale pendant le saut, puis d\'attérir en position switch ou normal. La nomenclature se base sur le nombre de degrés de rotation effectués  : un 180 désigne un demi-tour, soit 180 degrés d\'angle ; 360, trois six pour un tour complet ; 540, cinq quatre pour un tour et demi ; 720, sept deux pour deux tours complets ; 900 pour deux tours et demi ; 1080 ou big foot pour trois tours ; etc.');
        $trick6->setCategory($category2);
        $trick6->setUser($user1);
        $trick6->addImage($image5);
        $manager->persist($trick6);


        $trick7 = new Trick();
        $trick7->setName('Backside');
        $trick7->setDescription('Une rotation peut être frontside ou backside : une rotation frontside correspond à une rotation orientée vers la carre backside. Cela peut paraître incohérent mais l\'origine étant que dans un halfpipe ou une rampe de skateboard, une rotation frontside se déclenche naturellement depuis une position frontside (i.e. l\'appui se fait sur la carre frontside), et vice-versa. Ainsi pour un rider qui a une position regular (pied gauche devant), une rotation frontside se fait dans le sens inverse des aiguilles d\'une montre. Une rotation peut être agrémentée d\'un grab, ce qui rend le saut plus esthétique mais aussi plus difficile car la position tweakée a tendance à déséquilibrer le rideur et désaxer la rotation. De plus, le sens de la rotation a tendance à favoriser un sens de grab plutôt qu\'un autre. Les rotations de plus de trois tours existent mais sont plus rares, d\'abord parce que les modules assez gros pour lancer un tel saut sont rares, et ensuite parce que la vitesse de rotation est tellement élevée qu\'un grab devient difficile, ce qui rend le saut considérablement moins esthétique.');
        $trick7->setCategory($category2);
        $trick7->setUser($user1);
        $trick7->addImage($image6);
        $manager->persist($trick7);


        $trick8 = new Trick();
        $trick8->setName('Front Flips');
        $trick8->setDescription('Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière. Il est possible de faire plusieurs flips à la suite, et d\'ajouter un grab à la rotation. Les flips agrémentés d\'une vrille existent aussi (Mac Twist, Hakon Flip, ...), mais de manière beaucoup plus rare, et se confondent souvent avec certaines rotations horizontales désaxées. Néanmoins, en dépit de la difficulté technique relative d\'une telle figure, le danger de retomber sur la tête ou la nuque est réel et conduit certaines stations de ski à interdire de telles figures dans ses snowparks.');
        $trick8->setCategory($category3);
        $trick8->setUser($user1);
        $trick8->addImage($image7);
        $manager->persist($trick8);


        $trick9 = new Trick();
        $trick9->setName('Back Flips');
        $trick9->setDescription('Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière. Il est possible de faire plusieurs flips à la suite, et d\'ajouter un grab à la rotation. Les flips agrémentés d\'une vrille existent aussi (Mac Twist, Hakon Flip, ...), mais de manière beaucoup plus rare, et se confondent souvent avec certaines rotations horizontales désaxées. Néanmoins, en dépit de la difficulté technique relative d\'une telle figure, le danger de retomber sur la tête ou la nuque est réel et conduit certaines stations de ski à interdire de telles figures dans ses snowparks.');
        $trick9->setCategory($category3);
        $trick9->setUser($user2);
        $trick9->addImage($image8);
        $manager->persist($trick9);


        $trick10 = new Trick();
        $trick10->setName('Nose Slide et Tail Silde');
        $trick10->setDescription('Un slide consiste à glisser sur une barre de slide. Le slide se fait soit avec la planche dans l\'axe de la barre, soit perpendiculaire, soit plus ou moins désaxé. On peut slider avec la planche centrée par rapport à la barre (celle-ci se situe approximativement au-dessous des pieds du rideur), mais aussi en nose slide, c\'est-à-dire l\'avant de la planche sur la barre, ou en tail slide, l\'arrière de la planche sur la barre.');
        $trick10->setCategory($category4);
        $trick10->setUser($user2);
        $trick10->addImage($image9);
        $manager->persist($trick10);


        $manager->flush();
    }
}