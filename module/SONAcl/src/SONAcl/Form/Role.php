<?php

namespace SONAcl\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class Role extends Form {
    
    protected $parent;
    
    public function __construct($name = null, array $parent = null){
    parent::__construct('roles');
    $this->parent = $parent;
    
    $this->setAttribute('method','post');
    #$this->setInputFilter(new LivroFIlter);
    
    $id = new \Zend\Form\Element\Hidden('id');
    $this->add('id');
    
    $nome = new \Zend\Form\Element\Text('nome');
    $nome->setLabel("Nome: ")
            ->setAttribute('placeholder', "Entre com o nome");
    $this->add($nome);
    
    $allParent = array_merge(array(0=>'Nenhum'),$this->parent);
    $parent = new Select();
    $parent->setLabel("Herda: ")
            ->setName("parent")
            ->setOptions(array('value_options' => $allParent));
    $this->add($isAdmin);
    
    $isAdmin = new \Zend\Form\Element\Checkbox("isAdmin");
    $isAdmin->setLabel("Admin?: ");
    $this->add($isAdmin);
    
    $this->add(array(
        'name' => 'sumit',
        'type' => 'Zend\Form\Element\Submit',
        'attributes' => array(
            'value' => 'Salvar',
            'class' => 'btn-success'
        )
    ));

}
}
