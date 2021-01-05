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
use src\model\ProfilRepository;

class ProfilController extends Controller{
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

        $tdb = new ProfilRepository();
        
        $profils = $tdb->listeProfil();

        foreach($profils as $profil)
                                {
                                    $profil = [
                                        "id" => $profil->getId(),
                                        "nom" => $profil->getNom()
                                    ];
                                    $data['LesProfils'][] =$profil;
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

        $tdb = new ProfilRepository();
        
             $profilObject = new  Profil();
                
             $profilObject->setNom($data->nom);

                $ok = $tdb-> addProfil( $profilObject);
                if($ok != null)
                     {
                         echo json_encode("profil added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>