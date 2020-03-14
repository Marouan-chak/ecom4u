<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\emInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/produits", name="create_product")
     */
    public function createProduct(): Response
    {
        // you can fetch the em via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(emInterface $em)
        $em = $this->getDoctrine()->getManager();
        $category1 = new Categories();
        $category1->setName('Ordinateurs');
        $category2 = new Categories();
        $category2->setName('Vêtements');
         $category3 = new Categories();
        $category3->setName('Téléphone');
        $category4 = new Categories();
        $category4->setName('High-Tech');
        $category5 = new Categories();
        $category5->setName('Livres');
        $category6 = new Categories();
        $category6->setName('Multimédia');
        
        $em->flush();
        $product = new Produit();
        $product->setName('Keyboard');
        $product->setPrix(101.21);
        $product->setDescription('Ergonomic and stylish!');
        $product->setImage('Ergonomic and stylish!');
        $product->setCategorie($category4);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($category1);
        $em->persist($category2);
        $em->persist($category3);
        $em->persist($category4);
        $em->persist($category5);
        $em->persist($category6);
        //$em->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}

