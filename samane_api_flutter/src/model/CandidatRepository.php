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
	
class CandidatRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getCandidat($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidat')->find(array('id' => $id));
		}
	}
	
	public function addCandidat($candidat)
	{
		if($this->db != null)
		{
			$this->db->persist($candidat);
			$this->db->flush();

			return $candidat->getId();
		}
	}
	
	public function deleteCandidat($id){
		if($this->db != null)
		{
			$candidat = $this->db->find('Candidat', $id);
			if($candidat != null)
			{
				$this->db->remove($candidat);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateCandidat($candidat){
		if($this->db != null)
		{
			$getCandidat = $this->db->find('Candidat', $candidat->getId());
			if($getCandidat != null)
			{
				$getCandidat->setNom($candidat->getNom());
				$getCandidat->setGenre($candidat->getGenre());
				$getCandidat->setPrenom($candidat->getPrenom());
				$getCandidat->setTelephone($candidat->getTelephone());
				$getCandidat->setAdresse($candidat->getAdresse());
				$getCandidat->setEmail($candidat->getEmail());
				$getCandidat->setProfil($candidat->getProfil());
				$getCandidat->setFormation1($candidat->getFormation1());
				$this->db->flush();

			}else {
				die("Objet ".$candidat->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeCandidat(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Candidat t")->getResult();
		}
	}
	
	public function listeCandidatsById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidat')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfCandidatsById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM Candidat t WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfCandidats()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidat')->findAll();
		}
	}
	
}