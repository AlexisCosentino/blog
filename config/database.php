<?php

$dsn = 'mysql:dbname=blog; host=localhost';
$user = 'alexis';
$password = 'mysql';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    echo "Erreur ! : " . $e->getMessage() ;
    die();
}
