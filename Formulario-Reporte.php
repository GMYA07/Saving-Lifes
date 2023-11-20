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
        <link rel="stylesheet" href="Estilos/ReportarMascota/Reportar.css">
        <title> Mascota Perdida </title>
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
    
<br><br><br><br>
    </div>
        <!-- Cuerpo de la Pagina de Mascotas Perdidas -->
        <div id="MascotaPerdida">
            <section id="Titulo">
                <p>Reportar una mascota perdida</p>
            </section>
           
            <section id="Cuerpo">
                <p class="text"> Nosotros sabemos, que muchas veces sin poder evitarlo, perdemos a nuestra mascota. Sabemos el dolor que eso causa, tanto para los grandes, como los pequeños de la casa. 
                    <br>Por eso, deja de preocuparte, porque: ¡Nosotros te ayudaremos a encontrarlo!, Para poder ayudarte, por favor, llena el siguiente formulario: </p>
                <form id="Formulario" action="controlador/ctrlReport.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="estado" value="extraviado">  
                <fieldset id="Dueño">   
                        <legend> Información del Dueño: </legend>
                        <table border="0">
                            <tr> <td> Nombre:<i title="Llenar este campo es obligatorio">*</i> </td> <td> Edad:<i title="Llenar este campo es obligatorio">*</i> </td> </tr>
                            <tr> <td> <input type="text" name="name" placeholder="Escriba su nombre" required> </td> <td><input type="number" name="age" placeholder="Edad +18" min="18" max="50" required> </td> </tr>
                            <tr> <td> Teléfono:<i title="Llenar este campo es obligatorio">*</i> </td> <td> Email:<i title="Llenar este campo es obligatorio">*</i> </td> </tr>
                            <tr> <td> <input type="tel" name="tel" placeholder="Escriba su número celular" required> </td> <td> <input type="email" name="email" placeholder="Escriba su email" required></tr>
                        </table>
                    </fieldset>
                    <fieldset id="Mascota">
                          <legend> Información de la Mascota: </legend>
                          <table border="0">
                            <tr> <td> Foto:<i title="Llenar este campo es obligatorio">*</i> </td> <td> Nombre:<i title="Llenar este campo es obligatorio">*</i> </td> </tr>
                            <tr> <td rowspan="3"> <input type="file" name="img" accept=".jpg,.png" required> </td> <td>  <input type="text" name="nameM" placeholder="Escriba el nombre de su mascota" required> </td> </tr>
                            <tr> <td> Edad:<i title="Llenar este campo es obligatorio">*</i> </td> </tr>
                            <tr> <td>  <input type="number" name="age_a" placeholder="Edad" min="1" max="12" required>
                                <select id="EdadM" name="time"> 
                                    <option value=" Mes/es" selected> Mes/es </option>
                                    <option value=" Año/s"> Año/s </option>
                                </select> </td> </tr>
                            <tr> <td> Especie:<i title="Llenar este campo es obligatorio">*</i> </td>  <td> Raza:<i title="Llenar este campo es obligatorio">*</i> </td> </tr> 
                            <tr> <td> <input type="text" name="raza" placeholder="Eliga de las especies siguientes:" list="Especie" required> 
                            <datalist id="Especie" name="especie">
                                    <option  value="Perro/a" selected></option>
                                    <option  value="Gato/a"></option>
                                    
                            </datalist> <td> <input type="text" name="raz" placeholder="Si es posible, sea especifico" required> </tr>                        
                            <tr> <td> Ultima vez visto:<i title="Llenar este campo es obligatorio">*</i> </td> <td> Dirección del último lugar visto:<i title="Llenar este campo es obligatorio">*</i> </td> </tr>
                            <tr> <td> <input name="Ultima" type="datetime-local" required> </td> <td> <textarea name="text" rows="3" cols="50" placeholder="Ingrese el pais, departamento, municipio, edificio...." required></textarea> </td> </tr>
                            <tr> <td rowspan="2"> Recompensa:<i title="Llenar este campo es obligatorio">*</i> </td> <td> <label><input type="radio" name="Recompensa" value="No" checked> No </label></td> </tr>
                            <tr> <td> <label><input type="radio" name="Recompensa" value="Si"> Si, Cantidad: <input type="number" name="can" min="1" max="100" placeholder="Max 1, min 100">
                                <select id="Moneda" name="moneda">
                                    <option name="moneda" value=" Dolares ($)" selected> Dólares ($)</option>
                                    <option name="moneda" value=" Pesos Mexicanos (¢)"> Pesos Mexicanos (¢)</option>
                                    <option name="moneda" value=" Euros (€)"> Euros (€)"</option>
                                </select> </label></td> </tr>
                            </table>
                    </fieldset>
                    <input id="Enviar" type="submit">  
                </form>
            </section>
            <!--sfsf-->
            
            <!--fghftgh-->
        </div>

        <br/><br/>

        <!--Footer-->
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