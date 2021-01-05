<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

 /**
    * @Entity @Table(name="candidat")
    */
   class Candidat{

   /** @Id @Column(type="integer") 
   * @GeneratedValue
   */
   private $id;
   /** @Column(type="string")
   */
   private $nom;
    /** @Column(type="string") 
    */
    private $prenom;
     /** @Column(type="string") **/
   private $telephone;
    /** @Column(type="string") **/
    private $genre;
     /** @Column(type="string") **/
   private $adresse;
    /** @Column(type="string") **/
    private $email;
     /**
     * Many Candidat have one Formation. This is the owning side.
     * @ManyToOne(targetEntity="Formation", inversedBy="candidat")
     * JoinCoumn(name="formation_id", referencedColunmName="id")
     */
    private $formation1;
   /** Many Candidat have one profil. This is the owning side.
     * @ManyToOne(targetEntity="Profil", inversedBy="candidature")
     * @JoinColumn(name="profil_id", referencedColumnName="id")
     */
    private $profil;
   

    public function __construct()
    {
       
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
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

   /**
    * Get the value of telephone
    */ 
   public function getTelephone()
   {
      return $this->telephone;
   }

   /**
    * Set the value of telephone
    *
    * @return  self
    */ 
   public function setTelephone($telephone)
   {
      $this->telephone = $telephone;

      return $this;
   }

   /**
    * Get the value of adresse
    */ 
   public function getAdresse()
   {
      return $this->adresse;
   }

   /**
    * Set the value of adresse
    *
    * @return  self
    */ 
   public function setAdresse($adresse)
   {
      $this->adresse = $adresse;

      return $this;
   }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get many Candidat have one Formation. This is the owning side.
     */ 
    public function getFormation1()
    {
        return $this->formation1;
    }

    /**
     * Set many Candidat have one Formation. This is the owning side.
     *
     * @return  self
     */ 
    public function setFormation1($formation1)
    {
        $this->formation1 = $formation1;

        return $this;
    }
   }
?>