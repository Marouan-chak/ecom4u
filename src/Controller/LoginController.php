<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index()
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error=$utils->getLastAuthenticationError();
        $lastUsername=$utils->getLastUsername();
        return $this->render('indeex.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){

    }
}
