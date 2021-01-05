<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/ 
use libs\system\Controller; 
use src\model\CandidatRepository;

class CandidatController extends Controller{
    public function __construct(){
        parent::__construct();
    }
   
    /** 
     * url pattern for this method
     * localhost/projectName/Departement/liste
     */
    public function liste(){

         // Set HTTP Response Content Type
         header('Content-Type: application/json');
         //pour indiquer qui p acceder a ces resources
         header('Access-Control-Allow-Origin: *');

        $tdb = new CandidatRepository();
        
        $candidats = $tdb->listeCandidat();

        foreach($candidats as $candidat)
                                {
                                    $candidat = [
                                        "id" => $candidat->getId(),
                                        "nom" => $candidat->getNom(),
                                        "prenom" => $candidat->getPrenom(),
                                        "telephone" => $candidat->getTelephone(),
                                        "genre" => $candidat->getGenre(),
                                        "adresse" => $candidat->getAdresse(),
                                        "email" => $candidat->getEmail(),
                                    ];
                                    $data['Les Candidats'][] = $candidat;
                                }
        http_response_code(200);
        echo json_encode($data);
    }

     /** 
     * url pattern for this method
     * localhost/projectName/Departement/add
     */
    public function add(){

          // Set HTTP Response Content Type
          header('Content-Type: application/json');
          //pour indiquer qui p acceder a ces resources
          header('Access-Control-Allow-Origin: *');
          header("Access-Control-Allow-Methods: POST");
          header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

          $data = json_decode(file_get_contents("php://input"));

        $tdb = new CandidatRepository();
        
                $candidatObject = new Candidat();
                
                $candidatObject->setNom($data->nom);
                $candidatObject->setPrenom($data->prenom);
                $candidatObject->setTelephone($data->telephone);
                $candidatObject->setGenre($data->genre);
                $candidatObject->setAdresse($data->adresse);
                $candidatObject->setEmail($data->email);

                $ok = $tdb->addCandidat($candidatObject);
                if($ok != null)
                     {
                         echo json_encode("departement added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>