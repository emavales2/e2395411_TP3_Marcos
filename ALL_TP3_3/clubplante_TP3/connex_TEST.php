<?php

// ----------------- At HOME : ----------------- 
try {
    
    $pdo = new PDO('mysql:host=localhost; dbname=clubplantetp3; port=3306; charset=utf8', 'root', 'root');
    echo 'Database connection successful!';

} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}


// ----------------- At SCHOOL : ----------------- 
// try {
    
//     $pdo = new PDO('mysql:host=localhost; dbname=clubPlante; port=3306; charset=utf8', 'root', '');
//     echo 'Database connection successful!';

// } catch (PDOException $e) {
//     echo 'Database connection failed: ' . $e->getMessage();
// }


// ----------------- With WEBDEV : ----------------- 
// try {
    
//     $pdo = new PDO('mysql:host=localhost; dbname=clubPlante; port=3306; charset=utf8', 'e2395411', 'iLPd9vZnaB90nGRPfXXT');
//     echo 'Database connection successful!';

// } catch (PDOException $e) {
//     echo 'Database connection failed: ' . $e->getMessage();
// }


