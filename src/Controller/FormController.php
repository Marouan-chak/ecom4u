<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use App\Entity\User;

class FormController extends AbstractController
{
    /**
     * @Route("/index", name="form")
     */
    public function index()
    {
        $user=new User();
        $form = $this->createForm(RegisterType::class,$user);
        return $this->render('indeex.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
