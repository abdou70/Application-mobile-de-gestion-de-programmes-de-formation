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
	
class FormationRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getFormation($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Formation')->find(array('id' => $id));
		}
	}
	
	public function addFormation($formation)
	{
		if($this->db != null)
		{
			$this->db->persist($formation);
			$this->db->flush();

			return $formation->getId();
		}
	}
	
	public function deleteFormation($id){
		if($this->db != null)
		{
			$formation = $this->db->find('Formation', $id);
			if($formation != null)
			{
				$this->db->remove($formation);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateFormation($formation){
		if($this->db != null)
		{
			$getFormation = $this->db->find('Formation', $formation->getId());
			if($getFormation != null)
			{
				$getFormation->setNom($formation->getNom());
				$getFormation->setResponsable($formation->getResponsable());
				$getFormation->setCandidat($formation->getCandidat());
				$getFormation->setDepartement($formation->getDepartement());
				$this->db->flush();

			}else {
				die("Objet ".$formation->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeFormation(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Formation t")->getResult();
		}
	}
	
	public function listeFormationsById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Formation')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfFormationsById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Formation t WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfFormations()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Formation')->findAll();
		}
	}
	
}