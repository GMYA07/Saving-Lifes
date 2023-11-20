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

    <link rel="stylesheet" type="text/css" href="../Estilos/Index/menu.css">
    <link rel="stylesheet" type="text/css" href="../Estilos/Index/Footer.css">
    <title>Cliente</title>
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
                <!--Submenu-->
                <li class="submenu">
    <a href="#"><span class="icon-rocket"></span>Cuenta<span class="caret icon-arrow-down6"></span></a>
    <ul class="children">
    <li><a href="../login.php"> Iniciar Sesión<span class="icon-dot"></span></a></li>
    <li><a href="vistaCliente.php"> Registrarse<span class="icon-dot"></span></a></li>
    <li><a href="vistaVeterinario.php">Registro Especial<span class="icon-dot"></span></a></li>
                        
    </ul>
    </li>
                <!--Cierre de submenu-->
            </ul>
        </nav>
        <br>
    </header>
<h3><center>Registro especial</center></h3>
    <div class="container">    
        <form action="../controlador/ctrlVeterinario.php" method="post" >
        <div class="form-group mb-2 row">            
            <div class="col">
            <label>
                    Nombre:
            </label>
            <input class="form-control" size="20" type="text" name="nom" required />
            </div>
            <div class="col">
            <label>
                Apellido:
            </label>
            <input type="text" class="form-control" name="ape" required/>
            </div>
        </div>

        <div class="form-group  mb-2 row">
        <div class="col">
            <label>
                Genero:
            </label>
                <input type="radio" name="gen" value="masculino" required> Masculino
                <input type="radio" name="gen" value="femenino"required> Femenino<br>
        </div>

        <div class="col">
            <label>
                Rol:
            </label>
            <input type="radio" name="roles" value="Veterinario"required>Veterinario
        </div>
        </div>

        <div class="form-group  mb-2 row">
        <div class="col">
            <label>
                Nombre de Usuario:
            </label>
            <input type="text" name="user" class="form-control" required placeholder="Ej: Gatitos3000">
        </div>

        
        <div class="col">
            <label>
            Numero telefónico:
            </label>
            <input type="tel" name="tel" class="form-control" placeholder="Ej: 7800-0500 " required>
        </div>
        </div>

        <div class="form-group  mb-2 row">
        <div class="col">
            <label>
            Pregunta de seguridad:
            </label>
            <input type="text" list="pregS" name="pregS" id="Segu" placeholder="Seleccionar" class="form-control" required><br>
            <datalist id="pregS">
            <option value="¿Como se llama la calle donde creciste?"></option>
            <option value="¿Como se llama tu país favorito?"></option>
            <option value="¿Como se conocieron tus padres?"></option>
            <option value="¿Cual era tu apodo de la infancia?"></option>
            <option value="¿A que país te gustaria viajar?"></option>

            </datalist>
        </div>
        <div class="col">
    
            <label>Tu respuesta: </label><br>
            <input type="text" name="respS" placeholder="**" required class="form-control">
        </div>
        </div>

        <div class="form-group  mb-2 row">
        <div class="col">
                <label>Contraseña:</label><br>
            <input type="password" name="pass" class="form-control" placeholder="****" required><br>
        </div>

        <div class="col">
    
            <label> Código especial:</label><br>
            <input type="text" name="espe" class="form-control" placeholder="123" required><br>
        </div>
        </div>


        <div class="form-group  mb-2 row">
        <div class="col">
            <label>
                fecha Nacimiento:
            </label>
            <input type="date" class="form-control" name="fn" required/>
        </div>


        <div class="col">
            <label>
                Correo:
            </label>
            <input type="email" class="form-control" name="email" required />
        </div>
        </div>
        
        <div class="form-group mb-2">            

            <input type="submit" class="btn btn-primary mb-2" name="accion" value="Agregar" required />
        </div>

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