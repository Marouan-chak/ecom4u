<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\RegisterType;
use App\Entity\User;

class FormController extends AbstractController  
{
    
    /**
     * @Route("/index", name="form")
     */
    public function index(Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        $user=new User();
        $form = $this->createForm(RegisterType::class,$user,[
            'action'=>$this->generateUrl('form')
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em=$this->getDoctrine()->getManager();
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $em->persist($user);
            $em->flush();
        }
        return $this->render('indeex.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
