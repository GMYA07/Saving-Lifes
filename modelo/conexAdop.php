<?php 

$host = "localhost";
$user= "root";
$pass = "";

$pdo = new PDO("mysql:host=$host;dbname=saving", $user, $pass);

try {
    $pdo = new PDO("mysql:host=$host;dbname=saving", $user, $pass);
} catch (PDOException $e) {
  
    die($e->getMessage());
}
 ?>