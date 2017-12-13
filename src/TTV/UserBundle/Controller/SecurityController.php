<?php

namespace TTV\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function indexAction()
    {
        return $this->render('login.html.twig');
    }
}
