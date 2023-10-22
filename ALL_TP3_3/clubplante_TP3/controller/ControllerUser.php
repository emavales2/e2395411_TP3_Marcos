<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----


RequirePage::model('User');
RequirePage::model('Privilege');
RequirePage::model('City');


class ControllerUser extends Controller {

    public function __construct(){
        CheckSession::sessionAuth();
    }



    // --------- * * INDEX montre le dashboard. Lié à select()/Crud.php et SELECT/SQL * * ---------

    public function index() {
        
        $user = new User;
        $select = $user->select();
    
        Twig::render('user/user_index.php', ['users' => $select, 'user_name' => $_SESSION['cptp3_user']['name']]);
    }


    // --------- * * MEMBER_LIST rendre disponible la liste de users avec une privilege_id == 2. Lié à select()/Crud.php et SELECT/SQL * * ---------
 

    public function member_list() {
    
        if ($_SESSION['privilege'] == 1) {
            $user = new User;
            $select = $user->select();
        
            Twig::render('user/user_member_list.php', ['users' => $select, 'user_name' => $_SESSION['cptp3_user']['name']]);
        
        } else {
            RequirePage::redirect('user');
        }
    }
    


    // --------- * * CREATE OPTIONS : permet choisir le type de compte à créer, ce qui va gerer les privileges, lié à store()/dessous  * * ---------

    public function create_options () {
            
        Twig::render('user/user_create_options.php');
    }



    // --------- * * CREATE : component visuel pour créer des comptes user, lié à store()/dessous  * * ---------

    public function create() {

        // -------- Si le bouton "Compte Membre" est choisi, la valeur de privilege_id sera pre-assignée 2 --------
        if (isset($_POST['member_account'])) {
            
            $privilege_id = 2; 
        
        // -------- Si le bouton "Compre Admin" est choisi, la valeur de privilege_id sera pre-assignée 1 --------
        } elseif (isset($_POST['admin_account'])) {

            $privilege_id = 1;
        } 
    
        $city = new City;
        $selectCity = $city->select();
    
        // -------- Transmet la valeur de privilege_id à user_create --------
        Twig::render('user/user_create.php', ['cities' => $selectCity, 'privilege_id' => $privilege_id]);
    }

    

    // --------- * * STORE : enregistre les nouvelles comptes user, lié à create()/dessus, insert()/Crud.php et INSERT/SQL * * ---------

    public function store () {
        // // -------- CHECK si les données sont récupérées ---------   
        // // print_r($_POST);
        // // die();

        // -------- Enregistre l'option ville du menu déroulant --------
        if (isset($_POST['city_id'])) {
            // Assigner city_id à City_id
            $_POST['City_id'] = $_POST['city_id']; 
        }

        // -------- Si le formulaire n'a pas été envoyé, redirect vers user_create --------
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('user/create');
            exit();
        }
         
        // -------- Alors, si le formulaire a été envoyé, il faut valider les données --------
        extract($_POST);
        RequirePage::library('Validation');

        $val = new Validation();
        $val->name('name')->value($name)->max(45)->min(2)->pattern('words');
        $val->name('email_username')->value($email_username)->pattern('email')->required()->max(50);
        $val->name('password')->value($password)->pattern('alphanum')->required()->min(6)->max(20);
        $val->name('phone')->value($phone)->pattern('int')->min(10)->max(20);
        $val->name('privilege_id')->value($privilege_id)->pattern('alphanum')->required();
        $val->name('postal_code')->value($postal_code)->max(8)->min(6)->pattern('alphanum');
        $val->name('wishlist')->value($wishlist)->pattern('alphanum');


        // -------- Si la validation passe, la compte usager est crée --------
        if ($val->isSuccess()){
            
            $user = new User;

            // -------- Securité Mot de Passe --------
            $options = ['cost' => 10];
            $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);           
            $_POST['password'] = $hashPassword;

            // -------- Insertion de données --------
            $insert = $user->insert($_POST);

            RequirePage::redirect('login');

        // -------- Si la $val retourne des erreurs --------    
        } else {
            $errors = $val->displayErrors();
            $privilege = new Privilege;
            $select = $privilege->select();

            // -------- On retourne au formulaire avec des messages d'erreur --------
            Twig::render('user_create.php', ['privileges'=>$select, 'cities' => $selectCity, 'errors'=>$errors, 'data'=>$_POST]);      
        }
    }



    // --------- * * SHOW : component visuel pour montrer profil membre séléctionné, lié à select($id)/Crud.php et SELECT/SQL * * ---------

    public function show($id){
        $user = new User;
        $selectId = $user->selectId($id);
        // print_r($selectId);
        // echo $selectId['ville_id'];
        // var_dump($_SESSION['cptp3_user']['id']);

        $city = new City;
        $selectCity = $city->selectId($selectId['city_id']);
        // print_r($selectCity);
        // $city= $selectCity['city'];
       //die();
    
       Twig::render('user/user_show.php', ['user' => $selectId, 'user_name' => $_SESSION['cptp3_user']['name'], 'user_id' => $_SESSION['cptp3_user']['id'], 'cities' => $selectCity]);
    }



    // --------- * * EDIT : component visuel pour mettre à jour des comptes membre, lié à update()/dessous * * ---------

    public function edit($id) {
        
        $user = new User;
        $selectId = $user->selectId($id);
        //print_r($selectId);

        $city = new City;
        // $selectCity = $city->selectId($selectId['city_id']);
        $selectCity = $city->select();

        Twig::render('user/user_edit.php', ['user' => $selectId, 'cities' => $selectCity]); 
    }



    // --------- * * UPDATE : enregistre les changements sur des comptes membre, lié à edit()/dessus, update()/Crud.php et UPDATE/SQL * * ---------

    public function update() {
        //print_r($_POST);

        $user = new User;
        $update = $user->update($_POST);
       
        if ($update) {
            RequirePage::redirect('user');  
        
        } else {
            print_r($update);
        }
    }


    
    // --------- * * DESTROY : élimine les comptes membre, lié à delete()/Crud.php et DELETE/SQL * * ---------

    public function destroy() {
        // print_r($_POST);
        // die();
        $user = new User;
        $deleteuser = $user->delete($_POST['id']);
        // echo $delete;
        // die();
   
        if ($deleteuser) {
            
            RequirePage::redirect('user');
        
        } else {
            print_r($deleteuser);
            // print_r($deleteCity);
        }
    }

}

?>