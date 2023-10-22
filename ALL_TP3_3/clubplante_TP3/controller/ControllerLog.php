<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----


require_once('Log.php');

class ControllerLog extends Controller {

    public function index() {
        $log = new Log;

        // -------- Récupère les données --------- 
        $logData = $log->getAllLogs();
    
        Twig::render('log/log_view.php', ['logData' => $logData]);
    }


    
    public function logPageVisit($ipAddress, $pageVisited) {
        
        $log = new Log;
        $log->logPageVisit($ipAddress, $pageVisited);
    }



    public function logLogin($ipAddress, $username) {
        
        $log = new Log;
        $log->logLogin($ipAddress, $username);
    }

}
?>