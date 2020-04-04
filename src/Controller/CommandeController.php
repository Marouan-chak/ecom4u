<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;



class CommandeController extends AbstractController
{
    /**
     * @Route("/commande/{id}", name="commande")
     */
    public function index($id)
    {

        $useer = $this->getDoctrine()->getRepository(User::class)->find($id);
        $response = array();
        $commandes = $useer->getCommandes();
        foreach ($commandes as $commande) {

            $response[] = array(
                'id' => $commande->getId(),

            );
        }
        return new JsonResponse(json_encode($response));
    }
    /**
     * @Route ("commande/produits/{id}", name="allProduct")
     */
    public function allProduct($id)
    {


        $commande = $this->getDoctrine()->getRepository(commande::class)->find($id);
        $response = array();
        $produits = $commande->getProduit();
        foreach ($produits as $produit) {

            $response[] = array(
                'nom' => $produit->getName(),

            );
        }
        return new JsonResponse(json_encode($response));
    }
}
