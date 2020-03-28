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

        $product1->setDescription("Samsung Galaxy S10 Plus\n Samsung nous surprend encore avec la nouvelle génération de sa gamme Galaxy. Le nouvel Samsung Galaxy S10 apporte des améliorations significatives par rapport à son prédécesseur. L'écranInfinity-O de 6,4, déverrouillage avec une empreinte digitale intégré dans lécran,3 appareils photo, PowerSharesans fil et plus.");
        $product1->setImage("https://www.cdiscount.com/pdt2/2/8/n/1/400x400/samgalaxs10p128n/rw/samsung-galaxy-s10-128-go-noir-prisme.jpg");
        $product1->setName("Galaxy s10+");
        $product1->setPrix(749);
        $product1->setCategorie($category3);

        $product2 = new Produit();

        $product2->setDescription("Google Pixel 4. Taille de l'écran: 14,5 cm (5.7, Résolution de l écran: 1080 x 2280 pixels, Type d'écran: OLED. Fréquence du processeur: 2,84 GHz, Famille de processeur: Qualcomm Snapdragon, Modèle de processeur: 855. Capacité de la RAM: 6 Go, Capacité de stockage interne: 64 Go. Résolution de la caméra arrière (numerique): 16 MP, Type de caméra arrière: Double caméra. 3G, 4G. Capacité de la batterie: 2800 mAh. Couleur du produit: Noir. Poids: 162 g");
    $product2->setImage("https://www.cdiscount.com/pdt2/6/6/9/1/700x700/goo0842776115669/rw/google-smartphone-pixel-4-xl-64-go-simplement-noir.jpg");
    $product2->setName("Google Pixel 4");
    $product2->setPrix(946);
    $product2->setCategorie($category3);




    $product3 = new Produit();
    $product3->setDescription("Le Huawei P30 est équipé du processeur Kirin 980 un processeur dédié à l'intelligence artificielle. Il est conçu d'une batterie de 3650 mAH lui offrant une autonomie de longue durée avec charge ultra-rapide et sans fil. Il possède une triple caméra conçue avec Leica avec modes grand angle et macro.");
    $product3->setCategorie($category3);
    $product3->setImage("https://www.cdiscount.com/pdt2/2/8/b/1/700x700/huaweip30pro128b/rw/huawei-p30-pro-noir-128-go.jpg");
    $product3->setName("Huawei P30 Pro");
    $product3->setPrix(649);
    $product4 = new Produit();

    $product4->setDescription("Apple iPhone 11 Pro (64 Go) - Gris Sidéral");
    $product4->setCategorie($category3);
    $product4->setImage("https://images-na.ssl-images-amazon.com/images/I/715HCLsOHbL._AC_SL1500_.jpg");
    $product4->setName("Iphone 11");
    $product4->setPrix(1200);



    $product5 = new Produit();
    $product5->setDescription("Un casque stéréo Dual Bud léger qui se trouve parfaitement sur vos oreilles. Fournit une fonctionnalité mains libres pratique, vous permettant d'écouter votre musique ou de passer des appels. Ce casque stéréo mains libres Samsung 3,5 mm convient à la plupart des téléphones portables, PDA, jeux portables et lecteurs de musique avec n'importe quelle prise standard de 3,5 MM. Inclut un bouton de réponse d'appel et un bouton de volume sur le micro.");
    $product5->setCategorie($category6);
    $product5->setImage("https://www.cdiscount.com/pdt2/4/9/6/1/700x700/jvc4975769453496/rw/jvc-ha-s60bt-b-e-casque-bluetooth-circum-aural.jpg");
    $product5->setName("Casque");
    $product5->setPrix(20);



    $product6 = new Produit();
    $product6->setDescription("Compatible avec iphone7 / 7plus | iphone8 / 8plus | iphoneX | iphone Xs / Xs MAX");
    $product6->setCategorie($category6);
    $product6->setImage("https://www.cdiscount.com/pdt2/8/3/5/1/700x700/sam3700587428835/rw/samsung-ehs64avfwe-kit-pieton-stereo-filaire-origi.jpg");
    $product6->setName("Ecouteurs");
    $product6->setPrix(30);




    $product7 = new Produit();
    $product7->setDescription("Le Rode SmarLav+ est un micro cravate pour smartphone.");
    $product7->setCategorie($category6);
    $product7->setImage("https://www.cdiscount.com/pdt2/3/9/4/1/700x700/auc0699917014394/rw/microphone-a-condensateur-podcasting-studio-enreg.jpg");
    $product7->setName("Microphone");
    $product7->setPrix(30);


    $product8 = new Produit();
    $product8->setDescription("WEBCAM VIDÉO FULL HD: La webcam Logitech C920 HD Pro fonctionne en vidéo Full HD 1080p sur Skype et vous permet de jouer en streaming avec une qualité HD 720p puissante");
    $product8->setCategorie($category6);
    $product8->setImage("https://www.cdiscount.com/pdt2/0/5/5/1/700x700/960001055/rw/logitech-webcam-hd-pro-c920-refresh-microphone-i.jpg");
    $product8->setName("Web Cam");
    $product8->setPrix(25);



    $product9 = new Produit();
    $product9->setDescription("TOSHIBA Disque dur Canvio basics - 1 To - USB 3.0 - 5 Gbits/s - Système de fichiers : NTFS - Alimentation : Bus USB (max. 900 mA) - Certifications : Formaté NTFS pour Microsoft Windows 10, Windows 8.1, Windows 7 - Noir.");
    $product9->setCategorie($category4);
    $product9->setImage("https://www.cdiscount.com/pdt2/0/1/8/1/700x700/tos4260557510018/rw/toshiba-disque-dur-externe-canvio-basics-1-t.jpg");
    $product9->setName("Disque dur");
    $product9->setPrix(100);




    $product10 = new Produit();
    $product10->setDescription("AMD Processeur Ryzen 5 3400G Wraith Spire cooler");
    $product10->setCategorie($category4);
    $product10->setImage("https://www.cdiscount.com/pdt2/b/o/x/1/700x700/yd3400c5fhbox/rw/amd-processeur-ryzen-5-3400g-wraith-spire-cooler.jpg");
    $product10->setName("Proccesseur");
    $product10->setPrix(150);




    $product11 = new Produit();
    $product11->setDescription("L’association de cartes SD définit les vitesses de carte à l’aide de deux termes: classe de vitesse et classe de vitesse UHS.");

    $product11->setCategorie($category4);
    $product11->setImage("https://www.cdiscount.com/pdt2/0/2/8/1/700x700/auc6954524896028/rw/16g-carte-memoire-sd-grande-vitesse-classe-10-16-g.jpg");
    $product11->setName("Carte memoire sd");
    $product11->setPrix(25);




    $product12 = new Produit();
    $product12->setDescription("256GO Clé USB 3.0 Stick Rotatif Pendrive Mémoire Flash Externe Stockage NOIR");

    $product12->setCategorie($category4);
    $product12->setImage("https://www.cdiscount.com/pdt2/7/3/6/1/700x700/tem6427643888736/rw/256go-cle-usb-3-0-stick-rotatif-pendrive-memoire-f.jpg");
    $product12->setName("Cle USB");
    $product12->setPrix(1200);



    $product13 = new Produit();
    $product13->setDescription("HP PC Portable - 17,3 HD+ - Celeron N4000 - RAM 8Go - Stockage 1To - Windows 10 + Sacoche + Souris");

    $product13->setCategorie($category1);
    $product13->setImage("https://www.cdiscount.com/pdt2/n/f/a/1/700x700/bunhp17by0085nfa/rw/hp-pc-portable-17-3-hd-celeron-n4000-ram-8g.jpg");
    $product13->setName("HP");
    $product13->setPrix(1200);


    $product14 = new Produit();

    $product14->setDescription("DELL PC Portable - Inspiron 15 5593 - 15,6  FHD - Intel Core i5-1035G1 - RAM 8Go - Stockage 256Go SSD - Silver");

    $product14->setCategorie($category1);
    $product14->setImage("https://www.cdiscount.com/pdt2/6/5/2/1/700x700/del5397184350652/rw/dell-pc-portable-inspiron-15-5593-15-6-fhd.jpg");
    $product14->setName("DELL");
    $product14->setPrix(800);



    $product15 = new Produit();

    $product15->setDescription("APPLE Macbook Air 13,3  - Intel Core i5 - RAM 8Go - 128Go SSD");

    $product15->setCategorie($category1);
    $product15->setImage("https://www.cdiscount.com/pdt2/f/n/a/1/700x700/mqd32fna/rw/apple-macbook-air-13-3-intel-core-i5-ram-8go.jpg" );
    $product15->setName("Mac Book Air");
    $product15->setPrix(1200);




  $product16 = new Produit();
    $product16->setDescription("256GO Clé USB 3.0 Stick Rotatif Pendrive Mémoire Flash Externe Stockage NOIR");

    $product16->setCategorie($category1);
    $product16->setImage("https://www.cdiscount.com/pdt2/0/4/7/1/700x700/tos4051528307047/rw/toshiba-r50-c-14f-intel-win10home.jpg");
    $product16->setName("Toshiba");
    $product16->setPrix(700);

































        /*
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
        $product4 = new Produit();
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
        // tell Doctrine you want to (eventually) save the Produit (no queries yet)



        $em->persist($category1);
        $em->persist($category2);
        $em->persist($category3);
        $em->persist($category4);
        $em->persist($category5);
        $em->persist($category6);
        for ($i=1; $i < 17; $i++) {
            $em->persist(${'product' . $i});
        }
        //$em->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product0->getId());
    }
}
