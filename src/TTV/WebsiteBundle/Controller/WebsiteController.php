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
            throw new NotFoundHttpException("La page .$page. n'existe pas !");
        }

        $nbPerPage = 4;

        $listTricks = $this->getDoctrine()
            ->getManager()
            ->getRepository('TTVWebsiteBundle:Trick')
            ->getAllTricks($page, $nbPerPage);

        $nbPages = ceil(count($listTricks) / $nbPerPage );
        if ($page > $nbPages){
            throw $this->createNotFoundException("La page ".$page."  n'existe pas !");
        }

        // On donne toutes les informations nécessaires à la vue
        return $this->render('TTVWebsiteBundle:Website:index.html.twig', [
            'listTricks'=>$listTricks,
            'nbPages' => $nbPages,
            'page' => $page,
        ]);
    }

    public function viewAction($id, $page, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('TTVWebsiteBundle:Trick')->getTrick($id);

        if (null === $trick){
            throw new NotFoundHttpException("La figure d'id ".$id." n'existe pas !");
        }

        $nbPerPage = 3;

        $listComments = $em ->getRepository('TTVWebsiteBundle:Comment')->getCommentsByTrick($trick, $page, $nbPerPage);

        $nbPages = ceil(count($listComments) / $nbPerPage);


        return $this->render('TTVWebsiteBundle:Website:view.html.twig', ['trick' => $trick, 'listComments' =>$listComments, 'page' => $page, 'nbPages' => $nbPages, ]);
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')){

            $request->getSession()->getFlashBag()->add('info', 'La nouvelle figure est bien ajoutée !');

            return $this->redirectToRoute('ttv_website_view', ['id' => $trick->getId()]);
        }

        return $this->render('TTVWebsiteBundle:Website:add.html.twig');
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $trick = $em ->getRepository('TTVWebsiteBundle:Trick')->find($id);

        if (null === $trick){
            throw new NotFoundHttpException("La figure d'id ".$id." n'existe pas !");
        }

        if ($request->isMethod('POST')){

            $request->getSession()->getFlashBag()->add ('info', 'La figure est bien modifiée !');

            return $this->redirectToRoute('ttv_website_view', ['id' => $trick->getId()]);
        }

        return $this->render('TTVWebsiteBundle:Website:edit.html.twig', ['trick' => $trick]);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $trick = $em->getRepository('TTVWebsiteBundle:Trick')->find($id);

        if (null === $trick){
            throw new NotFoundHttpException("La figure d'id ".$id." n'existe pas !");
        }
        return $this->render('TTVWebsiteBundle:Website:delete.html.twig');
    }
}
