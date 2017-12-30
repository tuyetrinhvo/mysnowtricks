<?php

namespace Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use TTV\WebsiteBundle\Entity\Trick;


class TTVTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        // vérifier s'il y a au moins un ul tag
        $this->assertGreaterThan(0, $crawler ->filter('li')->count());

        // vérifier s'il le contenu de la réponse contient le mot 'figure'
        $this->assertContains('figure', $client->getResponse()->getContent());

        // vérifier s'il le status code de la réponse est 200
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testTrick()
    {
        $trick = new Trick();

        //$trick->setSlug('trick grap');
        $trick->setName('figure Mute');
        $this->assertEquals('figure Mute', $trick->getName());
    }


}
