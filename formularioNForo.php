<?php 
session_start();
if ($_SESSION['usuarioo']){
?>
<!DOCTYPE html>
<html>
<head>
  <title> Nuevo foro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Estilos/Index/main.css">
  <link rel="stylesheet" type="text/css" href="Estilos/Index/menu.css">
  <link rel="stylesheet" type="text/css" href="Estilos/Index/Footer.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="Estilos/Index/main.js"></script>
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
	if ($_SESSION['usuarioo']){
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
<?php
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
		$identificador = 0;
?>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:400);
form{
  padding: 10px;
  max-width: 400px;
  margin: 0 auto;
}

form input, form textarea{
  margin-bottom: 15px;
  font-family: "Roboto", sans-serif;
  width: 100%;
  padding: 10px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box; 
  border: none; 
  color: #525c66; 
  font-size: 1em;
  resize: horizontal; 
  cursor: pointer;

}

form button {
  display: block;
  background-color: #0095eb;
  padding: 10px 45px 10px 45px;
  border: 0;
  font-size: 1em; 
  color:  white;
  font-family: "Roboto", sans-serif;
}
form button: hover{
  background-color: #046193;
}
textarea { resize: none; }
.form-structor {
	background-color: #222;
	border-radius: 15px;
	height: 550px;
	width: 350px;
	position: relative;
	overflow: hidden;
  display:block;
margin:auto;

	
	&::after {
		content: '';
		opacity: .8;
		position: absolute;
		top: 0;right:0;bottom:0;left:0;
		background-repeat: no-repeat;
		background-position: left bottom;
		background-size: 500px;
    display:block;
margin:auto;
  background-image: url('./Estilos/img/imgforo.jpg');

	}

	.signup {
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		width: 65%;
		z-index: 5;
		-webkit-transition: all .3s ease;
		
		
		&.slide-up {
			top: 5%;
			-webkit-transform: translate(-50%, 0%);
			-webkit-transition: all .3s ease;
		}
		
		&.slide-up .form-holder,
		&.slide-up .submit-btn {
			opacity: 0;
			visibility: hidden;
		}
		
		&.slide-up .form-title {
			font-size: 1em;
			cursor: pointer;
		}
		
		&.slide-up .form-title span {
			margin-right: 5px;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all .3s ease;
		}
		
		.form-title {
			color: #fff;
			font-size: 1.7em;
			text-align: center;
			
			span {
				color: rgba(0,0,0,0.4);
				opacity: 0;
				visibility: hidden;
				-webkit-transition: all .3s ease;
			}
		}
		
		.form-holder {
			border-radius: 15px;
			background-color: #fff;
			overflow: hidden;
			margin-top: 50px;
			opacity: 1;
      margin-bottom: 10px;
			visibility: visible;
			-webkit-transition: all .3s ease;
			
			.input {
				border: 0;
				outline: none;
				box-shadow: none;
				display: block;
				height: 30px;
				line-height: 30px;
				padding: 8px 15px;
				border-bottom: 1px solid #eee;
				width: 100%;
				font-size: 18px;
				
				&:last-child {
					border-bottom: 0;
				}
				&::-webkit-input-placeholder {
					color: rgba(0,0,0,0.4);
				}
			}
		}
		
		.submit-btn {
			background-color: rgba(0,0,0,0.4);
			color: rgba(256,256,256,0.7);
			border:0;
			border-radius: 15px;
			display: block;
			margin: 15px auto; 
			padding: 15px 45px;
			width: 100%;
			font-size: 13px;
			font-weight: bold;
			cursor: pointer;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all .3s ease;
			
			&:hover {
				transition: all .3s ease;
				background-color: rgba(0,0,0,0.8);
			}
		}
	}
	
	.login {
		position: absolute;
		top: 20%;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #fff;
		z-index: 5;
		-webkit-transition: all .3s ease;
		
		&::before {
			content: '';
			position: absolute;
			left: 50%;
			top: -20px;
			-webkit-transform: translate(-50%, 0);
			background-color: #fff;
			width: 200%;
			height: 250px;
			border-radius: 50%;
			z-index: 4;
			-webkit-transition: all .3s ease;
		}
		
		.center {
			position: absolute;
			top: calc(50% - 10%);
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			width: 65%;
			z-index: 5;
			-webkit-transition: all .3s ease;
			
			.form-title {
				color: #000;
				font-size: 1.7em;
				text-align: center;

				span {
					color: rgba(0,0,0,0.4);
					opacity: 0;
			    visibility: hidden;
				  -webkit-transition: all .3s ease;
				}
			}

			.form-holder {
				border-radius: 15px;
				background-color: #fff;
				border: 1px solid #eee;
				overflow: hidden;
				margin-top: 50px;
				opacity: 1;
				visibility: visible;
				-webkit-transition: all .3s ease;

				.input {
					border: 0;
					outline: none;
					box-shadow: none;
					display: block;
					height: 30px;
					line-height: 30px;
					padding: 8px 15px;
					border-bottom: 1px solid #eee;
					width: 100%;
					font-size: 12px;

					&:last-child {
						border-bottom: 0;
					}
					&::-webkit-input-placeholder {
						color: rgba(0,0,0,0.4);
					}
				}
			}

			.submit-btn {
				background-color: #6B92A4;
				color: rgba(256,256,256,0.7);
				border:0;
				border-radius: 15px;
				display: block;
				margin: 15px auto; 
				padding: 15px 45px;
				width: 100%;
				font-size: 13px;
				font-weight: bold;
				cursor: pointer;
				opacity: 1;
				visibility: visible;
				-webkit-transition: all .3s ease;

				&:hover {
					transition: all .3s ease;
					background-color: rgba(0,0,0,0.8);
				}
			}
		}
		
		&.slide-up {
			top: 90%;
			-webkit-transition: all .3s ease;
		}
		
		&.slide-up .center {
			top: 10%;
			-webkit-transform: translate(-50%, 0%);
			-webkit-transition: all .3s ease;
		}
		
		&.slide-up .form-holder,
		&.slide-up .submit-btn {
			opacity: 0;
			visibility: hidden;
			-webkit-transition: all .3s ease;
		}
		
		&.slide-up .form-title {
			font-size: 1em;
			margin: 0;
			padding: 0;
			cursor: pointer;
			-webkit-transition: all .3s ease;
		}
		
		&.slide-up .form-title span {
			margin-right: 5px;
			opacity: 1;
			visibility: visible;
			-webkit-transition: all .3s ease;
		}
	}
}
</style>
<br><br><br><br>
<?php
  include("modelo/conexForo.php");
  $id3= $_SESSION['id'];
  echo "<form name='form' action='modelo/daoForo.php?id=$id3' method='post'>";
  $cadena=$id3;
 $cadena= substr($cadena, -1); 
   if($cadena==0){
    $query2 = "SELECT *  FROM usuarios WHERE idCliente =".$id3;
    $query2 = $mysqli->query($query2);
    $fila = $query2->fetch_assoc();

   }elseif($cadena==1){
    $query2 = "SELECT *  FROM usuarioespe WHERE codigoUsu =".$id3;
    $query2 = $mysqli->query($query2);
    $fila = $query2->fetch_assoc();
   }elseif($cadena==2){
    $query2 = "SELECT *  FROM administradores WHERE idAdmin =".$id3;
    $query2 = $mysqli->query($query2);
    $fila = $query2->fetch_assoc();
   }
  
  
?>


<form  action="modelo/daoForo.php" method="post">
<div class="form-structor">
	<div class="signup">
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
  <input type="hidden" name="autor" value="<?php echo $fila['username'];?>">
    


		
    <div class="form-holder">
      <input type="text" name="titulo" class="input" placeholder="Titulo">
      </div>
      <textarea  name="mensaje" cols="50" rows="5" required="required" placeholder="Mensaje"></textarea>
      
   
      <input type="submit" id="submit" name="submit" value="Crear Foro">
  
      </div>
</div>
  </form>

  <br><br><br>
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
}else
header("location:login.php");
}
?>
