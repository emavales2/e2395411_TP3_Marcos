<?php

RequirePage::model('User');

class ControllerLogin extends Controller {

    public function index() {
        Twig::render('login.php');
    }
    
    public function auth() {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            RequirePage::redirect('login');
            exit();
        }

        extract($_POST);
        RequirePage::library('Validation');
        $val = new Validation();
        $val->name('username')->value($username)->pattern('email')->required()->max(50);
        $val->name('password')->value($password)->pattern('alphanum')->min(6)->max(20);

        
        // -------- Si la validation se passe bien --------- 
        if ($val->isSuccess()) {
            
            $user = new User;
            
            $userData = $user->checkUser($username, $password);
            
            if ($userData) {
                $_SESSION['cptp3_user']['id'] = $userData['id']; 
                $_SESSION['cptp3_user']['name'] = $userData['name']; 
                $_SESSION['cptp3_user']['privilege_id'] = $userData['privilege_id']; 
                
                RequirePage::redirect('user');



            // -------- Si le password/login est incorrect ---------    
            } else {
                RequirePage::redirect('home/error');
            }

        } else {
            $errors = $val->displayErrors();
            Twig::render('login.php', ['errors' => $errors, 'data' => $_POST]);
        }      
    }

    public function logout() {
        session_destroy();
        RequirePage::redirect('login');
    }    
}   
?>