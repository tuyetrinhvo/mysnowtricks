<?php

namespace TTV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TTVWebsiteBundle:Default:index.html.twig');
    }
}
