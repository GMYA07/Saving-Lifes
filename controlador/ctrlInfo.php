<?php

//print_r($_POST);
require_once '../modelo/conexAdop.php';
$nombre = isset($_POST['nombre1'])?$_POST['nombre1']:"";
$apellido = isset($_POST['apellidos2'])?$_POST['apellidos2']:"";
$telefono = isset($_POST['tel2'])?$_POST['tel2']:"";
$correo = isset($_POST['email'])?$_POST['email']:"";
$ubicacion = isset($_POST['ubi'])?$_POST['ubi']:"";
$estado = isset($_POST['estado'])?$_POST['estado']:"";
$stmt = $pdo->prepare("INSERT INTO infomascota (nombre, apellido, telefono, ubicacion, estado, correo) VALUES (?, ?, ?, ?, ?, ?);");
$resul = $stmt->execute([$nombre, $apellido, $telefono, $ubicacion, $estado, $correo]);


if ($resul===TRUE) {
   
    header('Location: ../inde2.php');
}else{
    echo "Error no se pudo almacenar datos";
}


?>