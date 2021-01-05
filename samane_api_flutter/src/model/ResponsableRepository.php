<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
namespace src\model; 

use libs\system\Model; 
	
class ResponsableRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getResponsable($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Responsable')->find(array('id' => $id));
		}
	}
	
	public function addResponsable($responsable)
	{
		if($this->db != null)
		{
			$this->db->persist($responsable);
			$this->db->flush();

			return $responsable->getId();
		}
	}
	
	public function deleteResponsable($id){
		if($this->db != null)
		{
			$responsable = $this->db->find('Responsable', $id);
			if($responsable != null)
			{
				$this->db->remove($responsable);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateResponsable($responsable){
		if($this->db != null)
		{
			$getResponsable = $this->db->find('Responsable', $responsable->getId());
			if($getResponsable != null)
			{
				$getResponsable->setNom($responsable->getNom());
				$getResponsable->setPrenom($responsable->getPrenom());
				$getResponsable->setEmail($responsable->getEmail());
				$getResponsable->setPassword($responsable->getPassword());
				$getResponsable->setTelephone($responsable->getTelephone());
				$getResponsable->setFormation($responsable->getFormation());
				$getResponsable->setType_responsable($responsable->getType_responsable());
				$this->db->flush();

			}else {
				die("Objet ".$responsable->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeResponsable(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Responsable t")->getResult();
		}
	}
	
	public function listeResponsablesById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Responsable')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfResponsablesById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Responsable t WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfResponsables()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Responsable')->findAll();
		}
	}
	
}