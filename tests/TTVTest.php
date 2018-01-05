<?php

namespace Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use TTV\WebsiteBundle\Entity\Comment;
use TTV\WebsiteBundle\Entity\Trick;


class TTVTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        // vérifier s'il y a au moins un h4 tag
        $this->assertGreaterThan(0, $crawler ->filter('h4')->count());

        // vérifier s'il le contenu de la réponse contient le mot 'figure'
        $this->assertContains('figure', $client->getResponse()->getContent());

        // vérifier s'il le status code de la réponse est 200
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testViews()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trick/1-mute/');

        // vérifier s'il y a au moins un h3 tag
        $this->assertGreaterThan(0, $crawler ->filter('h3')->count());

        // vérifier s'il le contenu de la réponse contient le mot 'figure'
        $this->assertContains('figure', $client->getResponse()->getContent());

        // vérifier s'il le status code de la réponse est 404
        $this->assertTrue($client->getResponse()->isNotFound());
    }

    public function testAdd()
    {
        $client = static::createClient();

        $client->request('GET', '/add');

        // vérifier s'il le status code de la réponse est 302
        // 302 redirection temporaire : passer d'abord par la vérification d'authentification
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testEdit()
    {
        $client = static::createClient();

        $client->request('GET', '/edit/2');

        // vérifier s'il le status code de la réponse est 302
        // 302 redirection temporaire : passer d'abord par la vérification d'authentification
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testDelete()
    {
        $client = static::createClient();

        $client->request('GET', '/delete/1');

        // vérifier s'il le status code de la réponse est 302
        // 302 redirection temporaire : passer d'abord par la vérification d'authentification
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testTrick()
    {
        $trick = new Trick();

        $trick->setName('figure Mute');
        $this->assertEquals('figure Mute', $trick->getName());
    }

    public function testComment()
    {
        $trick = new Comment();

        $trick->setContent('c\'est bien !');
        $this->assertEquals('c\'est bien !', $trick->getContent());
    }

}
