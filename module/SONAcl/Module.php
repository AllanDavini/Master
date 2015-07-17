<?php



namespace SONAcl;


use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\ModuleManager;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SONAcl\Form\Role' => function($sm)
                {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repo = $em->getRepository('SONAcl\Entity\Role');
                    $parent = $repo->fetchParent();
                    
                    return new Form\Role('role', $parent);
                },
                'SONAcl\Service\Role' => function($sm){
            return new Service\Role($sm->get('Doctrine\ORM\EntityManager'));
                },
                        
                'SONAcl\Service\Resource' => function($sm){
            return new Service\Resource($sm->get('Doctrine\ORM\EntityManager'));
                },
                        
                 'SONAcl\Permissions\Acl' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    
                    $repoRole = $em->getRepository("SONAcl\Entity\Role");
                    $roles = $repRole->findAll();
                    
                    $repoResource = $em->getRepository("SONAcl\Entity\Resource");
                    $resources = $repoResource->findAll();
                    
                    $repoPrivilege = $em->getRepository("SONAcl\Entity\Privilege");
                    $privileges = $repoPrivilege->findAll();
                    
                    return new Permissions\Acl($roles,$resources,$privileges);
                 }       
                
            )
        );
    }
    

}
