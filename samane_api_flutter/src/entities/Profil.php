<?php

use Doctrine\ORM\Annotation as ORM;
 use Doctrine\Common\Collections\ArrayCollection;

  /**
     * @Entity @Table(name="profil")
     **/
    class Profil{

    /** @Id @Column(type="integer") 
    * @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
        /**
     * one profil have many Candidat. This is the owning side.
     * @OneToMany(targetEntity="Candidat", mappedBy="profil")
     */
    private $candidature;

    public function __construct()
    {
        $this->candidature = new ArrayCollection();
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
     * Get one profil have many Candidat. This is the owning side.
     */ 
    public function getCandidature()
    {
        return $this->candidature;
    }

    /**
     * Set one profil have many Candidat. This is the owning side.
     *
     * @return  self
     */ 
    public function setCandidature($candidature)
    {
        $this->candidature = $candidature;

        return $this;
    }
    }       
?>