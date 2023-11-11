<?php

$DBuser = 'id21517975_elbasel';
$DBpass = "HelloThere@123";
$pdo = null;

try{
    $database = 'mysql:host=localhost';
    $pdo = new PDO($database, $DBuser, $DBpass);
    echo "Success: A proper connection to MySQL was made!";    
} catch(PDOException $e) {
    echo "Error: Unable to connect to MySQL. Error:\n $e";
}

$pdo = null;
