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
	<link rel="stylesheet" type="text/css" href="Estilos/Foros/estilo1.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="Estilos/Index/main.css">
  	<link rel="stylesheet" type="text/css" href="Estilos/Index/menu.css">
  	<link rel="stylesheet" type="text/css" href="Estilos/Index/Footer.css">
  	<script src="http://code.jquery.com/jquery-latest.js"></script>
	  <script src="https://kit.fontawesome.com/8b239718e4.js" crossorigin="anonymous"></script>

  	<script type="text/javascript" src="Estilos/Index/main.js"></script>
	<title>Foro rescates</title>
</head>
<body>
<header>
	<div class="menu_bar">
	<a class="bt-menu"><span class="icon-list2"></span>Menú de Saving Lifes</a>
	</div>

	<nav>
	<ul>
	<li><a href="inde2.php"><span class="icon-house"></span>Pagina Principal</a></li>
	<!--Submenu-->
	<li class="submenu">
	<a href="#"><span class="icon-rocket"></span>Apartados<span class="caret icon-arrow-down6"></span></a>
	<ul class="children">
		<li><a href="Mascotas-perdidas.php">Animales Perdidos<span class="icon-dot"></span></a></li>
		<li><a href="Mascotas-encontradas.php">Animales encontradas<span class="icon-dot"></span></a></li>				
		<li><a href="Mascotas-en-adopcion.php"> Animales en adopción<span class="icon-dot"></span></a></li>
	</ul>
	</li>
	<!--Cierre de submenu-->
	<!--Submenu-->
	<li class="submenu">
	<a href="#"><span class="icon-rocket"></span>Foros<span class="caret icon-arrow-down6"></span></a>
	<ul class="children">
	<li><a href="indexForo.php?id=<?php echo $_SESSION['id'];?>">Foro Comunitario <span class="icon-dot"></span></a></li>
	<li><a href="indexForoVet.php?id=<?php echo $_SESSION['id'];?>">Foro veterinario<span class="icon-dot"></span></a></li>
	<li><a href="indexForoRes.php?id=<?php echo $_SESSION['id'];?>">Foro rescatista<span class="icon-dot"></span></a></li>
						
	</ul>
	</li>
	<!--Cierre de submenu-->
	<!--Submenu-->
	<li class="submenu">
	<a href="#"><span class="icon-rocket"></span>Formularios<span class="caret icon-arrow-down6"></span></a>
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
	<!--Submenu-->
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
	</header>

	
	
<h1>Foro de ayuda y rescate de animales</h1>
<table class="tabla1" width="80%" >
	

<?php 
	include("modelo/conexForo.php");
	$query = "SELECT * FROM  foror WHERE identificador = 0 ORDER BY fecha DESC";
	$result = $mysqli->query($query);
	$id3=$_GET['id'];
	$id4=$_GET['id'];
	$cadena=$id4;
	$cadena= substr($cadena, -1);

	echo "<tr>
	<td class='tres'width='20px'></td>
	<td class='dos' width='200px'><b>Título</b></td>
	<td class='dos' width='200px'><b>Fecha</b></td>
	<td class='dos' width='200px'><b>Usuarios apuntados</b></td>";
	if($cadena==2){
		echo "<td class='dos' width='200px'><b>Eliminar foro</b></td>
		</tr>";
	}else
	echo "</tr>";

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
		
		echo "<tr>";
			echo "<td class='dos'><a class='ver' href='vista/vistaForoRes.php?id=$id&id2=$id3'><b>ver</b></a></td>";
			echo "<td class='uno'>$titulo</td>";
			echo "<td class='uno'>".date("d-m-Y",strtotime($fecha."- 1 days"))."</td>";
			echo "<td class='uno'>$respuestas</td>";
			if($cadena==2){
				$enlace2 ="<a href='controlador/ctrlCliente.php?accion=eliminar5&id=";
				echo "<td class='uno'>".$enlace2 . $row['ID'] ."'><i class='fas fa-trash-alt'></i></a></td>";
				echo "</tr>";

			}else
			echo "</tr>";
		
		 
	}
	$cadena=$id3;
	$cadena= substr($cadena, -1); 
	if($cadena==0 || $cadena==2){
		$id2=$_GET['id'];
		$query2 = "SELECT rol  FROM usuarios WHERE idCliente =" . $id2;
		if($query2 = $mysqli->query($query2)){
			$fila = $query2->fetch_assoc();
			if($cadena==2 || $fila['rol']=='Rescatista'){
				echo"</table>
				<form class='form' action='formularioNForoRes.php'>
			    <input class='button' type='submit' value='Nuevo tema' />
				</form>
				</body>
				</html>";

			echo"</table>";
		}
		}
		
	}elseif($cadena==1)
			echo"</table>";
			
		
		
?>

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
<?php 
}else{
header("location:login.php");
}
?>
