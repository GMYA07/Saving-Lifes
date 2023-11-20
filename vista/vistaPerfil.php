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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Estilos/Index/menu.css">
    <link rel="stylesheet" type="text/css" href="../Estilos/Datos/style.css">
    <link rel="stylesheet" type="text/css" href="../Estilos/Index/Footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="../Estilos/Index/main.js"></script>
    <title>Mi perfil</title>
</head>
<body>
    <header>
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
	if ($_SESSION['usuarioo']){
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
                            <li><a href="../cierresesion.php">Cerrar Sesión<span class="icon-dot"></span></a></li> 
                    </ul>
                </li>
                <!--Cierre de submenu-->
            </ul>
        </nav>
        <br>
    </header>
    

  
        <table>
           
            
           
<?php


if(!isset($cliente)){
    require_once "../modelo/daoCliente.php";
    require_once "../modelo/daoVeterinario.php";
}else
    require_once "../modelo/daoCliente.php";
    require_once "../modelo/daoVeterinario.php";

$dao = new DaoCliente();
$clientes = $dao->listadoClientes();
$dao = new DaoVeterinario();
$clientes = $dao->listadoClientes();
$enlace ="<a href='../controlador/ctrlCliente.php?accion=modificar&id=";
$enlace2 ="<a href='../controlador/ctrlVeterinario.php?accion=modificar&id=";
    require_once '../modelo/conexAdop.php';
    $id=$_GET['id'];
    $select=$pdo->query("SELECT *  FROM usuarios WHERE idCliente =" . $id);
    $select2=$pdo->query("SELECT *  FROM usuarioespe WHERE codigoUsu =". $id);
    $select3=$pdo->query("SELECT *  FROM administradores WHERE idAdmin =". $id);
    $perFila=$select->fetch(PDO::FETCH_ASSOC);
    $perFila2=$select2->fetch(PDO::FETCH_ASSOC);
    $perFila3=$select3->fetch(PDO::FETCH_ASSOC);
    $cadena=$id;
    $cadena= substr($cadena, -1);
    
    

    if($cadena == 0){
        echo  "
        
        
        <section class='seccion-perfil-usuario'>
        <div class='perfil-usuario-header'>
            <div class='perfil-usuario-portada'>
                <div class='perfil-usuario-avatar'>
                <i class='fas fa-user-circle fa-2x'></i>
                   
                </div>
               
            </div>
        </div>
        <div class='perfil-usuario-body'>
            <div class='perfil-usuario-bio'>
                <h3 class='titulo'>".$perFila['nombre'] ." ". $perFila['apellido']."</h3>
               
            </div>
            <div class='perfil-usuario-footer'>
                <ul class='lista-datos'>
                    <li><i class='icono fas fa-map-signs'></i> ID: ". $perFila['idCliente']."</li>
                    <li><i class='icono fas fa-user-check'></i> Nombre: ".$perFila['nombre'] ." ". $perFila['apellido'].".</li>
                    <li><i class='icono fas fa-phone-alt'></i> Telefono: ".$perFila['telefono']."</li>
                    <li><i class='icono fas fa-user-check'></i> Genero: ".$perFila['genero']."</li>
                </ul>
                <ul class='lista-datos'>
                <li><i class='icono fas fa-briefcase'></i> Nombre de Uusario: ".$perFila['username'].".</li>
                <li><i class='icono fas fa-building'></i> Rol: ".$perFila['rol']  ."</li>
                    <li><i class='icono fas fa-share-alt'></i> Contraseña: ".$perFila['contra'] .".</li>
                    <li><i class='icono fas fa-map-signs'></i> Correo Electronico: ".$perFila['eMail']."</li>
                    <li>Editar Perfil ".$enlace . $perFila['idCliente'] ."'><i class='fas fa-edit'></i></a></li>

                </ul>
            </div>
        </div>
    </section>

        
        
        
        
        ";
    }elseif($cadena == 1){
        echo "
        <section class='seccion-perfil-usuario'>
        <div class='perfil-usuario-header'>
            <div class='perfil-usuario-portada'>
                <div class='perfil-usuario-avatar'>
                <i class='fas fa-user-circle fa-2x'></i>
                   
                </div>
               
            </div>
        </div>
        <div class='perfil-usuario-body'>
            <div class='perfil-usuario-bio'>
                <h3 class='titulo'>".$perFila2['nombre'] ." ". $perFila2['apellido'] ."</h3>
               
            </div>
            <div class='perfil-usuario-footer'>
                <ul class='lista-datos'>
                    <li><i class='icono fas fa-map-signs'></i> ID: ". $perFila2['codigoUsu']."</li>
                    <li><i class='icono fas fa-user-check'></i> Nombre: ".$perFila2['nombre'] ." ". $perFila2['apellido'].".</li>
                    <li><i class='icono fas fa-phone-alt'></i> Telefono: ".$perFila2['telefono']."</li>
                    <li><i class='icono fas fa-user-check'></i> Genero: ".$perFila2['genero']."</li>
                </ul>
                <ul class='lista-datos'>
                <li><i class='icono fas fa-briefcase'></i> Nombre de Uusario: ".$perFila2['username'].".</li>
                <li><i class='icono fas fa-building'></i> Rol: ".$perFila2['rol'] ."</li>
                    <li><i class='icono fas fa-share-alt'></i> Contraseña: ".$perFila2['contra'].".</li>
                    <li><i class='icono fas fa-map-signs'></i> Correo Electronico: ".$perFila2['eMail']."</li>
                    <li>Editar Perfil ".$enlace2 . $perFila2['codigoUsu'] . "'><i class='fas fa-edit'>   </i></a></li>

                </ul>
            </div>
        </div>
    </section>

        "
        
        
        
        
        ;
    }elseif($cadena == 2){
        echo "
        <section class='seccion-perfil-usuario'>
        <div class='perfil-usuario-header'>
            <div class='perfil-usuario-portada'>
                <div class='perfil-usuario-avatar'>
                <i class='fas fa-user-circle fa-2x'></i>
                   
                </div>
               
            </div>
        </div>
        <div class='perfil-usuario-body'>
            <div class='perfil-usuario-bio'>
                <h3 class='titulo'>".$perFila3['nombre']. " " . $perFila3['apellido'] ."</h3>
               
            </div>
            <div class='perfil-usuario-footer'>
                <ul class='lista-datos'>
                    <li><i class='icono fas fa-map-signs'></i> ID: ". $perFila3['idAdmin']."</li>
                    <li><i class='icono fas fa-user-check'></i> Nombre: ".$perFila3['nombre']. " " . $perFila3['apellido'] .".</li>
                </ul>
                <ul class='lista-datos'>
                <li><i class='icono fas fa-briefcase'></i> Nombre de Uusario: ".$perFila3['username'].".</li>
                <li><i class='icono fas fa-building'></i> Rol: ".$perFila3['rol'] ."</li>
                    <li><i class='icono fas fa-share-alt'></i> Contraseña: ".$perFila3['contra'].".</li>
                </ul>
            </div>
        </div>
    </section>

        
        
        
        
        
        
        
        
        ";
    }
    
    
    


    
    
?>
        </table>
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
</body>
</html>
<?php   
}else
    header("location:login.php");

}
?>