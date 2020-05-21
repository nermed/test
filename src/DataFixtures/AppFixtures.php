<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder= $encoder;
    } 
    public function load(ObjectManager $manager)
    {
        
        $user = new Admin();
        $user->setEmail('nermed@gmail.com');
        $user->setPassword($this->encoder->encodePassword($user, 'testtest'));
        $manager->persist($user);
        $manager->flush();
    }
}
