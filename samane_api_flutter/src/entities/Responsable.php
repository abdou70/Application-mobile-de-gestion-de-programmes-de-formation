<?php
 use Doctrine\ORM\Annotation as ORM;
 use Doctrine\Common\Collections\ArrayCollection;

   /**
     * @Entity @Table(name="responsable")
     **/
    class Responsable{

        /** @Id @Column(type="integer") 
         * @GeneratedValue **/
        private $id;
        /** @Column(type="string") **/
        private $nom;
        /** @Column(type="string") **/
        private $prenom;
        /** @Column(type="string") **/
        private $email;
        /** @Column(type="string") **/
        private $password;
        /** @Column(type="string") **/
        private $telephone;
        /** @Column(type="string") **/
        private $typeresponsable;
       /**
       * one responsable have Many Formation. This is the owning side.
       * @OneToMany(targetEntity="Formation", mappedBy="responsable")
       */
   private $formation;

        public function __construct()
    {
      $this->formation = new ArrayCollection();
      
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
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

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
         * Get one responsable have one Formation. This is the owning side.
         */ 
        public function getFormation()
        {
                return $this->formation;
        }

        /**
         * Set one responsable have one Formation. This is the owning side.
         *
         * @return  self
         */ 
        public function setFormation($formation)
        {
                $this->formation = $formation;

                return $this;
        }

        /**
         * Get the value of Type_responsable
         */ 
        public function getType_responsable()
        {
                return $this->typeresponsable;
        }

        /**
         * Set the value of Type_responsable
         *
         * @return  self
         */ 
        public function setType_responsable($typeresponsable)
        {
                $this->typeresponsable = $typeresponsable;

                return $this;
        }
    }
   


?>