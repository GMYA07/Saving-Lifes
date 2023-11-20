<?php 
session_start();
if ($_SESSION['usuarioo']){ 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Estilos/ReportarMascota/Grid.css">
        <meta http-equiv="content-type" content="text/html";>
    <link rel="stylesheet" type="text/css" href="Estilos/Index/menu.css">
    <link rel="stylesheet" type="text/css" href="Estilos/Index/Footer.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="Estilos/Index/main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
<link rel="stylesheet" href="Estilos/AdoptarMascota/adopcion.css">
        <title> Adopta una Mascota </title>
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
    
<br>
     <!--AQUI EMPIEZA EL FORM-->

     <div class="all-content"> 
        <section id="Titular">
            <h2>ADOPTA UNA MASCOTA</h2>
            <hr>
            <h4>SAVING LIFES</h4>
        </section>
        <div class="wrapper">
            <div class="form">
                <form   name="fvalida" action="controlador/crtlAdop.php" method="POST" id="formulario"  >
                    
                        <h3>Información Personal</h3>
                        <br>
                        <p>
                            <label for="name">Nombre:</label>
                            <input type="text" name="nombre" id="nombre"  class="campo" placeholder="Nombre" >
                        </p>
                        <p>
                            <label for="apellido">Apellidos:</label>
                            <input type="text" name="apellido" id="apellido" class="campo" placeholder="Apellido" >
                        </p>
                        <p>
                            <label for="phone">Número Telefonico:</label>
                            <input type="tel" name="tel" id="tel"class="campo"  placeholder="7777-7777" >
                        </p>
                        <p>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="campo" placeholder="Example123@dominio.com" >
                        </p>
                        <p class="block">
                            <label for="direccion">Dirección:</label>
                            <textarea name="direccion" id="direccion" class="campo" placeholder="Departamento/Municipio/colonia ó residencial"></textarea>
                        </p>

                        <br><br><br><br>

                        <p class="block">
                            <button type="submit" class="button" value="Agregar" name="accion"  id="btnabrir">Enviar petición de Adopción</button>

                        </p>      
                                   
               </form>
            </div>


    <div class="fondo_transparente">
        <div class="modal">
            <div class="modal_cerrar">
                <span>x</span>
            </div>
            <div class="modal_titulo">Mensaje de Saving Lifes</div>
            <div class="modal_mensaje">
                <p>Hay un campo vació verifica que todos los campos esten completos</p>
            </div>
            <div class="modal_botones">
            </div>
        </div>
    </div>
              <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

        body{
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
       
       
        .fondo_transparente{
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.226);
            position: absolute;
            height: 100vh;
            width: 100%;
            display: none;
        }
        .modal{
            background: linear-gradient(0deg,white 70%, crimson 30%);
            width: 600px;
            height: 300px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            border-radius: 30px;

        }
        .modal_cerrar{
            background: white;
            position: absolute;
            right: -20px;
            color: crimson;
            top: -20px;
            width: 40px;
            height: 40px;
            border-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .modal_titulo{
            color: white;
            font-size: 40px;
        }
        .modal_mensaje{  
            color: #000000;          
           padding: 10px 30px;
        }
        .modal_botones{      
            width: 100%;    
           background: whitesmoke;
           border-top:whitesmoke 1px;
           padding-top: 20px;
           display: flex;
           justify-content: space-evenly;
        }
        
        .boton{
            background: white;
            padding: 8px 30px;
            color: crimson;
            text-decoration: none;
            border-radius: 25px;
            border:1px solid crimson
        }
        .boton:hover{
            background: crimson;
            color: white;
        }
            
    </style>

    <script type="text/javascript">
   
    document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 

});


function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('nombre').value;
  if(usuario.length == 0) {
    document.getElementById("btnabrir").addEventListener("click",function(){
       document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
       return false
    })
    document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
    })
    return;
  }
  var apellido = document.getElementById('apellido').value;
  if (apellido.length ==0) {
     document.getElementById("btnabrir").addEventListener("click",function(){
       document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
       return false
    })
    document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
    })
    return;
  }
   var tele = document.getElementById('tel').value;
  if (tele.length ==0) {
    document.getElementById("btnabrir").addEventListener("click",function(){
       document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
       return false
    })
    document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
    })
    return;
  }
  var direccion = document.getElementById('direccion').value;
  if (direccion.length ==0) {
     document.getElementById("btnabrir").addEventListener("click",function(){
       document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
       return false
    })
    document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
    })
    return;
  }
  this.submit();

 

}
 /* 
 document.getElementById("btnabrir").addEventListener("click",function(){
       document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
       return false
    })
    document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
    })
*/

  </script>
  
    
                        <!--
                        <p class="block">
                            <button type="submit"  value="REGISTRAR">Enviar petición de Adopción</button>
                        </p>
                    -->
              

            <!--AQUI termina EL FORM-->


    <!-- Aqui comienza info-content-->

            <div class="info-content">
                <h3>Información Adicional</h3>
                    <ul >
                        <li>
                            <img src="Estilos/AdoptarMascota/icon/located.png">
                            <label>San Salvador</label>
                        </li>
                        <li>
                            <img src="Estilos/AdoptarMascota/icon/smartphone.png">
                             <label>Aún no definido</label>
                        </li>
                        <li>
                            <img src="Estilos/AdoptarMascota/icon/contact.png">
                            <label>Saving.Lifes@Gmail.com</label>
                        </li>
                    </ul>
                    
                    <p>Al adoptar una mascota adquieres una gran responsabilidad, por eso, antes de que tu adoptes,
                    queremos que estés seguro de que adoptaras a un animal para amarlo, no para dejarlo en las calles,
                    por favor, se consiente y cuida a tu mascota.</p>
                    <p class="company">Saving Lifes.com</p>          
            </div>
            <!-- Aqui termina info-content-->
        </div>
    </div>
    

    

        <!--Footer-->
        <footer>
            <div class="container-footer-all">
                <div class="container-body">
                    <div class="colum1">
                        <h1>Más información de la compañía</h1>
                        
                        <p class="dialogo">Nosotros somos una compañía sin fines de lucro
                    que se encargara de salvar las vidas de todos 
                aquellos animales que has sufrido del maltrato del ser 
            Humano al ser abandonados ¡Di no al maltrato y al abandono animal!</p>
                    </div>
                    <div class="colum2"> <h1>Redes Sociales</h1>
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
                    <div class="colum3"> <h1>Información Contactos</h1>
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
            <div class="container-footer"> <div class="footer">
                <div class="copy">
                    © 2020 Todos los Derechos Reservados | <a href="">Saving Lifes</a>
                </div>
                <div class="information">
                    <a href="">Información Compañía</a> | <a href="">Privación y Política</a> | <a href="">Términos y Condiciones</a>
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