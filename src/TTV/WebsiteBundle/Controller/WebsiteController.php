<?php

namespace TTV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WebsiteController extends Controller
{
    public function indexAction($page)
    {
        if($page < 1)
        {
            throw new NotFoundHttpException("La page .$page. n'existe pas.");
        }


        return $this->render('TTVWebsiteBundle:Website:index.html.twig');
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TTVWebsiteBundle:Trick');
        $trick = $repository->find($id);

        if (null === $trick){
            throw new NotFoundHttpException("La figure d'id ".$id." n'existe pas");
        }
        return $this->render('TTVWebsiteBundle:Website:view.html.twig', ['id' => $id, 'trick' => $trick]);
    }

    public function addAction(Request $request)
    {
        if ($request->isMethod('POST')){

            $request->getSession()->getFlashBag()->add('info', 'Le nouveau trick est bien enregistré');

            return $this->redirectToRoute('ttv_website_view', ['id' => 3]);
        }

        return $this->render('TTVWebsiteBundle:Website:add.html.twig');
    }

    public function editAction($id, Request $request)
    {
        if ($request->isMethod('POST')){

            $request->getSession()->getFlashBag()->add ('info', 'Le Trick est bien modifiée');

            return $this->redirectToRoute('ttv_website_view', ['id' => 3]);
        }

        return $this->render('TTVWebsiteBundle:Website:edit.html.twig');
    }

    public function deleteAction($id)
    {
        return $this->render('TTVWebsiteBundle:Website:delete.html.twig');
    }
}
