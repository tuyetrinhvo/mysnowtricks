<?php

namespace TTV\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('ttv_website_homepage');
        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('TTVUserBundle:Security:login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }
}
