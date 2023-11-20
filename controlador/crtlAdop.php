<?php

//print_r($_POST);
require_once '../modelo/conexAdop.php';
$nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
$apellido = isset($_POST['apellido'])?$_POST['apellido']:"";
$telefono = isset($_POST['tel'])?$_POST['tel']:"";
$correo = isset($_POST['email'])?$_POST['email']:"";
$direccion = isset($_POST['direccion'])?$_POST['direccion']:"";

$stmt = $pdo->prepare("INSERT INTO formadopcion (nombre, apellido, telefono, correo, direccion) VALUES (?, ?, ?, ?, ?);");
$resul = $stmt->execute([$nombre, $apellido, $telefono, $correo, $direccion]);


if ($resul===TRUE) {
   
    header('Location: ../inde2.php');
}else{
    echo "Error no se pudo almacenar datos";
}


?>