<?php

$dsn = 'mysql:dbname=blog; host=localhost';
$user = 'alexis';
$password = 'mysql';

/*
try {
    $pdo = new PDO($dsn, $user, $password);
    foreach ($pdo->query('select * from authors') as $row) {
        print_r($row);
    }
    $pdo = null;
} catch (PDOException $e) {
    print "Erreur ! :" . $e ->getMessage() . "<br>";
    die();
}
*/
