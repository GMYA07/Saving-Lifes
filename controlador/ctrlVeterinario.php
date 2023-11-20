<?php
    $nombre = isset($_POST['nom'])?$_POST['nom']:"";
    $apellido = isset($_POST['ape'])?$_POST['ape']:"";
    $genero = isset($_POST['gen'])?$_POST['gen']:"";
    $rol= isset($_POST['roles'])?$_POST['roles']:"";
    $username=isset($_POST['user'])?$_POST['user']:"";
    $telefono= isset($_POST['tel'])?$_POST['tel']:"";
    $preguntaS= isset($_POST['pregS'])?$_POST['pregS']:"";
    $respuestaS= isset($_POST['respS'])?$_POST['respS']:"";
    $contra = isset($_POST['pass'])?$_POST['pass']:"";

    $codEspe = isset($_POST['espe'])?$_POST['espe']:"";

    $eMail = isset($_POST['email'])?$_POST['email']:"";

    $fechaNac = isset($_POST['fn'])?$_POST['fn']:"";
    $codigoUsu = isset($_POST['codigoUsu'])?$_POST['codigoUsu']:"";
    $fechaIngreso = isset($_POST['fechaIngreso'])?$_POST['fechaIngreso']:"";
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";
    $editar = isset($_GET['accion'])?$_GET['accion']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";

    
    if($accion == "" && $id=="" ){
        require "../vista/vistaVeterinario.php";   
    }
    if($accion == "Agregar"){
        require_once '../modelo/claseVeterinario.php';
        require_once '../modelo/daoVeterinario.php';
        $dao = new DaoVeterinario();
        $c = $dao->getCorrelativo(date('Y'));
        $cliente = new Cliente($c,$v=1,$nombre,$apellido,$genero,$rol,$username,$telefono,$preguntaS,$respuestaS,$contra,$codEspe,$fechaNac,$eMail); 
        $dao->insertar($cliente);
        header("location:../Index.html");
    }
    //Eliminar Cliente
    if($id != "" && $accion=="eliminar"){
        require_once '../modelo/daoVeterinario.php';
        $dao = new DaoVeterinario();
        $dao->eliminar($id);
        echo "<p>Registro Eliminado exitosamente...</p>";
        echo "<a href='../vista/vistaAdmin.php'>Regresar</a>";
    }
    //Modificar cliente
    if($id != "" && $accion=="modificar"){
        require_once '../modelo/daoVeterinario.php';
        $dao = new DaoVeterinario();
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

    
    <h1>Modificar Cliente</h1>
EOD;
echo $html;
echo "<div class='container'>    
<form action='ctrlVeterinario.php' method='post' >
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
<input type='hidden' name='codigoUsu' required value='".$cliente["codigoUsu"]."'/>
<input type='hidden' name='fechaIngreso' required value='".$cliente["fechaIngreso"]."'/>
<input type='hidden' name='gen' required value='".$cliente["genero"]."'/>
<input type='hidden' name='roles' required value='".$cliente["rol"]."'/>
<input type='hidden' name='pregS' required value='".$cliente["preguntaS"]."'/>
<input type='hidden' name='respS' required value='".$cliente["respuestaS"]."'/>
<input type='hidden' name='espe' required value='".$cliente["codEspe"]."'/>
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
    <input type='text' name='pass' class='form-control' placeholder='********' required value='".$cliente["contra"]."'><br>
</div>
<fieldset>
    <input type='submit' class='button' name='accion' value='Modificar' required />

</fieldset>
</form>";
        
        
    }
    if($accion == "Modificar"){
        require_once '../modelo/claseVeterinario.php';
        require_once '../modelo/daoVeterinario.php';
        $dao = new DaoVeterinario();
        $c=1;
        $cliente = new Cliente($c,$v=1,$nombre,$apellido,$genero,$rol,$username,$telefono,$preguntaS,$respuestaS,$contra,$codEspe,$fechaNac,$eMail); 
        $cliente->setcodigoUsu($codigoUsu);
        $dao->modificar($cliente);
      header("location:../inde2.php");
    }

?>