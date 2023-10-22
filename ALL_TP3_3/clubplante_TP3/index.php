<?php
session_start();
// AT SCHOOL:
// define('PATH_DIR', 'http://localhost:8000/2395411/Prog_Web_Avancee/ALL_TP3_2/clubplante_TP3/');

// AT HOME:
define('PATH_DIR', 'http://localhost:8080/xampp_HOME/Ete_2023/Prog_Web_Avancee/ALL_TP3_3/clubplante_TP3/');


require_once (__DIR__.'/controller/Controller.php');
require_once (__DIR__.'/library/RequirePage.php');
require_once (__DIR__.'/vendor/autoload.php');
require_once (__DIR__.'/library/Twig.php');
require_once (__DIR__.'/library/CheckSession.php');


// $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

// POUR WEBDEV
$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';

//echo $url;
//print_r($url);

if ($url == '/') {
    $controllerHome = __DIR__.'/controller/ControllerHome.php';
    require_once $controllerHome;
    $controller = new ControllerHome;
    echo $controller->index();

} else {
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__.'/controller/Controller'.$requestURL.'.php';

    //echo $controllerPath;

    if (file_exists($controllerPath)) {
        //echo $controllerPath;
        require_once($controllerPath);
        
        $controllerName = 'Controller'.$requestURL;
        //echo $controllerName;
        $controller = new $controllerName;

        if (isset($url[1])) {
            $method = $url[1]; 
            
            if (isset($url[2])) {
                $id= $url[2];
                echo $controller->$method($id);
            
            } else {
                echo $controller->$method();
            }
        
        } else {
            echo $controller->index();
        }

    } else {
        $controllerHome = __DIR__.'/controller/ControllerHome.php';

        require_once $controllerHome;

        $controller = new ControllerHome;
        echo $controller->error();
    }
}

?>

