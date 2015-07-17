<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_resources")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\ResourceRepository")
 */
class Resource
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    public function __construct($options = array())
    {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \Datetime("now");
        $this->updatedAt = new \Datetime("now");
    }
    
    function getId() {
        return $this->id;
    }

    

    function getNome() {
        return $this->nome;
    }

    

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setId($id) {
        $this->id = $id;
    }

   

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    

    function setCreatedAt() {
        $this->createdAt = new \Datetime("now");
        return $this;
    }
    /**
     * @ORM\PrePersist
     */

    function setUpdatedAt() {
        $this->updatedAt = new \Datetime("now");
        return $this;
    }
    
    
    public function toArray()
    {
        (new Hydrator\ClassMethods)->extract($this);
    }


}