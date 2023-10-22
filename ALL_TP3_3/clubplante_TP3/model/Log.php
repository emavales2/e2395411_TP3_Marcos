<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

require_once('Crud.php');


class Log extends Crud {

    public $table = 'cptp3_log';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'timestamp',
        'ip_address',
        'is_guest',
        'username',
        'page_visited'
    ];


     // --------- * * Enregistre un login * * ---------
     public function logLogin($ipAddress, $username) {
        
        $this->timestamp = date('Y-m-d H:i:s');
        $this->ip_address = $ipAddress;
        $this->is_guest = false;
        $this->username = $username;
        $this->page_visited = 'login'; // You can specify a login action.
        $this->insert();
    }


    // --------- * * Enregistre les pages visitées * * ---------
    public function logPageVisit($ipAddress, $pageVisited) {
        
        $this->timestamp = date('Y-m-d H:i:s');
        $this->ip_address = $ipAddress;
        $this->is_guest = empty($_SESSION['user_id']);
        $this->username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
        $this->page_visited = $pageVisited;
        $this->insert();
    }


    public function getAllLogs() {
        
        return $this->select();
    }
}


   