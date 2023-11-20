<?php 

$pdo = new PDO('mysql:host=localhost;dbname=savin', 'root', '');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=savig', 'root', '');
    
} catch (PDOException $e) {
  
    die($e->getMessage());
}
 ?>