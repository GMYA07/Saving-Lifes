<?php 
session_start();
if ($_SESSION['usuarioo']){
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Estilos/Index/main.css">
	<link rel="stylesheet" type="text/css" href="Estilos/Index/menu.css">
	<link rel="stylesheet" type="text/css" href="Estilos/Index/Footer.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="Estilos/Index/main.js"></script>
<link rel="stylesheet" type="text/css" href="Estilos/Mascotas en adopcion/style.css">
<script src="https://kit.fontawesome.com/8b239718e4.js" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="Estilos/Mascotas perdidas/style2.css">
	<meta charset="utf-8">
	<title>Mascotas perdidas</title>

    <style type="text/css">
        .targetIMG{
            max-width: 100%;
            max-height: 100%;
            
        }
  </style>

</head>
<body>
	<header>
    <a name="Inicio"></a>

        <div class="menu_bar">
            <a class="bt-menu"><span class="icon-list2"></span>Menú de Saving Lifes</a>
        </div>

        <nav>
            <ul>
                <li><a href="inde2.php"><span class="icon-house"></span>Página Principal</a></li>
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
                        <li><a href="indexForo.php?id=<?php echo $_SESSION['id'];?>">Foro Comunitario <span class="icon-dot"></span></a></li>
                        <li><a href="indexForoVet.php?id=<?php echo $_SESSION['id'];?>">Foro veterinario<span class="icon-dot"></span></a></li>
                        <li><a href="indexForoRes.php?id=<?php echo $_SESSION['id'];?>">Foro rescatista<span class="icon-dot"></span></a></li>
                        
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
    <a href="#"><span class="icon-rocket"></span>Redes Sociales<span class="caret icon-arrow-down6"></span></a>
    <ul class="children">
    <li><a href="https://www.facebook.com/profile.php?id=100057552009985" target="_blank">Facebook<span class="icon-dot"></span></a></li>
		<li><a href="https://twitter.com/Lifes4Lifes?s=09" target="_blank"> Twitter<span class="icon-dot"></span></a></li>
		<li><a href="https://www.instagram.com/savinglif3s/" target="_blank"> Instagram<span class="icon-dot"></span></a></li>
                        
    </ul>
    </li>
    <!--Cierre de submenu-->
    <!--Submenu-->
    <?php
		include("modelo/conexForo.php");
	$id2= $_SESSION['id'];
	 $cadena=$id2;
	 $cadena= substr($cadena, -1); 
	   if($cadena==2){
		   echo "<li class='submenu'>
		   <a href='#'><span class='icon-rocket'></span>Administradores<span class='caret icon-arrow-down6'></span></a>
		   <ul class='children'>
		   <li><a href='vista/vistaAdmin.php'>Listado de usuarios<span class='icon-dot'></span></a></li>
		   <li><a href='vista/vistaAdminanimales.php'>Listado de adopcion<span class='icon-dot'></span></a></li>
		   <li><a href='vista/vistaAdminanimales2.php'>Listado de desaparecidos<span class='icon-dot'></span></a></li>

							   
		   </ul>
		   </li>";
	   }else
    
	?>
    <li class="submenu">
    <a href="#"><span class="icon-rocket"></span>Cuenta<span class="caret icon-arrow-down6"></span></a>
    <ul class="children">
    <li><a href="vista/vistaPerfil.php?id=<?php echo $_SESSION['id'];?>">Ver mi perfil<span class="icon-dot"></span></a></li>
    <li><a href="cierresesion.php">Cerrar sesión<span class="icon-dot"></span></a></li>               
    </ul>
    </li>


                <!--Cierre de submenu-->
            </ul>
        </nav>
        <br>
    </header>

    <section id="Titulo">
        <p>Mascotas perdidas</p>
    </section>

   

<center>


<?php
require_once 'modelo/conexAdop.php';
$tarjetas=$pdo->query("SELECT *  FROM reportar ");
?>
      
      <?php

        
      while ($perFila=$tarjetas->fetch(PDO::FETCH_ASSOC)){
        if($perFila['estado']==='extraviado'){
        echo" <div class='flip-card'>
                <div class='flip-card-inner'>
                    <div class='flip-card-front'>
                        <img class='targetIMG'  src='data:image/png;base64,".base64_encode($perFila['fotoM'])." '  >
                            <div class='container'>
                                <h4><b>".$perFila['nombreM']."</b></h4>
                                <p><b>Estado:</b></p>
                                <h4><b>".$perFila['estado']."</b></h4>
                            </div>
                    </div>
                    <div class='flip-card-back'>
                        <p id='Titulotext'>
                            <b>Información de la mascota</b>
                        </p><br>
                        <p>
                            <b>Especie: ".$perFila['especieM']."</b>
                        </p>
                        <p>
                            <b>Raza: ".$perFila['razaM']."</b>
                        </p>
                        <p>
                            <b>Último día y lugar visto: ".$perFila['ultimaVista']." en ".$perFila['ultimaDireccion']."</b>
                        </p>
                        <p>
                            <b>Recompensa: ".$perFila['recompensa']." ($".$perFila['cantidad'].")</b>
                        </p><br>
                        <p id='Titulotext'>
                            <b>Información de contacto</b>
                        </p><br>
                        <p>
                            <b>Nombre: ".$perFila['nombre']."</b></p>
                        <p>
                            <b>Teléfono:  ".$perFila['telefono']."</b>
                        </p>
                        <p>
                            <b>Correo: ".$perFila['correo']."</b>
                        </p> 
                    </div>

                </div>
                <br><button class='button' ><a href='formularioEliminar.php'><b>Contactar</b></a></button>

             </div>";
      
        }
      }
    
      
      ?>
      </center>




      <div><a href='#Inicio' class='ancla2' onclick='topFunction()' id='myBtn' title='Inicio'><i class='fas fa-angle-double-up'></i></a></div>

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
                <script>
                        
                        //Get the button
                        var mybutton = document.getElementById("myBtn");
                        
                        // When the user scrolls down 20px from the top of the document, show the button
                        window.onscroll = function() {scrollFunction()};
                        
                        function scrollFunction() {
                          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                          } else {
                            mybutton.style.display = "none";
                          }
                        }
                        
                        // When the user clicks on the button, scroll to the top of the document
                        function topFunction() {
                          document.body.scrollTop = 0;
                          document.documentElement.scrollTop = 0;
                        }
                        </script>
                        <style type="text/css"> 
                                        
                                    .ancla2{
                                            display: none;
                                            font-size: 45px;
                                            border-radius: 3px;
                                            position: fixed;
                                            margin-top: 55px;
                                            color:#8E7DBE;
                                            cursor: pointer;
                                            bottom: 20px;
                                            right: 30px;
                                            z-index: 99;
                        
                                    }
                                        
                                    </style>

            </div>  
    </footer>
   
</body>
</html>
<?php 
}else{
header("location:login.php");
}

?>

