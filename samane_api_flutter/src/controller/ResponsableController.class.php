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
use src\model\ResponsableRepository;

class ResponsableController extends Controller{
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

        $tdb = new ResponsableRepository();
        
        $responsables = $tdb->listeResponsable();

        foreach($responsables as $responsable)
                                {
                                    $responsable = [
                                        "id" =>  $responsable->getId(),
                                        "nom" =>  $responsable->getNom(),
                                        "prenom" =>  $responsable->getPrenom(),
                                        "email" =>  $responsable->getEmail(),
                                        "password" =>  $responsable->getPassword(),
                                        "telephone" =>  $responsable->getTelephone(),
                                        "typeresponsable" =>  $responsable->getType_responsable(),
                                    ];
                                    $data['Les Responsables'][] =  $responsable;
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

        $tdb = new ResponsableRepository();
        
                $responsableObject = new Responsable();
                
                $responsableObject->setNom($data->nom);
                $responsableObject->setPrenom($data->prenom);
                $responsableObject->setEmail($data->email);
                $responsableObject->setPassword($data->password);
                $responsableObject->setTelephone($data->telephone);
                $responsableObject->setType_responsable($data->typeresponsable);
                

                $ok = $tdb->addResponsable($responsableObject);
                if($ok != null)
                     {
                         echo json_encode("responsable added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>