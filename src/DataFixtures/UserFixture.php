<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct (UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
   
   
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user -> setEmail('admin@yahoo.fr');
        $user -> setNom('admin');
        $user -> setPassword(
            $this->encoder->encodePassword($user, 'admin')
            );
        $user -> setPrenom('adminPr');
        $user -> setRole('ROLE_ADMIN');
        $manager -> persist($user);
        $manager->flush();
    }
    
}
