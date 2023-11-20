<?php 

require_once '../modelo/conexAdop.php';

$nombre1= isset($_POST['nombre1'])?$_POST['nombre1']:"";
$apellido= isset($_POST['apellidos2'])?$_POST['apellidos2']:"";
$telefono= isset($_POST['tel2'])?$_POST['tel2']:"";
$ubicacion= isset($_POST['ubi'])?$_POST['ubi']:"";
$especie= isset($_POST['especie'])?$_POST['especie']:"";
$raza= isset($_POST['raza'])?$_POST['raza']:"";
$edad= isset($_POST['edadmascota'])?$_POST['edadmascota']:"";
$pesomascota= isset($_POST['pesomascota'])?$_POST['pesomascota']:"";
$vacunas= isset($_POST['vacunas'])?$_POST['vacunas']:"";
$sexmas= isset($_POST['sexmas'])?$_POST['sexmas']:"";

$cargarImg=($_FILES['imgmascota']['tmp_name']);
$imgmascota=fopen($cargarImg, 'rb');

$provimascota= isset($_POST['provimascota'])?$_POST['provimascota']:"";

$insertar=$pdo->prepare("INSERT INTO daradop(nombre1, apellido , telefono, ubicacion, especie, raza, edad, peso, Control, Sexo, Foto, proveniencia) VALUES (:nombre1, :apellido , :telefono, :ubicacion, :especie, :raza, :edad, :peso, :Control, :Sexo, :Foto, :proveniencia)");
	$insertar->bindParam(':nombre1', $nombre1, PDO::PARAM_STR);
	$insertar->bindParam(':apellido', $apellido);
	$insertar->bindParam(':telefono', $telefono, PDO::PARAM_LOB);
	$insertar->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
    $insertar->bindParam(':especie', $especie);
    $insertar->bindParam(':raza', $raza);
    $insertar->bindParam(':edad', $edad);
    $insertar->bindParam(':peso', $pesomascota);
    $insertar->bindParam(':Control', $vacunas);
    $insertar->bindParam(':Sexo', $sexmas);
    $insertar->bindParam(':Foto', $imgmascota, PDO::PARAM_LOB);
    $insertar->bindParam(':proveniencia', $provimascota);
	$insertar->execute();


if ($insertar==TRUE) {
    /*echo "Datos Almacenados";
    echo "<br><a href='../Index.html'>Regresar</a>";*/
    header('Location: ../inde2.php');
}else{
    echo "Error no se pudo almacenar datos";
}















 ?>