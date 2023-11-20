<?php 
session_start();
if ($_SESSION['usuarioo']){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="vista/main2.js"></script>
    <script src="https://kit.fontawesome.com/8b239718e4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Estilos/Index/menu.css">
    <link rel="stylesheet" type="text/css" href="../Estilos/Index/Footer.css">
    <title>Cliente</title>
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
                        <li><a href="../Mascotas-encontradas.php">Animales encontradas<span class="icon-dot"></span></a></li>
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
		include("../modelo/conexForo.php");
        $id2= $_SESSION['id'];
	 $cadena=$id2;
	 $cadena= substr($cadena, -1); 
	   if($cadena==2){
		   echo "<li class='submenu'>
		   <a href='#'><span class='icon-rocket'></span>Administradores<span class='caret icon-arrow-down6'></span></a>
		   <ul class='children'>
		   <li><a href='vistaAdmin.php'>Listado de usuarios<span class='icon-dot'></span></a></li>
		   <li><a href='vistaAdminanimales.php'>Listado de adopcion<span class='icon-dot'></span></a></li>
		   <li><a href='vistaAdminanimales2.php'>Listado de desaparecidos<span class='icon-dot'></span></a></li>

							   
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


    <table class="table caption-top">
            <caption>Listado Animales reportados como perdidos</caption>
            <tr>
                <th  >Foto</th><th>ID</th><th>Dueño</th><th>Telefono</th><th>Correo</th><th>Nombre mascota</th><th>Edad</th><th>Especie</th><th>Raza</th><th>Ultima vez visto</th><th>Recompensa</th><th>Estado</th><th>Actualizar estado</th>
            </tr>
<?php
        require_once '../modelo/conexAdop.php';
        $tarjetas=$pdo->query("SELECT *  FROM reportar ");
        $enlace2 ="<a href='../controlador/ctrlCLiente.php?accion=actualizar&id=";
        ?>        
                        <?php
                            while ($perFila=$tarjetas->fetch(PDO::FETCH_ASSOC))
                            {
                                echo "<tr><td>". "<img width='100' height='100' class='targetIMG' src='data:image/png;base64," .base64_encode($perFila['fotoM'])." '  >"  ."</td><td>". $perFila['codigoReport'] ."</td><td>". $perFila['nombre'] ."</td><td>". $perFila['telefono'] ."</td><td>". $perFila['correo'] ."</td><td>". $perFila['nombreM'] ."</td><td>". $perFila['edadM'] ." ". $perFila['unidadTiempo'] ."</td><td>". $perFila['especieM'] ."</td><td>". $perFila['razaM'] ."</td><td>". $perFila['ultimaVista'] ." , ". $perFila['ultimaDireccion'] ."</td><td>". $perFila['recompensa'] ." , ". $perFila['cantidad'] ." ". $perFila['moneda'] ."</td><td>". $perFila['estado'] ."</td><td>" .$enlace2 .$perFila['codigoReport'] ."'><i class='fas fa-cog fa-2x'></i></a></td></tr>";
                            }
?>




    </table>
    </div>
    <br>
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

<div class="row2">
<img src="../Estilos/FooterImg/facebook.png">
<label>Saving Lifes</label>
</div>
<div class="row2">
<img src="../Estilos/FooterImg/twitter.png">
<label>@Saving-Lifes</label>
</div>
<div class="row2">
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



</body>
</html>
<?php
}else{
    header("location:login.php");
}
?>