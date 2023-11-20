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

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Estilos/Dar en adopción/stylee.css">
	<meta charset="utf-8">
	<title>Formulario para dar en adopción</title>
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
    





    <!--Inicio de formulario--->
    <form method="post" action="controlador/ctrlDarAdop.php" class="container-form"  enctype="multipart/form-data">
		
	<div class="form-group mt-2">
											

		<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
										
											<img src="Estilos/Dar en adopción/SAVINGLIFE.png" class="image"><br>
											
											
											<div class="form-group mt-2">
		<input type="text" name="nombre1"  class="form-style" placeholder="Nombre:" required >
		</div>
		
		<div class="form-group mt-2">
		<input type="text" name="apellidos2" class="form-style" placeholder="Apellidos:" required>
		</div>
		
		<div class="form-group mt-2">
		<input type="tel" name="tel2" class="form-style" placeholder="Numero Telefonico: ">
		</div>

		<div class="form-group mt-2">
		<input type="text" name="ubi" class="form-style" placeholder="Ubicacion: " required>	
		</div>

		<div class="form-group mt-2">
            <input type="text" name="especie" class="form-style" placeholder="Eliga de las especies:" list="Especie" required> 
                            <datalist id="Especie" name="especie">
                                    <option  value="Perro/a" selected></option>
                                    <option  value="Gato/a"></option>
                                    
                            </datalist>	
							</div>


							<div class="form-group mt-2">
		<input type="text" name="raza" class="form-style"  placeholder="Raza de mascota: " required>	
		</div>
		
		
		<div class="form-group mt-2">
		<input type="text" name="edadmascota" class="form-style"  placeholder="Edad de Mascota: " required>
		</div>
		
		<div class="form-group mt-2">
		<input type="text" name="pesomascota" class="form-style"  placeholder="Peso dde Mascota: " required>
		</div>
		
		<div class="form-group mt-2">
		<input type="text" name="vacunas" class="form-style"  placeholder="Control de vacunas de Mascota: " required>
		</div>
		
		<div class="form-group mt-2">
		<label>Sexo de la mascota:</label>
		<input type="radio" name="sexmas" value="Masculino"   required>Masculino
		<input type="radio" name="sexmas"  value="Femenino" required>Femenino
		</div>
		
		
		<div class="form-group mt-2">
		<input type="file" name="imgmascota" class="form-style"  placeholder="Imagen de Mascota: " required>
		</div>
		<div class="form-group mt-2">
		<input type="text" name="provimascota" class="form-style"  placeholder="Provincia de la Masscota: "  required>
		</div>
		
		<input type="submit" name="envio"class="btn mt-4" value="Dar en adopción">
										
                            				
				      					</div>
			      					</div>
			      				</div>
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
<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

body{
	font-family: 'Poppins', sans-serif;
	font-weight: 300;
	font-size: 15px;
	line-height: 1.7;
	color: #c4c3ca;
	background-color: #1f2029;
	overflow-x: hidden;
}
form{
	display: flex;
	margin: auto;
	flex-direction: center;
	align-items: center;
}
a {
	cursor: pointer;
  transition: all 200ms linear;
}
a:hover {
	text-decoration: none;
}
.link {
  color: #c4c3ca;
}
.link:hover {
  color: #ffeba7;
}
p {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.7;
}
h4 {
  font-weight: 600;
}
h6 span{
  padding: 0 20px;
  text-transform: uppercase;
  font-weight: 700;
}
.section{
  position: relative;
  width: 100%;
  display: block;
}
.full-height{
  min-height: 100vh;
}
[type="checkbox"]:checked,
[type="checkbox"]:not(:checked){
  position: absolute;
  left: -9999px;
}
.checkbox:checked + label,
.checkbox:not(:checked) + label{
  position: relative;
  display: block;
  text-align: center;
  width: 60px;
  height: 16px;
  border-radius: 8px;
  padding: 0;
  margin: 10px auto;
  cursor: pointer;
  background-color: #ffeba7;
}
.checkbox:checked + label:before,
.checkbox:not(:checked) + label:before{
  position: absolute;
  display: block;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  color: #ffeba7;
  background-color: #102770;
  font-family: 'unicons';
  content: '\eb4f';
  z-index: 20;
  top: -10px;
  left: -10px;
  line-height: 36px;
  text-align: center;
  font-size: 24px;
  transition: all 0.5s ease;
}
.checkbox:checked + label:before {
  transform: translateX(44px) rotate(-270deg);
}


