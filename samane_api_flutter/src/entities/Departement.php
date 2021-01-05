<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;


  /**
     * @Entity @Table(name="departement")
     **/
    class Departement{

    /** @Id @Column(type="integer") 
     * @GeneratedValue 
    **/
    private $id;
     /** @Column(type="string") **/
     private $nom;
    /**
     * one Departement have many Formation. This is the owning side.
     * @OneToMany(targetEntity="Formation", mappedBy="departement")
     */
    private $formation2;

    public function __construct()
    {
      $this->formation2 = new ArrayCollection();
      
    }
        

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

     /**
      * Get the value of nom
      */ 
     public function getNom()
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      *
      * @return  self
      */ 
     public function setNom($nom)
     {
          $this->nom = $nom;

          return $this;
     }

     /**
      * Get the value of chargerpro
      */ 
     public function getChargerpro()
     {
          return $this->chargerpro;
     }

     /**
      * Set the value of chargerpro
      *
      * @return  self
      */ 
     public function setChargerpro($chargerpro)
     {
          $this->chargerpro = $chargerpro;

          return $this;
     }

    /**
     * Get one Departement have many Formation. This is the owning side.
     */ 
    public function getFormation2()
    {
        return $this->formation2;
    }

    /**
     * Set one Departement have many Formation. This is the owning side.
     *
     * @return  self
     */ 
    public function setFormation2($formation2)
    {
        $this->formation2 = $formation2;

        return $this;
    }
    }


?>