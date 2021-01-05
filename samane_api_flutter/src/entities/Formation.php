<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
  * @Entity @Table(name="formation")
  **/
 class Formation{

     /** @Id @Column(type="integer") 
      * @GeneratedValue **/
     private $id;
     /** @Column(type="string") **/
     private $nom;
    /**
     * Many formation have one Responsable. This is the owning side.
     * @OneToOne(targetEntity="Responsable", inversedBy="formation")
     * @JoinColumn(name="responsable_id", referencedColumnName="id")
     */
     private $responsable;
     /**
     * one Formation have Many Candidat. This is the owning side.
     * @OneToMany(targetEntity="Candidat", mappedBy="formation1")
     */
    private $candidat;
    /**
     * Many Formation have one Departement. This is the owning side.
     * @ManyToOne(targetEntity="Departement", inversedBy="formation2")
     * @JoinColumn(name="departement_id", referencedColumnName="id")
     */
    private $departement;

    public function __construct()
    {
      $this->candidat = new ArrayCollection();
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
      * Get one responsable have one Formation. This is the owning side.
      */ 
     public function getResponsable()
     {
          return $this->responsable;
     }

     /**
      * Set one responsable have one Formation. This is the owning side.
      *
      * @return  self
      */ 
     public function setResponsable($responsable)
     {
          $this->responsable = $responsable;

          return $this;
     }

    /**
     * Get one Formation have many Candidat. This is the owning side.
     */ 
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * Set one Formation have many Candidat. This is the owning side.
     *
     * @return  self
     */ 
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }

    /**
     * Get many Formation have one Departement. This is the owning side.
     */ 
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set many Formation have one Departement. This is the owning side.
     *
     * @return  self
     */ 
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }
 }


?>