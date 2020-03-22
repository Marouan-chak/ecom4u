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
        $product0 = new Produit();
        $product0->setName('Rii RK907 Clavier Filaire Compact Ultra-Mince USB Version Française(AZERTY) pour Mac et PC, Windows 10/8 / 7 / Vista/XP (Noir)');
        $product0->setPrix(14.99);
        $product0->setDescription('- Clavier filaire compact ultra-mince taille complète (104 touches) avec pavé numérique\n- Connexion USB filaire simple, vous profiterez d’une expérience de frappe confortable et silencieuse');
        $product0->setImage('https://images-na.ssl-images-amazon.com/images/I/71LvOecD%2BeL._AC_SL1500_.jpg');
        $product0->setCategorie($category4);
        $product1 = new Produit();
        $product1->setName('Souris Sans Fil 2.4G, VicTsing 2400 CPI Souris Optique Mobile');
        $product1->setPrix(9.99);
        $product1->setDescription('Économie d\'énergie\nSi la souris est pas utilisé en 8 minutes,il se tournera vers le mode économie d\'énergie.\n2.4G Technology de Transmission sans fil\nProfitez de la transmission rapide des données avec la commodité de la technologie sans fil.');
        $product1->setImage('https://images-na.ssl-images-amazon.com/images/I/61zYlLhKf1L._AC_SL1280_.jpg');
        $product1->setCategorie($category4);
        $product2 = new Produit();
        $product2->setName('Samsung Galaxy S10 - Smartphone portable débloqué 4G (Ecran : 6,1 pouces - Dual SIM - 128GO - Android - Autre Version Européenne');
        $product2->setPrix(699.99);
        $product2->setDescription('Samsung Galaxy S10 SM-G973F. Taille de l\'écran: 15,5 cm (6.1\'), Résolution de l\'écran: 1440 x 3040 pixels, Type d\'écran: Dynamic AMOLED. Fréquence du processeur: 2,7 GHz. Capacité de la RAM: 8 Go, ');
        $product2->setImage('https://images-na.ssl-images-amazon.com/images/I/311bVSMjuFL._AC_.jpg');
        $product2->setCategorie($category3);
        $product3 = new Produit();
        $product3->setName('Apple iPhone 11 Pro (64 Go) - Vert Nuit');
        $product3->setPrix(1159,00);
        $product3->setDescription('Écran OLED Super Retina XDR 5,8 pouces\n Résistant à la poussière et à l’eau (jusqu’à 4 mètres pendant 30 minutes maximum, IP68) \n Triple appareil photo avec ultra grand-angle, grand-angle et téléobjectif 12 Mpx, \n Caméra avant TrueDepth 12 Mpx avec mode Portrait, vidéo 4K et ralenti \Face ID pour l’authentification sécurisée et Apple Pay \n Puce A13 Bionic avec Neural Engine de troisième génération \n Recharge rapide avec l’adaptateur 18 W fourni \n Recharge sans fil');
        $product3->setImage('https://images-na.ssl-images-amazon.com/images/I/81mxun%2B6pEL._AC_SL1500_.jpg');
        $product3->setCategorie($category3);
        /*$product4 = new Produit();
        $product4->setName('Keyboard');
        $product4->setPrix(101.21);
        $product4->setDescription('Ergonomic and stylish!');
        $product4->setImage('Ergonomic and stylish!');
        $product4->setCategorie($category4);
        $product5 = new Produit();
        $product5->setName('Keyboard');
        $product5->setPrix(101.21);
        $product5->setDescription('Ergonomic and stylish!');
        $product5->setImage('Ergonomic and stylish!');
        $product5->setCategorie($category4);
        $product6 = new Produit();
        $product6->setName('Keyboard');
        $product6->setPrix(101.21);
        $product6->setDescription('Ergonomic and stylish!');
        $product6->setImage('Ergonomic and stylish!');
        $product6->setCategorie($category4);
        $product7 = new Produit();
        $product7->setName('Keyboard');
        $product7->setPrix(101.21);
        $product7->setDescription('Ergonomic and stylish!');
        $product7->setImage('Ergonomic and stylish!');
        $product7->setCategorie($category4);
        $product8 = new Produit();
        $product8->setName('Keyboard');
        $product8->setPrix(101.21);
        $product8->setDescription('Ergonomic and stylish!');
        $product8->setImage('Ergonomic and stylish!');
        $product8->setCategorie($category4);
        $product9 = new Produit();
        $product9->setName('Keyboard');
        $product9->setPrix(101.21);
        $product9->setDescription('Ergonomic and stylish!');
        $product9->setImage('Ergonomic and stylish!');
        $product9->setCategorie($category4);
        $product10 = new Produit();
        $product10->setName('Keyboard');
        $product10->setPrix(101.21);
        $product10->setDescription('Ergonomic and stylish!');
        $product10->setImage('Ergonomic and stylish!');
        $product10->setCategorie($category4);
        $product11 = new Produit();
        $product11->setName('Keyboard');
        $product11->setPrix(101.21);
        $product11->setDescription('Ergonomic and stylish!');
        $product11->setImage('Ergonomic and stylish!');
        $product11->setCategorie($category4);
        $product12 = new Produit();
        $product12->setName('Keyboard');
        $product12->setPrix(101.21);
        $product12->setDescription('Ergonomic and stylish!');
        $product12->setImage('Ergonomic and stylish!');
        $product12->setCategorie($category4);*/
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($category1);
        $em->persist($category2);
        $em->persist($category3);
        $em->persist($category4);
        $em->persist($category5);
        $em->persist($category6);
        for ($i=0; $i < 4; $i++) { 
            $em->persist(${'product' . $i});
        }
        //$em->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product0->getId());
    }
}

