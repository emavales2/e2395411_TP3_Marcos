<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

class RequirePage {
    
    static public function model($page) {
        return require_once('model/'.$page.'.php');
    }

    static public function library($page){
        return require_once('library/'.$page.'.php');
    }

    static public function redirect($page) {
        header("location:".PATH_DIR.$page);
    }
}


?>