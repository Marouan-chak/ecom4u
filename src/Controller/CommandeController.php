<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(UserInterface $user)
    {

        $useer = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $user->getUsername()]);

        $response = array();
        $commandes = $useer->getCommandes();
        foreach ($commandes as $key => $commande) {
            $produitArray = array();
            $produits = $commande->getProduit();
            $response[$key] = array(
                'id' => $commande->getId(),
                'statut' => $commande->getStatut(),
                'date' => $commande->getDate()->format("Y-m-d"),



            );
            $response[$key]['produits'] = 'produit';


            foreach ($produits as $produit) {
                $produitArray[] = $produit->getName();
            }
            $response[$key]['produits'] = $produitArray;
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
