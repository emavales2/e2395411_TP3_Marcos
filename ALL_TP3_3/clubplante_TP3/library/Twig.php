<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

class Twig {

    static public function render($template, $data=array()){
        
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true)); 

        // $twig->addGlobal('path', 'http://localhost:8000/2395411/Prog_Web_Avancee/htdocs_COPY/seance_16_TEST_sept_22/');

        $twig->addGlobal('path', PATH_DIR);

        if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            $guest = false;
        
        } else {
            $guest = true;
        }
        
        $twig->addGlobal('session', $_SESSION);

        $twig->addGlobal('guest', $guest);

        echo $twig->render($template, $data);
    }
}

?>