<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Categories;
use App\Entity\CommandeProduits;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;


class CartController extends AbstractController
{
    /**
     * @Route ("index/panier",name="cart_index")
     */

    public function index(SessionInterface $session)
    {
        $panier = $session->get('panier', []);
        $produit = new Produit();
        $panierWithData = array();

        $repository = $this->getDoctrine()->getRepository(Produit::class);


        foreach ($panier as $id => $quantity) {
            $produit = $repository->find($id);
            $total = 0;

            $panierWithData[] = array(
                'product' => $id,
                'quantity' => $quantity,
                'name' => $produit->getName(),
                'categorie' => $produit->getCategorie(),
                'description' => $produit->getDescription(),
                'prix' => $produit->getPrix(),
                'image' => $produit->getImage(),

            );
        }
        return new JsonResponse(json_encode($panierWithData));
    }

    /**
     * @Route ("index/panier/remove/{id}",name="remove")
     */
    public function remove($id, SessionInterface $session)
    {

        $panier = $session->get('panier', []);


        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        // and remove the item


        $session->set('panier', $panier);

        return new JsonResponse(json_encode($session->get('panier')));
    }

    /**
     * @Route ("index/panier/size",name="size")
     */
    public function size(SessionInterface $session)
    {

        $panier = $session->get('panier', []);


        return new Response(count($panier));
    }

    /**
     * @Route ("/total",name="total")
     */

    public function getTotal(SessionInterface $session)
    {


        $panier = $session->get('panier', []);
        $produit = new Produit();
        $panierWithData = array();

        $repository = $this->getDoctrine()->getRepository(Produit::class);

        $total = 0;
        foreach ($panier as $id => $quantity) {
            $produit = $repository->find($id);

            $total = $total + $produit->getPrix() * $quantity;
        }
        return new Response($total);
    }








    /**
     * @Route ("index/panier/add/{id}",name="cart_ad")
     */

    public function add($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }


        $session->set('panier', $panier);

        return new JsonResponse(json_encode($panier));
    }
    /**
     * @Route ("index/panier/valid",name="valid_cart")
     */

    public function valid(SessionInterface $session, UserInterface $user)
    {
        $manager = $this->getDoctrine()->getManager();

        $panier = $session->get('panier', []);
        $commande = new Commande();

        $repositoryP = $this->getDoctrine()->getRepository(Produit::class);
        $repositoryU = $this->getDoctrine()->getRepository(User::class);
        $user1 = $repositoryU->findOneBy(['email' => $user->getUsername()]);
        $commande->setDate(new \DateTime());
        $commande->setStatut('WAIT-VALIDATION');
        $commande->setUser($user1);

        foreach ($panier as $id => $quantity) {
            $produit = $repositoryP->find($id);
            $commande->addProduit($produit);


            $comProd = new CommandeProduits();
            $comProd->setProduits($produit);
            $comProd->setCommande($commande);
            $comProd->setQuantity($quantity);
            $manager->persist($comProd);
        }

        $manager->persist($commande);
        echo ($commande->getId());
        $manager->flush();

        return new JsonResponse(json_encode([$commande->getId() => $commande->getId()]));

        /*
        $response = new Response("commande prise en compte");
        $response->send(); 
         */
    }
}
