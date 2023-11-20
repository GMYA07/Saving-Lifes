<?php 
require_once '../modelo/conexAdop.php';

$nombre = isset($_POST['name'])?$_POST['name']:"";
$telefono = isset($_POST['tel'])?$_POST['tel']:"";
$correo = isset($_POST['email'])?$_POST['email']:"";

$cargarFoto=($_FILES['img']['tmp_name']);
$fotoM=fopen($cargarFoto, 'rb');


$nombreM = isset($_POST['nameM'])?$_POST['nameM']:"";
$edadM = isset($_POST['age_a'])?$_POST['age_a']:"";
$unidadTiempo = isset($_POST['time'])?$_POST['time']:"";
$especieM = isset($_POST['raza'])?$_POST['raza']:"";
$razaM = isset($_POST['raz'])?$_POST['raz']:"";
$ultimaVista = isset($_POST['Ultima'])?$_POST['Ultima']:"";
$ultimaDireccion = isset($_POST['text'])?$_POST['text']:"";
$recompensa = isset($_POST['Recompensa'])?$_POST['Recompensa']:"";
$cantidad = isset($_POST['can'])?$_POST['can']:"";
$moneda = isset($_POST['moneda'])?$_POST['moneda']:"";
$estado = isset($_POST['estado'])?$_POST['estado']:"";

$insertar = $pdo->prepare("INSERT INTO reportar(nombre, telefono, correo, fotoM, nombreM, edadM, unidadTiempo, especieM, razaM, ultimaVista, ultimaDireccion, recompensa, cantidad, moneda, estado) VALUES (:nombre, :telefono, :correo, :fotoM, :nombreM, :edadM, :unidadTiempo, :especieM, :razaM, :ultimaVista, :ultimaDireccion, :recompensa, :cantidad, :moneda, :estado);");
	$insertar->bindParam(':nombre', $nombre);
	$insertar->bindParam(':telefono', $telefono, PDO::PARAM_LOB);
	$insertar->bindParam(':correo', $correo, PDO::PARAM_STR);
    $insertar->bindParam(':fotoM', $fotoM, PDO::PARAM_LOB);
    $insertar->bindParam(':nombreM', $nombreM);
    $insertar->bindParam(':edadM', $edadM);
    $insertar->bindParam(':unidadTiempo', $unidadTiempo);
    $insertar->bindParam(':especieM', $especieM);
    $insertar->bindParam(':razaM', $razaM);
    $insertar->bindParam(':ultimaVista', $ultimaVista);
    $insertar->bindParam(':ultimaDireccion', $ultimaDireccion);
    $insertar->bindParam(':recompensa', $recompensa);
    $insertar->bindParam(':cantidad', $cantidad);
    $insertar->bindParam(':moneda', $moneda);
    $insertar->bindParam(':estado', $estado);
	$insertar->execute();

if ($insertar==TRUE) {
    /*echo "Datos Almacenados";
    echo "<br><a href='../Index.html'>Regresar</a>";*/
    header('Location: ../inde2.php');
}else{
    echo "Error no se pudo almacenar datos";
}
 ?>