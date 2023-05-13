<?php

$dsn = 'mysql:dbname=med;host=127.0.0.1';
$user = 'sea';
$password = 'azerty1234';

$dbh = new PDO($dsn, $user, $password);


function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}


?>