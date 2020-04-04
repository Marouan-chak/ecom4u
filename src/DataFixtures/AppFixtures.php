<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Categories;
use App\Entity\Produit;
use App\Entity\User;
use App\Entity\Commande;
use App\Entity\CommandeProduits;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        /* créeation des catégorie  */
        $category1 = new Categories();
        $category1->setName('Ordinateurs');
        $category1->setDescription('ordinateur portable et bureau');
        $category2 = new Categories();
        $category2->setDescription('vetement homme et femme');
        $category2->setName('Vêtements');
        $category3 = new Categories();
        $category3->setName('Téléphone');
        $category3->setDescription('smartphones');
        $category4 = new Categories();
        $category4->setName('High-Tech');
        $category4->setDescription('tout type de produits high-Tech');
        $category5 = new Categories();
        $category5->setName('Livres');
        $category5->setDescription('livres anciens et nouveaux');
        $category6 = new Categories();
        $category6->setName('Multimédia');
        $category6->setDescription('Multimédia');



        /* créeation des produits  */

        $product0 = new Produit();
        $product0->setName('Rii RK907 Clavier Filaire Compact Ultra-Mince USB Version Française(AZERTY) pour Mac et PC, Windows 10/8 / 7 / Vista/XP (Noir)');
        $product0->setPrix(14.99);
        $product0->setDescription('- Clavier filaire compact ultra-mince taille complète (104 touches) avec pavé numérique\n- Connexion USB filaire simple, vous profiterez d’une expérience de frappe confortable et silencieuse');
        $product0->setImage('https://images-na.ssl-images-amazon.com/images/I/71LvOecD%2BeL._AC_SL1500_.jpg');
        $product0->setCategorie($category4);
        $product0->setquantite(10);

        $product1 = new Produit();
        $product1 = new Produit();
        $product1->setDescription("Samsung Galaxy S10 Plus\n Samsung nous surprend encore avec la nouvelle génération de sa gamme Galaxy. Le nouvel Samsung Galaxy S10 apporte des améliorations significatives par rapport à son prédécesseur. L'écranInfinity-O de 6,4, déverrouillage avec une empreinte digitale intégré dans lécran,3 appareils photo, PowerSharesans fil et plus.");
        $product1->setImage("https://www.cdiscount.com/pdt2/2/8/n/1/400x400/samgalaxs10p128n/rw/samsung-galaxy-s10-128-go-noir-prisme.jpg");
        $product1->setName("Galaxy s10+");
        $product1->setPrix(749);
        $product1->setCategorie($category3);
        $product1->setquantite(10);

        $product2 = new Produit();
        $product2->setDescription("Google Pixel 4. Taille de l'écran: 14,5 cm (5.7, Résolution de l écran: 1080 x 2280 pixels, Type d'écran: OLED. Fréquence du processeur: 2,84 GHz, Famille de processeur: Qualcomm Snapdragon, Modèle de processeur: 855. Capacité de la RAM: 6 Go, Capacité de stockage interne: 64 Go. Résolution de la caméra arrière (numerique): 16 MP, Type de caméra arrière: Double caméra. 3G, 4G. Capacité de la batterie: 2800 mAh. Couleur du produit: Noir. Poids: 162 g");
        $product2->setImage("https://www.cdiscount.com/pdt2/6/6/9/1/700x700/goo0842776115669/rw/google-smartphone-pixel-4-xl-64-go-simplement-noir.jpg");
        $product2->setName("Google Pixel 4");
        $product2->setPrix(946);
        $product2->setCategorie($category3);
        $product2->setquantite(10);

        $product3 = new Produit();
        $product3->setDescription("Le Huawei P30 est équipé du processeur Kirin 980 un processeur dédié à l'intelligence artificielle. Il est conçu d'une batterie de 3650 mAH lui offrant une autonomie de longue durée avec charge ultra-rapide et sans fil. Il possède une triple caméra conçue avec Leica avec modes grand angle et macro.");
        $product3->setCategorie($category3);
        $product3->setImage("https://www.cdiscount.com/pdt2/2/8/b/1/700x700/huaweip30pro128b/rw/huawei-p30-pro-noir-128-go.jpg");
        $product3->setName("Huawei P30 Pro");
        $product3->setPrix(649);
        $product3->setquantite(10);

        $product4 = new Produit();
        $product4->setDescription("Apple iPhone 11 Pro (64 Go) - Gris Sidéral");
        $product4->setCategorie($category3);
        $product4->setImage("https://images-na.ssl-images-amazon.com/images/I/715HCLsOHbL._AC_SL1500_.jpg");
        $product4->setName("Iphone 11");
        $product4->setPrix(1200);
        $product4->setquantite(10);

        $product5 = new Produit();
        $product5->setDescription("Un casque stéréo Dual Bud léger qui se trouve parfaitement sur vos oreilles. Fournit une fonctionnalité mains libres pratique, vous permettant d'écouter votre musique ou de passer des appels. Ce casque stéréo mains libres Samsung 3,5 mm convient à la plupart des téléphones portables, PDA, jeux portables et lecteurs de musique avec n'importe quelle prise standard de 3,5 MM. Inclut un bouton de réponse d'appel et un bouton de volume sur le micro.");
        $product5->setCategorie($category6);
        $product5->setImage("https://www.cdiscount.com/pdt2/4/9/6/1/700x700/jvc4975769453496/rw/jvc-ha-s60bt-b-e-casque-bluetooth-circum-aural.jpg");
        $product5->setName("Casque");
        $product5->setPrix(20);
        $product5->setquantite(10);

        $product6 = new Produit();
        $product6->setDescription("Compatible avec iphone7 / 7plus | iphone8 / 8plus | iphoneX | iphone Xs / Xs MAX");
        $product6->setCategorie($category6);
        $product6->setImage("https://www.cdiscount.com/pdt2/8/3/5/1/700x700/sam3700587428835/rw/samsung-ehs64avfwe-kit-pieton-stereo-filaire-origi.jpg");
        $product6->setName("Ecouteurs");
        $product6->setPrix(30);
        $product6->setquantite(10);

        $product7 = new Produit();
        $product7->setDescription("Le Rode SmarLav+ est un micro cravate pour smartphone.");
        $product7->setCategorie($category6);
        $product7->setImage("https://www.cdiscount.com/pdt2/3/9/4/1/700x700/auc0699917014394/rw/microphone-a-condensateur-podcasting-studio-enreg.jpg");
        $product7->setName("Microphone");
        $product7->setPrix(30);
        $product7->setquantite(10);

        $product8 = new Produit();
        $product8->setDescription("WEBCAM VIDÉO FULL HD: La webcam Logitech C920 HD Pro fonctionne en vidéo Full HD 1080p sur Skype et vous permet de jouer en streaming avec une qualité HD 720p puissante");
        $product8->setCategorie($category6);
        $product8->setImage("https://www.cdiscount.com/pdt2/0/5/5/1/700x700/960001055/rw/logitech-webcam-hd-pro-c920-refresh-microphone-i.jpg");
        $product8->setName("Web Cam");
        $product8->setPrix(25);
        $product8->setquantite(10);

        $product9 = new Produit();
        $product9->setDescription("TOSHIBA Disque dur Canvio basics - 1 To - USB 3.0 - 5 Gbits/s - Système de fichiers : NTFS - Alimentation : Bus USB (max. 900 mA) - Certifications : Formaté NTFS pour Microsoft Windows 10, Windows 8.1, Windows 7 - Noir.");
        $product9->setCategorie($category4);
        $product9->setImage("https://www.cdiscount.com/pdt2/0/1/8/1/700x700/tos4260557510018/rw/toshiba-disque-dur-externe-canvio-basics-1-t.jpg");
        $product9->setName("Disque dur");
        $product9->setPrix(100);
        $product9->setquantite(10);

        $product10 = new Produit();
        $product10->setDescription("AMD Processeur Ryzen 5 3400G Wraith Spire cooler");
        $product10->setCategorie($category4);
        $product10->setImage("https://www.cdiscount.com/pdt2/b/o/x/1/700x700/yd3400c5fhbox/rw/amd-processeur-ryzen-5-3400g-wraith-spire-cooler.jpg");
        $product10->setName("Proccesseur");
        $product10->setPrix(150);
        $product10->setquantite(10);

        $product11 = new Produit();
        $product11->setDescription("L’association de cartes SD définit les vitesses de carte à l’aide de deux termes: classe de vitesse et classe de vitesse UHS.");
        $product11->setCategorie($category4);
        $product11->setImage("https://www.cdiscount.com/pdt2/0/2/8/1/700x700/auc6954524896028/rw/16g-carte-memoire-sd-grande-vitesse-classe-10-16-g.jpg");
        $product11->setName("Carte memoire sd");
        $product11->setPrix(25);
        $product11->setquantite(10);

        $product12 = new Produit();
        $product12->setDescription("256GO Clé USB 3.0 Stick Rotatif Pendrive Mémoire Flash Externe Stockage NOIR");
        $product12->setCategorie($category4);
        $product12->setImage("https://www.cdiscount.com/pdt2/7/3/6/1/700x700/tem6427643888736/rw/256go-cle-usb-3-0-stick-rotatif-pendrive-memoire-f.jpg");
        $product12->setName("Cle USB");
        $product12->setPrix(1200);
        $product12->setquantite(10);

        $product13 = new Produit();
        $product13->setDescription(" Moi-même je le raconte, je le vois, et je me dis c'est pas possible d'avoir survécu...
Arrêtée par la Gestapo en mars 1944 à Avignon avec son père, son petit-frère de douze ans et son neveu, Ginette Kolinka est déportée à Auschwitz-Birkenau : elle sera seule à en revenir, après avoir été transférée à Bergen-Belsen, Raguhn et Theresienstadt. Dans ce convoi du printemps 1944 se trouvaient deux jeunes filles  dont elle devint amie, plus tard : Simone Veil et Marceline Rosenberg, pas encore Loridan – Ivens. ");
        $product13->setImage("https://images-na.ssl-images-amazon.com/images/I/413csO3YrVL._SX319_BO1,204,203,200_.jpg");
        $product13->setName("Retour à Birkenau");
        $product13->setPrix(13);
        $product13->setCategorie($category5);
        $product13->setquantite(10);

        $product14 = new Produit();
        $product14->setDescription("DELL PC Portable - Inspiron 15 5593 - 15,6  FHD - Intel Core i5-1035G1 - RAM 8Go - Stockage 256Go SSD - Silver");
        $product14->setCategorie($category1);
        $product14->setImage("https://www.cdiscount.com/pdt2/6/5/2/1/700x700/del5397184350652/rw/dell-pc-portable-inspiron-15-5593-15-6-fhd.jpg");
        $product14->setName("DELL");
        $product14->setPrix(800);
        $product14->setquantite(10);

        $product15 = new Produit();
        $product15->setDescription("APPLE Macbook Air 13,3  - Intel Core i5 - RAM 8Go - 128Go SSD");
        $product15->setCategorie($category1);
        $product15->setImage("https://www.cdiscount.com/pdt2/n/f/a/1/700x700/bunhp17by0085nfa/rw/hp-pc-portable-17-3-hd-celeron-n4000-ram-8g.jpg");
        $product15->setName("HP");
        $product15->setPrix(1200);
        $product15->setquantite(10);

        $product16 = new Produit();
        $product16->setCategorie($category1);
        $product16->setImage("https://www.cdiscount.com/pdt2/0/4/7/1/700x700/tos4051528307047/rw/toshiba-r50-c-14f-intel-win10home.jpg");
        $product16->setName("Toshiba");
        $product16->setPrix(700);
        $product16->setquantite(10);

        $product17 = new Produit();
        $product17->setDescription("New Balance - ML574EGB - Baskets - Homme - Rouge (Burgundy) - 36 EU ");
        $product17->setImage("https://images-eu.ssl-images-amazon.com/images/I/41dl8oESB+L._AC_UL260_SR200,260_.jpg");
        $product17->setName("Basket New Balance ");
        $product17->setPrix(70);
        $product17->setCategorie($category2);
        $product17->setquantite(10);

        $product18 = new Produit();
        $product18->setDescription("Levi's 502 Regular Taper Jean Fuseau Homme");
        $product18->setImage("https://m.media-amazon.com/images/I/918y99yB8RL._AC_UL320_ML3_.jpg");
        $product18->setName("Jeans Levis");
        $product18->setPrix(50);
        $product18->setCategorie($category2);
        $product18->setquantite(10);


        $product19 = new Produit();
        $product19->setDescription("Pinkpum Homme Chemise en Coton à Carreaux Slim Fit Manches Longues Basic Business Loisirs M-3XL");
        $product19->setImage("https://images-eu.ssl-images-amazon.com/images/I/41nEuUA4SLL._AC_UL260_SR200,260_.jpg");
        $product19->setName("Chemise Homme");
        $product19->setPrix(19, 99);
        $product19->setCategorie($category2);
        $product19->setquantite(10);

        $product20 = new Produit();
        $product20->setDescription("Pinkpum Homme Chemise en Coton à Carreaux Slim Fit Manches Longues Basic Business Loisirs M-3XL");
        $product20->setImage("https://images-eu.ssl-images-amazon.com/images/I/41nEuUA4SLL._AC_UL260_SR200,260_.jpg");
        $product20->setName("Chemise Homme");
        $product20->setPrix(19, 99);
        $product20->setCategorie($category2);
        $product20->setquantite(10);

        $product21 = new Produit();
        $product21->setDescription("«  Cette histoire me hante depuis l’enfance…  »
S’interrogeant sur la manière dont son grand-père paternel, Léonce Schwartz, a échappé à la déportation, Anne Sinclair découvre un chapitre méconnu de la persécution sous l’Occupation  : la «  rafle des notables  ».
En décembre 1941, les Allemands arrêtent 743 Juifs français, chefs d’entreprise, avocats, écrivains, magistrats. Pour parvenir au quota de mille détenus exigé par Berlin, ils adjoignent à cette population privilégiée 300 Juifs étrangers déjà prisonniers à Drancy.
Tous sont enfermés au camp de Compiègne, sous administration allemande  : un vrai camp de concentration nazi d’où partira, en mars 1942, le premier convoi de déportés de France vers Auschwitz (avant la Rafle du Vél’ d’Hiv de juillet 1942).
En reconstituant la coexistence dans ce camp de bourgeois assimilés depuis des générations et de Juifs étrangers familiers des persécutions, ce récit très personnel raconte avec émotion une descente aux enfers.
«  Essayer de redonner un peu de chair aux disparus est devenu pour moi une obsession  », écrit l’auteur, dont le fardeau intime sert de fil rouge à une œuvre de mémoire collective.
De sorte que l’enquête familiale sur le destin énigmatique de Léonce se fait peu à peu enquête historique sur la tragédie de Compiègne, puis hommage à ceux qui n’en sont pas revenus.");
        $product21->setImage("https://images-na.ssl-images-amazon.com/images/I/41bAvCcl3%2BL._SX324_BO1,204,203,200_.jpg");
        $product21->setName("La rafle des notables");
        $product21->setPrix(13);
        $product21->setCategorie($category5);
        $product21->setquantite(10);

        $product22 = new Produit();
        $product22->setDescription("L’idée d’extraire de ma biographie les quelques passages qui peuvent être regardés comme d’utile pédagogie vis-à-vis de la jeunesse d’aujourd’hui m’a paru séduisante. Simone Veil. Cette édition pédagogique regroupe les quatre premiers chapitres d’Une vie et couvre la période 1927-1954. Ce que Simone Veil a vécu durant ces années – où elle passa d’une enfance protégée à l’horreur des camps de concentration, puis retourna à la « vie normale » ");
        $product22->setImage("https://images-na.ssl-images-amazon.com/images/I/4130EmN6tzL._SX307_BO1,204,203,200_.jpg");
        $product22->setName("Une jeunesse au temps de la Shoah: Extraits d'Une vie");
        $product22->setPrix(5, 47);
        $product22->setCategorie($category5);
        $product22->setquantite(10);

        $product23 = new Produit();
        $product23->setDescription(" Moi-même je le raconte, je le vois, et je me dis c'est pas possible d'avoir survécu...
Arrêtée par la Gestapo en mars 1944 à Avignon avec son père, son petit-frère de douze ans et son neveu, Ginette Kolinka est déportée à Auschwitz-Birkenau : elle sera seule à en revenir, après avoir été transférée à Bergen-Belsen, Raguhn et Theresienstadt. Dans ce convoi du printemps 1944 se trouvaient deux jeunes filles  dont elle devint amie, plus tard : Simone Veil et Marceline Rosenberg, pas encore Loridan – Ivens. ");
        $product23->setImage("https://images-na.ssl-images-amazon.com/images/I/413csO3YrVL._SX319_BO1,204,203,200_.jpg");
        $product23->setName("Retour à Birkenau");
        $product23->setPrix(13);
        $product23->setCategorie($category5);
        $product23->setquantite(10);

        $product24 = new Produit();
        $product24->setDescription(" J'irai de l'Aral à la Caspienne. Je gagnerai l'Azerbaïdjan à bord d'un ferry. De Bakou, je cheminerai vers la Turquie par la Géorgie. À pied, à vélo, je ne sais pas encore, mais loyalement, sans propulsion motorisée. Au bout de ma route, j'aurai relié trois mers, abattant le même trajet que celui d'une larme d'or noir de la haute Asie convoyée à travers steppes et monts pour que le monde poursuive sa marche folle.Profitant de cette traversée de terres à haute valeur pétrolifère, je consacrerai mon temps d'avancée solitaire à réfléchir au mystère de l'énergie. Pétrole et force vitale procèdent du même principe : l'être humain recèle un gisement d'énergie que des forages propices peuvent faire jaillir.");
        $product24->setImage("https://images-na.ssl-images-amazon.com/images/I/51GBBDoyJPL._SX303_BO1,204,203,200_.jpg");
        $product24->setName("Eloge de l'énergie vagabonde");
        $product24->setPrix(15, 55);
        $product24->setCategorie($category5);
        $product24->setquantite(10);



        /* création des utilisateurs */
        $admin1 = new User();
        $admin1->setEmail('admin@yahoo.fr');
        $admin1->setNom('admin');
        $admin1->setPassword(
            $this->encoder->encodePassword($admin1, 'admin')
        );
        $admin1->setPrenom('adminPr');
        $admin1->setRole('ROLE_ADMIN');

        $user1 = new User();
        $user1->setEmail('user@yahoo.fr');
        $user1->setNom('user');
        $user1->setPassword(
            $this->encoder->encodePassword($user1, 'user')
        );
        $user1->setPrenom('userPr');
        $user1->setRole('ROLE_USER');
        $manager->persist($admin1);
        $manager->flush();
        $manager->persist($user1);
        $manager->flush();

        /* creéation des commmandes */

        $commande1 = new Commande();
        $commande1->setDate(new \DateTime('02-04-2019'));
        $commande1->setStatut('Shipped');
        $commande1->addProduit($product1);
        $commande1->addProduit($product2);
        $commande1->addProduit($product3);
        $commande1->setUser($user1);
        $commande2 = new commande();
        $commande2->setDate(new \DateTime('03-04-2019'));
        $commande2->setStatut('Shipped');
        $commande2->addProduit($product1);
        $commande2->addProduit($product4);
        $commande2->addProduit($product5);
        $commande2->setUser($user1);


        /* attribuant des quantité pour les produits demander */
        $ComProd = new CommandeProduits();
        $ComProd->setProduits($product1);
        $ComProd->setCommande($commande1);
        $ComProd->setQuantity(5);
        $manager->persist($ComProd);
        $ComProd2 = new CommandeProduits();
        $ComProd2->setProduits($product2);
        $ComProd2->setCommande($commande1);
        $ComProd2->setQuantity(2);
        $manager->persist($ComProd2);


        /* persiste catégories */

        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);
        $manager->persist($category6);

        /* persiste produits */

        for ($i = 0; $i < 25; $i++) {
            $manager->persist(${'product' . $i});
        }


        /* persiste commandes */

        $manager->persist($commande1);
        $manager->persist($commande2);



        $manager->flush();
    }
}
