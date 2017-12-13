<?php

namespace TTV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('TTVWebsiteBundle:Website:index.html.twig');
    }

    public function viewAction($id)
    {

    }

    public function addAction()
    {

    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}
