<?php
    $nombre = isset($_POST['nom'])?$_POST['nom']:"";
    $apellido = isset($_POST['ape'])?$_POST['ape']:"";
    $genero = isset($_POST['genero'])?$_POST['genero']:"";
    $rol = isset($_POST['roles'])?$_POST['roles']:"";
    $username = isset($_POST['user'])?$_POST['user']:"";
    $telefono = isset($_POST['tel'])?$_POST['tel']:"";
    $preguntaS = isset($_POST['pregS'])?$_POST['pregS']:"";
    $respuestaS = isset($_POST['respS'])?$_POST['respS']:"";
    $contra = isset($_POST['pass'])?$_POST['pass']:"";
    $eMail = isset($_POST['email'])?$_POST['email']:"";
    $fechaNac = isset($_POST['fn'])?$_POST['fn']:"";
    $idCliente = isset($_POST['idCliente'])?$_POST['idCliente']:"";
    $fechaIngreso = isset($_POST['fechaIngreso'])?$_POST['fechaIngreso']:"";
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $editar = isset($_GET['accion'])?$_GET['accion']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";

    
    if($accion == "" && $id=="" ){
        require "vista/vistaCliente.php";   
    }
    if($accion == "Agregar"){
        require_once '../modelo/claseCliente.php';
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $c = $dao->getCorrelativo(date('Y'));
        $cliente = new Cliente($c,$v=0,$nombre,$apellido,$genero,$rol,$username,$telefono,$preguntaS,$respuestaS,$contra,$fechaNac,$eMail); 
        $dao->insertar($cliente);
        header("location:../index.html");
    }
    //Eliminar Cliente
    if($id != "" && $accion=="eliminar"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $dao->eliminar($id);
        echo "<p>Registro Eliminado exitosamente...</p>";
        echo "<a href='../vista/vistaAdmin.php'>Regresar</a>";
    }
    //Eliminar mascota en adopcion
    if($id != "" && $accion=="eliminar2"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $dao->eliminar2($id);
        echo "<p>Mascota eliminada exitosamente...</p>";
        echo "<a href='../vista/vistaAdminanimales.php'>Regresar</a>";
    }
    //Eliminar foro
    if($id != "" && $accion=="eliminar3"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $dao->eliminar3($id);
        echo "<p>Dato Eliminado exitosamente...</p>";
        echo "<a href='../inde2.php'>Regresar</a>";
    }
    if($id != "" && $accion=="eliminar4"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $dao->eliminar4($id);
        echo "<p>Dato Eliminado exitosamente...</p>";
        echo "<a href='../inde2.php'>Regresar</a>";
    }
    if($id != "" && $accion=="eliminar5"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $dao->eliminar5($id);
        echo "<p>Dato Eliminado exitosamente...</p>";
        echo "<a href='../inde2.php'>Regresar</a>";
    }
    //actualizar mascota perdida
    if($id != "" && $accion=="actualizar"){
        include("../modelo/conexForo.php");
    $sql = "UPDATE reportar SET estado='encontrado' WHERE codigoReport=$id";

    if ($mysqli->query($sql) === TRUE) {
    echo "Mascota actualizada correctamente<br>";
    echo "<a href='../vista/vistaAdminanimales2.php'>Regresar</a>";

    } else {
    echo "Error updating record: " . $conn->error;
}
        
    }
   
    //Modificar cliente
    if($id != "" && $accion=="modificar"){
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $cliente = $dao->mostrarCliente($id); 
        $html = <<<'EOD'
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Estilos/Ctrlcliente/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Cliente</title>
</head>
<body>

    <br><h1>Modificar Cliente</h1>
    
EOD;
echo $html;
        echo "<div class='container'>    
        <form action='ctrlCliente.php' method='post' >
        <div class='form-group mb-2 row'>            
            <div class='col'>
            <label>
                    Nombre:
            </label>
            <input class='form-control' size='20' type='text' name='nom'  required value='".$cliente["nombre"]."'/>
            </div>
            <div class='col'>
            <label>
                Apellido:
            </label>
            <input type='text' class='form-control' name='ape' required value='".$cliente["apellido"]."'/>
            </div>
        </div>
        <input type='hidden' name='idCliente' required value='".$cliente["idCliente"]."'/>
<input type='hidden' name='fechaIngreso' required value='".$cliente["fechaIngreso"]."'/>
<input type='hidden' name='genero' required value='".$cliente["genero"]."'/>
<input type='hidden' name='roles' required value='".$cliente["rol"]."'/>
<input type='hidden' name='pregS' required value='".$cliente["preguntaS"]."'/>
<input type='hidden' name='respS' required value='".$cliente["respuestaS"]."'/>
        <div class='form-group  mb-2 row'>
        <div class='col'>
            <label>
                fecha Nacimiento:
            </label>
            <input type='date' class='form-control' name='fn' required value='".$cliente["fechaNac"]."'/>
        </div>
        <div class='col'>
            <label>
                Correo:
            </label>
            <input type='email' class='form-control' name='email' required value='".$cliente["eMail"]."' />
        </div>
        </div>
        
        <div class='form-group  mb-2 row'>
        <div class='col'>
            <label>
                Nombre de Usuario:
            </label>
            <input type='text' name='user' class='form-control' required value='".$cliente["username"]."' placeholder='Ej: Gatitos3000'>
        </div>
        <div class='col'>
            <label>
            Numero telefónico:
            </label>
            <input type='tel' name='tel' class='form-control' placeholder='Ej: 7800-0500 ' required value='".$cliente["telefono"]."'>
        </div>
        </div>
        
        <div class='col'>
    
            <label>Contraseña:</label><br>
            <input type='password' name='pass' class='form-control' placeholder='********' required value='".$cliente["contra"]."'><br>
        </div>
        <fieldset>
            <input type='submit' class='button' name='accion' value='Modificar' required />
        
        </fieldset>
        </form>";
        
        
    }
  
    if($accion == "Modificar"){
        require_once '../modelo/claseCliente.php';
        require_once '../modelo/daoCliente.php';
        $dao = new DaoCliente();
        $c=1;
        $cliente = new Cliente($c,$v=0,$nombre,$apellido,$genero,$rol,$username,$telefono,$preguntaS,$respuestaS,$contra,$fechaNac,$eMail); 
        $cliente->setIdCliente($idCliente);
        $dao->modificar($cliente);
        header('Location: ../inde2.php');
    }

?>