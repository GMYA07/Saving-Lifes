<?php 
session_start();
if ($_SESSION['usuarioo']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../Estilos/Foros/Estilo2.css">
	<link rel="stylesheet" type="text/css" href="../Estilos/Index/main.css">
	<link rel="stylesheet" type="text/css" href="../Estilos/Index/menu.css">
	<link rel="stylesheet" type="text/css" href="../Estilos/Index/Footer.css">
    <script src="https://kit.fontawesome.com/8b239718e4.js" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/8b239718e4.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../Estilos/Index/main.js"></script>
	<title>Foro comunitario</title>
</head>
<body>

<header>
<a name="Inicio"></a>
        <div class="menu_bar">
            <a class="bt-menu"><span class="icon-list2"></span>Menú de Saving Lifes</a>
        </div>

        <nav>
            <ul>
                <li><a href="../inde2.php"><span class="icon-house"></span>Pagina Principal</a></li>
                <!--Submenu-->
                <li class="submenu">
                    <a href="#"><span class="icon-rocket"></span>Apartados<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="../Mascotas-perdidas.php">Animales Perdidos<span class="icon-dot"></span></a></li>
                        <li><a href="Mascotas-encontradas.php">Animales encontradas<span class="icon-dot"></span></a></li>				
                        <li><a href="../Mascotas-en-adopcion.php"> Animales en adopción<span class="icon-dot"></span></a></li>
                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a href="#"><span class="icon-rocket"></span>Foros<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="../indexForo.php?id=<?php echo $_SESSION['id'];?>">Foro Comunitario <span class="icon-dot"></span></a></li>
                        <li><a href="../indexForoVet.php?id=<?php echo $_SESSION['id'];?>">Foro veterinario<span class="icon-dot"></span></a></li>
                        <li><a href="../indexForoRes.php?id=<?php echo $_SESSION['id'];?>">Foro rescatista<span class="icon-dot"></span></a></li>
                        
                    </ul>
                </li>
                <!--Cierre de submenu-->
                <!--Submenu-->
                <li class="submenu">
                    <a href="#"><span class="icon-rocket"></span>Formularios<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="../Formulario-Reporte.php">Reportar mascota<span class="icon-dot"></span></a></li>
                        <li><a href="../Formulario-Adopcion.php"> Adoptar una mascota<span class="icon-dot"></span></a></li>
                        <li><a href="../daradopcion.php"> Dar en adopción<span class="icon-dot"></span></a></li>
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
                <?php
	if ($_SESSION['usuarioo']){
		include("../modelo/conexForo.php");
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
                <!--Submenu-->
                <li class="submenu">
	<a href="#"><span class="icon-rocket"></span>Cuenta<span class="caret icon-arrow-down6"></span></a>
	<ul class="children">
	
	<li><a href="vistaPerfil.php?id=<?php echo $_SESSION['id'];?>">Ver mi perfil<span class="icon-dot"></span></a></li>
	<li><a href="../cierresesion.php">Cerrar sesión<span class="icon-dot"></span></a></li>
						
	</ul>
	</li>
                <!--Cierre de submenu-->
            </ul>
        </nav>
        <br>
    </header>
    
	<br><br><br>
    
<?php
	include("../modelo/conexForo.php");
	if(isset($_GET["id"]))
	$id = $_GET['id'];
    $id2= $_GET['id2'];
    
	$query = "SELECT * FROM  foro WHERE ID = '$id' ORDER BY fecha DESC";
	$result = $mysqli->query($query);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$autor = $row['autor'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		
		echo "<tr><td><span class='titulo'>$titulo</span></tr></td>";
		echo "<table class='tabla1'>";
		echo "<tr ><td class='margen2' id='uno'> Usuario: $autor </td></tr>";
        echo "<tr><td class='margen2' id='uno'> $mensaje </td></p></tr>";
		echo "</table>";
		echo "<br><div class='linkbttn2'>";
		echo "<a class='link' href='../formularioRespu.php?id&respuestas=$respuestas&identificador=$id&id3=$id2'>Responder</a><br><br>";
		echo "</div>";

	}	
	$query2 = "SELECT * FROM  foro WHERE identificador = '$id' ORDER BY fecha DESC";
	$result2 = $mysqli->query($query2);
	echo "<br><hr><br><br><p class='p1'>Respuestas</p><br><br>";
	
	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$autor = $row['autor'];
		$mensaje = $row['mensaje'];
		$fecha = $row['fecha'];
        $id4=$_GET['id2'];
        $cadena=$id4;
    	$cadena= substr($cadena, -1);
        $enlace2 ="<a href='../controlador/ctrlCliente.php?accion=eliminar3&id=";
		echo"<div class='margen'>";
		echo "<div class='container'>";
		echo "<table class='tabla1'>";
		echo "<tr><td class='dos'>Usuario: $autor</td><td class='uno'>Mensaje: $mensaje   </td><td></td>";
        if($cadena==2){ 
        echo "<td >".$enlace2 . $row['ID'] ."'>  <i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
        }else
        echo "</tr>";

		$cadena=$mensaje;
		$ejemplo = strlen($cadena);
		echo "</table>";
		echo "</div>";
		echo "El número de caracteres que contiene el mensaje es: $ejemplo.";
		echo "<br><div class='linkbttn'>";
		echo "<a class='link' href='../formularioRespu.php?id&respuestas=$respuestas&identificador=$id'>Responder</a><br><br>";
		echo "</div>";
		echo"</div>";
	}
    
?>
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
<img src="../Estilos/FooterImg/facebook.png">
<label>Saving Lifes</label>
</div>
<div class="row">
<img src="../Estilos/FooterImg/twitter.png">
<label>@Saving-Lifes</label>
</div>
<div class="row">
<img src="../Estilos/FooterImg/instagram.png">
<label>SavingLifes</label>
</div>
</div>

                <div class="colum3">

                    <h1>Información Contactos</h1>

                    <div class="row2">
                        <img src="../Estilos/FooterImg/house.png">
                        <label>San Salvador</label>
                    </div>

                    <div class="row2">
                        <img src="../Estilos/FooterImg/smartphone.png">
                        <label>Aún no definido</label>
                    </div>

                    <div class="row2">
                        <img src="../Estilos/FooterImg/contact.png">
                         <label>Saving.Lifes@Gmail.com</label>
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
}else
header("location:login.php");
}
?>