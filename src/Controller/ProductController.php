<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/produits", name="create_product")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Produit();
        $categorie = new Categories();
        $categorie->setName('Informatique');
        $product->setName('Keyboard');
        $product->setPrix(101.21);
        $product->setDescription('Ergonomic and stylish!');
        $product->setImage('Ergonomic and stylish!');
        $product->setCategorie($categorie);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);
        $entityManager->persist($categorie);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}

