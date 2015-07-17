<?php

namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

abstract class CrudController extends AbstractActionController {

    protected $em;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;

    public function indexAction() {
        $list = $this->getEm()
                ->getRepositiry($this->entity)
                ->findAll();
        $page = $this->params()->fromRoute('page');

        $paginato - new Paginator(new arrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(1);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }
    
    
    public function newAction(){
        $form = new $this->form();
        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setData($request->getPost());
            if($form->isValid()){
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());
                
                return $this->redirect->toRoute($this->route,array('controller'=>$this->controller));
            
            }
        }
        return new ViewModel(array('form'=>$form));
    }

    /**
     * 

     * @return \SONUser\Controller\EntityManager * @return EntityManager
     */
    protected function getEm() {
        if (null == $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }

}
