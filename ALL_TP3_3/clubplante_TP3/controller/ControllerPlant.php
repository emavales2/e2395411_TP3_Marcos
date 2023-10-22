<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----


RequirePage::model('Plant');

class ControllerPlant extends Controller {

    // --------- * * INDEX montre la liste de plantes, lié à select()/Crud.php et SELECT/SQL * * ---------

    public function index() {
       
        $plant = new Plant;
        $select = $plant->select();
      
        Twig::render('plant/plant_index.php', ['plants'=>$select]);
    }



    // --------- * * CREATE : component visuel pour créer des fiches plante, lié à store()/dessous  * * ---------

    public function create () {       
        //new View ('plant_create');
        Twig::render('plant/plant_create.php');
    }



    // --------- * * STORE : enregistre les nouvelles fiches plante, lié à create()/dessus, insert()/Crud.php et INSERT/SQL * * ---------

    public function store () {
        // // -------- CHECK si les données sont récupérées --------- 
        // print_r($_POST);
        // die();

        // -------- Si le formulaire a été envoyé... --------
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // -------- Envoye les données à la fonction de validation --------
            $validationErrors = $this->validate($_POST);

            // -------- Si la $validationErrors n'est pas vide (veulent dire qu'il y a des erreurs)... --------
            if (!empty($validationErrors)) {

                // -------- On retourne au formulaire avec des messages d'erreur --------
                Twig::render('plant/plant_create.php', ['errors' => $validationErrors]);

            } else {

                // -------- Si la validation est réussie, continuer normalement --------        
                $plant = new Plant;
                $insert = $plant->insert($_POST);
                //return $insert;
                
                RequirePage::redirect('plant');
            }
        }    
    }



    // --------- * * VALIDATE : valide la saisie de données * * ---------

    private function validate($data) {
        $errors = [];

        // -------- Valide le nom --------
        if (empty($data['name'])) {
            
            $errors['name'] = 'ERREUR : Champ obligatoire';
        } 

        return $errors;
    }



    // --------- * * SHOW : component visuel pour montrer profil plante séléctionné, lié à select($id)/Crud.php et SELECT/SQL * * ---------

    public function show ($id) {
        $plant = new Plant;
        $selectId = $plant->selectId($id);
        //print_r($selectId);

        Twig::render('plant/plant_show.php', ['plant' => $selectId]);
    }



    // --------- * * EDIT : component visuel pour mettre à jour des fiches plante, lié à update()/dessous * * ---------

    public function edit($id){
        $plant = new Plant;
        $selectId = $plant->selectId($id);
        //print_r($selectId);

        Twig::render('plant/plant_edit.php', ['plant' => $selectId]); 
    }



    // --------- * * UPDATE : enregistre les changements sur des fiches plante, lié à edit()/dessus, update()/Crud.php et UPDATE/SQL * * ---------

    public function update() {
        //print_r($_POST);

        $plant= new Plant;
        $update = $plant->update($_POST);
       
        if ($update) {
            RequirePage::redirect('plant');  
        
        } else {
            print_r($update);
        }
    }

    

    // --------- * * DESTROY : élimine les fiches plante, lié à delete()/Crud.php et DELETE/SQL * * ---------

    public function destroy() {
        // print_r($_POST);
        // die();
        $plant = new Plant;
        $delete = $plant->delete($_POST['id']);
        // echo $delete;
        // die();
        
        if ($delete) {
            RequirePage::redirect('plant');
        
        } else {
            print_r($delete);
        }
    }

}

?>