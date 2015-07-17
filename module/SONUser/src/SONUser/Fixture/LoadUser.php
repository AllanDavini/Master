<?php

namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use SONUser\Entity\User;

class LoadUser extends AbstractFixture
{
    public function load(ObjectManager $manager){
        $user = new user();
        $user->setNome("Wesley")
                ->setEmail("wesley.teste@schoolofnet.com")
                ->setPassword(123456)
                ->setActive(true);
        
         $manager->persist($user);
        
        $user = new user();
        $user->setNome("Admin")
                ->setEmail("Admin.teste@schoolofnet.com")
                ->setPassword(123456)
                ->setActive(true);
               
        $manager->persist($user);
        
        $manager->flush();
        
    }
    
}