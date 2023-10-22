<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

require_once('Crud.php');
require_once('City.php');



class User extends Crud {

    public $table = 'cptp3_user';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'name', 
        'email_username',   
        'password',
        'phone',   
        'postal_code',        
        'city_id',
        'wishlist',
        'privilege_id', 
        'created_on'
    ];


    public function checkUser($username, $password) {
        
        $sql = "SELECT * FROM $this->table WHERE email_username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));

        $count = $stmt->rowCount();

        if ($count === 1) {
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {
                
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['privilege'] = $user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                //echo $_SERVER['REDIRECT_URL'];
                //print_r($_SERVER);
                // return true;
                return $user;
            
            } else {
                 return false;
            }

        } else {
            return false;
        }
    }

}
?>