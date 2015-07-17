<?php

namespace SONAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SONAcl\Entity\Resource;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager){
        
        $resource = new Resource;
        $resource->getNome("Posts");
        
        $manager->persist($resource);
        
        $resource = new Resource;
        $resource->getNome("Páginas");
        
        $manager->persist($resource);
        
        $manager->flush();
        
        
    }

    public function getOrder() {
        return 1;
    }

}