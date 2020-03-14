<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{
    public function Default()
    {
        return $this->render('indeex.html.twig');
    }
    public function Array()
    {
        
        return $this->json(array (array("name"=>"Informatique","id"=>1),
        array("name"=>"Multimedia","id"=>2),
        array("name"=>"Ordinateur","id"=>3),
        array("name"=>"Telephone","id"=>4)
    ));}
    public function Informatique()
    {
        return $this->json(array (array("name"=>"Clavier Logitech","id"=>1),
        array("name"=>"HDD 500GB","id"=>2),
        array("name"=>"Souris Logitech","id"=>3),
        array("name"=>"Routeur Cisco","id"=>4)
    ));}
    public function Multimedia()
    {
        return $this->json(array (array("name"=>"Casque Beats","id"=>1),
        array("name"=>"Enceinte JBL","id"=>2),
        array("name"=>"Ecouteurs AKG","id"=>3)
    ));}
    public function Telephone()
    {
        return $this->json(array (array("name"=>"Galaxy s10+","id"=>1,"pic1"=>"https://www.cdiscount.com/pdt2/2/8/n/1/400x400/samgalaxs10p128n/rw/samsung-galaxy-s10-128-go-noir-prisme.jpg","pic2"=>"https://www.notebookcheck.biz/fileadmin/_processed_/3/5/csm_Samsung_Galaxy_S10_Plus_5594_5bd9b9c7be.jpg","prix"=>749),
        array("name"=>"Google Pixel 4","id"=>2,"pic1"=>"https://www.cdiscount.com/pdt2/6/6/9/1/700x700/goo0842776115669/rw/google-smartphone-pixel-4-xl-64-go-simplement-noir.jpg","pic2"=>"https://www.cdiscount.com/pdt2/4/3/0/1/700x700/goo0842776115430/rw/google-pixel-4-64go-blanc.jpg","prix"=>946),
        array("name"=>"Huawei P30 Pro","id"=>3,"pic1"=>"https://www.cdiscount.com/pdt2/2/8/b/1/700x700/huaweip30pro128b/rw/huawei-p30-pro-noir-128-go.jpg","pic2"=>"https://www.cdiscount.com/pdt2/2/8/b/2/700x700/huaweip30pro128b/rw/huawei-p30-pro-noir-128-go.jpg","prix"=>649),
        array("name"=>"Iphone 11 Pro","id"=>4,"pic1"=>"https://www.media-rdc.com/medias/7b35afb233403726994c0397dfc41bdc/p_580x580/apple-iphone-11-pro-gris-sideral.png","pic2"=>"https://www.media-rdc.com/medias/6ee06f2d6d803f82a3e42e71059bc713/p_580x580/apple-iphone-11-pro-gris-sideral-2.png","prix"=>1049),
    ));}
    public function Ordinateur()
    {
        return $this->json(array (array("name"=>"Razer blade","id"=>1),
        array("name"=>"MacBook Pro","id"=>2),
        array("name"=>"Dell Aspiron","id"=>3),
        array("name"=>"Lenovo 134","id"=>4)
    ));
    }
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
    public function findProduct($idProduct){
        //$productId = $request->attributes->get('_route_params');
        //Find product by id and return a json object with all product information
        return $this->json(array ("name"=>"Galaxy s10+","desc"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti ad culpa assumenda corporis iusto quisquam hic amet incidunt eos molestias, perferendis, quia ullam, minus sapiente suscipit. Debitis at quam veritatis!","id"=>1,"pic1"=>"https://www.cdiscount.com/pdt2/2/8/n/1/400x400/samgalaxs10p128n/rw/samsung-galaxy-s10-128-go-noir-prisme.jpg","pic2"=>"https://www.notebookcheck.biz/fileadmin/_processed_/3/5/csm_Samsung_Galaxy_S10_Plus_5594_5bd9b9c7be.jpg","prix"=>749)
);
    }
}

