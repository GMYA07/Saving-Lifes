<?php
if ($_POST) {
    session_start();
    require('modelo/conexAdop.php');
    $us=$_POST['usuario'];
    $pa=$_POST['contra'];
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    
    $query= $pdo->prepare("SELECT * FROM usuarios WHERE username=:us AND contra=:pa");

    $query2= $pdo->prepare("SELECT * FROM usuarioespe WHERE username=:us AND contra=:pa" );

    $query3= $pdo->prepare("SELECT * FROM administradores WHERE username=:us AND contra=:pa" );
    $query->bindParam(":us",$us);
    $query->bindParam(":pa",$pa);
    $query->execute();
    $usuario=$query->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if ($_POST['usuario']==$usuario["username"] && $_POST['contra']==$_POST['contra']) {
        $_SESSION['usuarioo']=$usuario["username"];
        $_SESSION['id']=$usuario["idCliente"];
        header("location:inde2.php");
        echo $_SESSION['id'];
    }else{
        echo "<script>alert('Usuario y clave incorrectos, vuelva a intentarlo');</script>";   
    }
  }
  $query2->bindParam(":us",$us);
    $query2->bindParam(":pa",$pa);
    $query2->execute();
    $usuario=$query2->fetch(PDO::FETCH_ASSOC);
  if ($usuario) {
    
  if ($_POST['usuario']==$usuario["username"] && $_POST['contra']==$_POST['contra'] ) {  
        $_SESSION['usuarioo'] = $usuario["username"];
        $_SESSION['id']=$usuario["codigoUsu"];
        header("location:inde2.php");
        echo $_SESSION['id'];
    }else{
        echo "<script>alert('Usuario y clave incorrectos, vuelva a intentarlo');</script>";
        
    }
}
$query3->bindParam(":us",$us);
    $query3->bindParam(":pa",$pa);
    $query3->execute();
    $usuario=$query3->fetch(PDO::FETCH_ASSOC);
  if ($usuario) {
    
  if ($_POST['usuario']==$usuario["username"] && $_POST['contra']==$_POST['contra'] ) {  
        $_SESSION['usuarioo'] = $usuario["username"];
        $_SESSION['id']=$usuario["idAdmin"];
        header("location:inde2.php");
        echo $_SESSION['id'];
    }else{
        echo "<script>alert('Usuario y clave incorrectos, vuelva a intentarlo');</script>";
        
    }
}
}


?>
<!DOCTYPE html>
<html>
<head>
    <!---Menú--->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilos/Index/main.css">
    <link rel="stylesheet" type="text/css" href="Estilos/Index/menu.css">
    <link rel="stylesheet" type="text/css" href="Estilos/Index/Footer.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="Estilos/Index/main.js"></script>
    <!---Login--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Estilos/Login/stiloologinn.css">
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="menu_bar">
            <a class="bt-menu"><span class="icon-list2"></span>Menú de Saving Lifes</a>
        </div>

        <nav>
            <ul>
                <li><a href="Index.html"><span class="icon-house"></span>Pagina Principal</a></li>
                <!--Submenu-->
                <li class="submenu">
                    <a><span class="icon-rocket"></span>Apartados<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="Mascotas-perdidas.php">Animales Perdidos<span class="icon-dot"></span></a></li>
                        <li><a href="Mascotas-encontradas.php">Animales encontradas<span class="icon-dot"></span></a></li>
                        <li><a href="Mascotas-en-adopcion.php"> Animales en adopción<span class="icon-dot"></span></a></li>
                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a><span class="icon-rocket"></span>Foros<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="indexForo.php">Foro Comunitario<span class="icon-dot"></span></a></li>
                        <li><a href="indexForoVet.php">Foro veterinario<span class="icon-dot"></span></a></li>
                        <li><a href="indexForoRes.php">Foro rescatista<span class="icon-dot"></span></a></li>
                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a><span class="icon-rocket"></span>Formularios<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="Formulario-Reporte.php">Reportar mascota<span class="icon-dot"></span></a></li>
                        <li><a href="Formulario-Adopcion.php"> Adoptar una mascota<span class="icon-dot"></span></a></li>
                        <li><a href="daradopcion.php"> Dar en adopción<span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a><span class="icon-rocket"></span>Redes Sociales<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                    <li><a href="https://www.facebook.com/profile.php?id=100057552009985" target="_blank">Facebook<span class="icon-dot"></span></a></li>
		<li><a href="https://twitter.com/Lifes4Lifes?s=09" target="_blank"> Twitter<span class="icon-dot"></span></a></li>
		<li><a href="https://www.instagram.com/savinglif3s/" target="_blank"> Instagram<span class="icon-dot"></span></a></li>

                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a><span class="icon-rocket"></span>Cuenta<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="login.php">Iniciar Sesión<span class="icon-dot"></span></a></li>
                            <li><a href="vista/vistaCliente.php"> Registrarse<span class="icon-dot"></span></a></li>

                        <li><a href="vista/vistaVeterinario.php">Registro Especial<span class="icon-dot"></span></a></li>
                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
            </ul>
        </nav>
        <br>
    </header>
    





    <!--Inicio de formulario--->
    <div class="btn-div">
        <form method="post" action="">
        <h2>Inicio de Sesión</h2>
        <img src="Estilos/Login/SAVINGLIFE.png" class="btn-img"><br>
        <label>Nombre de usuario:</label><br>
        <input type="text" name="usuario" placeholder="Ej: AntonioMel12" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="contra" placeholder="********" required><br><br>
        <input type="submit" name="enviar" value="Iniciar Sesión">
    </form>
    </div>

    <footer>
       
<div class="container-footer-all">
        
<div class="container-body">

<div class="colum1">
<h1>Más información de la compañía</h1>

<p>Nosotros somos una compañía sin fines de lucro
que se encargara de salvar las vidas de todos 
aquellos animales que has sufrido del maltrato del ser 
Humano al ser abandonados ¡Di no al maltrato y al abandono animal!</p>

</div>

<div class="colum2">

<h1>Redes Sociales</h1>

<div class="row">
<img src="Estilos/FooterImg/facebook.png">
<label>Saving Lifes</label>
</div>
<div class="row">
<img src="Estilos/FooterImg/twitter.png">
<label>@Saving-Lifes</label>
</div>
<div class="row">
<img src="Estilos/FooterImg/instagram.png">
<label>SavingLifes</label>
</div>
</div>

                <div class="colum3">

                    <h1>Información Contactos</h1>

                    <div class="row2">
                        <img src="Estilos/FooterImg/house.png">
                        <label>San Salvador</label>
                    </div>

                    <div class="row2">
                        <img src="Estilos/FooterImg/smartphone.png">
                        <label>Aún no definido</label>
                    </div>

                    <div class="row2">
                        <img src="Estilos/FooterImg/contact.png">
                         <label>Saving.Lifes@Gmail.com</label>
                    </div>

                </div>

            </div>
        
        </div>
        
        <div class="container-footer">
               <div class="footer">
                    <div class="copy">
                        © 2020 Todos los Derechos Reservados | <a href="">Saving Lifes</a>
                    </div>

                    <div class="information">
                        <a href="">Información Compañía</a> | <a href="">Privación y Política</a> | <a href="">Términos y Condiciones</a>
                    </div>
                </div>

            </div>

        
    </footer>
    
</body>
</html>