.card-3d-wrap {
  position: relative;
  display: flex;
  margin: auto;
  flex-direction: center;
  align-items: center;
  width: 440px;
  max-width: 100%;
  height: 950px;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  perspective: 800px;
}
.card-3d-wrapper {
  width: 100%;
  height: 100%;
  position:absolute;    
  top: 0;
  left: 0;  
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  transition: all 600ms ease-out; 
}
.card-front, .card-back {
  width: 100%;
  height: 100%;
  background-color: #2a2b38;
  background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
  background-position: bottom center;
  background-repeat: no-repeat;
  background-size: 300%;
  position: absolute;
  border-radius: 6px;
  left: 0;
  top: 0;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
}
.card-back {
  transform: rotateY(180deg);
}
.checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
  transform: rotateY(180deg);
}
.center-wrap{
  position: absolute;
  width: 100%;
  padding: 0 35px;
  top: 50%;
  left: 0;
  transform: translate3d(0, -50%, 35px) perspective(100px);
  z-index: 20;
  display: block;
}


.form-group{ 
  position: relative;
  display: block;
    margin: 10px 10px;
    padding: 0;
	
}
.form-style {
  padding: 13px 20px;
  padding-left: 55px;
  height: 48px;
  width: 100%;
  font-weight: 500;
  border-radius: 4px;
  font-size: 14px;
  line-height: 22px;
  letter-spacing: 0.5px;
  outline: none;
  color: #c4c3ca;
  background-color: #1f2029;
  border: none;
  -webkit-transition: all 200ms linear;
  transition: all 200ms linear;
  box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
}
.form-style:focus,
.form-style:active {
  border: none;
  outline: none;
  box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
}
.input-icon {
  position: absolute;
  top: 0;
  left: 18px;
  height: 48px;
  font-size: 24px;
  line-height: 48px;
  text-align: left;
  color: #ffeba7;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:-ms-input-placeholder  {
  color: #c4c3ca;
  opacity: 0.7;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input::-moz-placeholder  {
  color: #c4c3ca;
  opacity: 0.7;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input:-moz-placeholder  {
  color: #c4c3ca;
  opacity: 0.7;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input::-webkit-input-placeholder  {
  color: #c4c3ca;
  opacity: 0.7;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input:focus:-ms-input-placeholder  {
  opacity: 0;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input:focus::-moz-placeholder  {
  opacity: 0;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input:focus:-moz-placeholder  {
  opacity: 0;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}
.form-group input:focus::-webkit-input-placeholder  {
  opacity: 0;
  -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.btn{  
  border-radius: 4px;
  height: 44px;
  font-size: 13px;
  font-weight: 600;
  text-transform: uppercase;
  -webkit-transition : all 200ms linear;
  transition: all 200ms linear;
  padding: 0 30px;
  letter-spacing: 1px;
  display: -webkit-inline-flex;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  -moz-justify-content: center;
  -ms-justify-content: center;
  justify-content: center;
  -ms-flex-pack: center;
  text-align: center;
  border: none;
  background-color: #ffeba7;
  color: #102770;
  box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);
}
.btn:active,
.btn:focus{  
  background-color: #102770;
  color: #ffeba7;
  box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
.btn:hover{  
  background-color: #102770;
  color: #ffeba7;
  box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}




.logo {
	position: absolute;
	top: 30px;
	right: 30px;
	display: block;
	z-index: 100;
	transition: all 250ms linear;
}
.logo img {
	height: 26px;
	width: auto;
	display: block;
}
</style>
<?php   
}else{
    header("location:login.php");
}
?>

