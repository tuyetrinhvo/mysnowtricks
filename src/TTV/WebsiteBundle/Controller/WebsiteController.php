<?php

namespace TTV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TTV\WebsiteBundle\Entity\Comment;
use TTV\WebsiteBundle\Entity\Trick;
use TTV\WebsiteBundle\Form\CommentType;
use TTV\WebsiteBundle\Form\TrickType;
use Symfony\Component\HttpFoundation\Tests\Session\SessionInterface;

class WebsiteController extends Controller
{
    public function indexAction($page)
    {
        if($page < 1)
        {
            throw new NotFoundHttpException('La page '.$page.' n\'existe pas !');
        }

        $nbPerPage = $this->getParameter('index_nbperpage');

        $listTricks = $this->getDoctrine()
            ->getManager()
            ->getRepository('TTVWebsiteBundle:Trick')
            ->getAllTricks($page, $nbPerPage);

        $nbPages = ceil(count($listTricks) / $nbPerPage );
        if ($page > $nbPages){
            throw $this->createNotFoundException('La page '.$page.'  n\'existe pas !');
        }

        // On donne toutes les informations nécessaires à la vue
        return $this->render('TTVWebsiteBundle:Website:index.html.twig', [
            'listTricks'=>$listTricks,
            'nbPages' => $nbPages,
            'page' => $page,
        ]);
    }

    public function viewsAction($id, $page, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('TTVWebsiteBundle:Trick')->find($id);


        if (null === $trick){
            throw new NotFoundHttpException('La figure '.$id.' n\'existe pas !');
        }

        $nbPerPage = $this->getParameter('comment_nbperpage');

        $listComments = $em ->getRepository('TTVWebsiteBundle:Comment')->getCommentsByTrick($trick, $page, $nbPerPage);

        $nbPages = ceil(count($listComments) / $nbPerPage);

        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

            $em = $this->getDoctrine()->getManager();
            $trick->addComment($comment);
            $user = $this->getUser();
            $comment->setUser($user);
            $em->persist($comment);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'Le commentaire est bien ajouté !');

            return $this->redirectToRoute('ttv_website_view', ['id' => $id]);
        }

        return $this->render('TTVWebsiteBundle:Website:view.html.twig', ['trick' => $trick, 'listComments' =>$listComments, 'page' => $page, 'nbPages' => $nbPages, 'form' => $form->createView() ]);
    }


    public function addAction(Request $request)
    {
        $trick = new Trick();

        $form = $this ->createForm(TrickType::class, $trick);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $trick->setUser($user);
            $em->persist($trick);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'La nouvelle figure est bien ajoutée !');

            return $this->redirectToRoute('ttv_website_view', ['id' => $trick->getId()]);
        }

        return $this->render('TTVWebsiteBundle:Website:add.html.twig', ['trick' => $trick, 'form' => $form->createView()]);
    }


    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $trick = $em ->getRepository('TTVWebsiteBundle:Trick')->find($id);

        if (null === $trick){
            throw new NotFoundHttpException("La figure d'id ".$id." n'existe pas !");
        }

        $form = $this ->createForm(TrickType::class, $trick);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

            $em->persist($trick);
            $em->flush();

            $request->getSession()->getFlashBag()->add ('info', 'La figure est bien modifiée !');

            return $this->redirectToRoute('ttv_website_view', ['id' => $id ]);
        }

        return $this->render('TTVWebsiteBundle:Website:edit.html.twig', ['trick' => $trick, 'form' => $form->createView()]);
    }


    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $trick = $em->getRepository('TTVWebsiteBundle:Trick')->find($id);

        if (null === $trick){
            throw new NotFoundHttpException('La figure '.$id.' n\'existe pas !');
        }

        $form = $this -> get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($trick);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'La figure a été bien supprimée !');

            return $this->redirectToRoute('ttv_website_homepage');
        }

        return $this->render('TTVWebsiteBundle:Website:delete.html.twig', ['trick' => $trick, 'form' => $form->createView()]);
    }
}
