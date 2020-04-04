<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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

            //    $total=$total + $produit->getPrix();
            $total = $total + $produit->getPrix();
        }
        //  array_push($panierWithData, ['total' =>  $total]);


        $panierWithData['total'] = $total;
        //  $panierWithData['total']= $total ;
        //dd($panierWithData);
        return new JsonResponse(json_encode($panierWithData));
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

            //    $total=$total + $produit->getPrix();
            $total = $total + $produit->getPrix() * $quantity;
        }

        return new Response($total);
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

        dd($session->get('panier'));
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

        //dd($session->get('panier'));

    }
}
