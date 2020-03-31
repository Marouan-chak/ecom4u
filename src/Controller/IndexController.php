<?php
namespace App\Controller;
use App\Entity\Produit;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{
    public function Default()
    {
        return $this->render('indeex.html.twig');
    }
    public function Products(){
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $products = $repository->findAll();
        $response = array();
        foreach ($products as $product) {
            $response[] = array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'categorie' => $product->getCategorie(),
                'description' => $product->getDescription(),
                'prix' => $product->getPrix(),
                'image' => $product->getImage(),
                // other fields
            );
        }
        return new JsonResponse(json_encode($response));
    }
    public function findProduct($idProduct){
        //$productId = $request->attributes->get('_route_params');
        //Find product by id and return a json object with all product information
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $product = $repository->find($idProduct);
        
        $response[] = array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'categorie' => $product->getCategorie(),
        'description' => $product->getDescription(),
        'prix' => $product->getPrix(),
        'image' => $product->getImage(),
        // other fields
        );
        
        return new Response(json_encode($response));
        }
        
    public function ProductsByCategorieId($idCategorie){
        $repository = $this->getDoctrine();
        $repProduit=$repository->getRepository(Produit::class);
        $repCategorie=$repository->getRepository(Categories::class);
        $categorie = $repCategorie->find($idCategorie);
        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categoori found for id '.$idCategorie
            );
        }
        $products=$repProduit->findAll();
        $response = array();
        
        foreach ($products as $product) {
            if ($categorie == $product->getCategorie()) {
                $response[] = array(
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'categorie' => $product->getCategorie(),
                    'description' => $product->getDescription(),
                    'prix' => $product->getPrix(),
                    'image' => $product->getImage(),
                    // other fields
                );
            }
            
        }
        return new JsonResponse(json_encode($response));
    }

    public function Array()
    {
        
        $repository = $this->getDoctrine()->getRepository(Categories::class);
        $categories = $repository->findAll();
        $response = array();
        foreach ($categories as $categorie) {
            $response[] = array(
                'id' => $categorie->getId(),
                'name' => $categorie->getName(),
                // other fields
            );
        }
        return new JsonResponse(json_encode($response));}


    public function addUser()
    {
        
        $email=$_POST['email1']; // Fetching Values from URL.
        $password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
        $passwordr= sha1($_POST['password2']); // Password Encryption, If you like you can also leave sha1.

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $a= "Invalid Email.......";
            }
        
        return new Response($passwordr);
    }
    public function checkUser()
    {
        
        $email=$_POST['email1']; // Fetching Values from URL.
        $password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $a=0;
        
        return new Response($a);
    }
    
}

