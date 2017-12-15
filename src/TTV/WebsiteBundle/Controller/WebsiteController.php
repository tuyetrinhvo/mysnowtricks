<?php

namespace TTV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpkernel\Exception\NotFoundHttpException;

class WebsiteController extends Controller
{
    public function indexAction($page)
    {
        if($page < 1)
        {
            throw new NotFoundHttpException("La page .$page. n'existe pas.");
        }

        $nbPerPage = 10;

        $listTricks = $this->getDoctrine()
            ->getManager()
            ->getRepository('TTVWebsiteBundle:Trick')
            ->getAllTricks();
        return $this->render('TTVWebsiteBundle:Website:index.html.twig', ['listTricks' => $listTricks]);
    }

    public function viewAction($id)
    {

    }

    public function addAction()
    {

    }

    public function editAction($id)
    {

    }

    public function deleteAction($id)
    {

    }
}
