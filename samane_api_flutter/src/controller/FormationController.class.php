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
use src\model\FormationRepository;

class FormationController extends Controller{
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
          //Pour indiquer qui p acceder a ces resources
         header('Access-Control-Allow-Origin: *');

        $tdb = new FormationRepository();
        
        $formations = $tdb->listeFormation();

        foreach($formations as $formation)
                                {
                                    $formation = [
                                        "id" => $formation->getId(),
                                        "nom" => $formation->getNom()
                                    ];
                                    $data['formations'][] =$formation;
                                }
        http_response_code(200);
        return $this->view->responseJson($data);
        // echo json_encode($data);
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

        $tdb = new FormationRepository();
        
             $formationObject = new  Formation();
                
                $formationObject->setNom($data->nom);

                $ok = $tdb-> addFormation( $formationObject);
                if($ok != null)
                     {
                         echo json_encode("formation added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>