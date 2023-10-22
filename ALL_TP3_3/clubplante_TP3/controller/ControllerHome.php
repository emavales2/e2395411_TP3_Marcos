<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ---- 

class ControllerHome extends Controller {

    public function index() {
        Twig::render('home_index.php', ['name' => 'Friend']);
    }

    public function error() {
       Twig::render('home_error.php');
    }
}

?>