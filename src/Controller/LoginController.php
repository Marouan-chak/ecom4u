<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils, UserPasswordEncoderInterface $passwordEncoder)
    {



        $user = new User();
        $form = $this->createForm(RegisterType::class, $user, [
            'action' => $this->generateUrl('form')
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setRole('ROLE_USER');
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $em->persist($user);
            $em->flush();
        }


        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();
        return $this->render('indeex.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }
}
