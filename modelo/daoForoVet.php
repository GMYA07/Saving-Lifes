<?php
	include("conexForo.php");
	
	if(isset($_POST["submit"])){
		if(!empty($_POST['mensaje'])){
			$autor=$_POST['autor'];
			$titulo=$_POST['titulo'];
			$mensaje=$_POST['mensaje'];
			$respuestas=$_POST['respuestas'];
			$identificador=$_POST['identificador'];
			$fecha = date("Y/m/d");
			
			
			//Evitamos que el usuario ingrese HTML
			$mensaje = htmlentities($mensaje);
			echo "identificador:";
			echo $identificador;
			
			//Grabamos el mensaje en la base de datos.
			$query = "INSERT INTO forov (autor, titulo, mensaje, identificador, fecha, ult_respuesta) VALUES ('$autor', '$titulo', '$mensaje', '$identificador','$fecha','$fecha')";
			
			echo $query;
			echo "identificador:";
			echo $identificador;
			$result = $mysqli->query($query);
			
			/* si es un mensaje en respuesta a otro actualizamos los datos */
			if ($identificador != 0)
			{		
				$id2=$_GET['id'];	
				$cadena=$id2;
				$cadena= substr($cadena, -1); 		
				if($cadena==0 || $cadena==2){
					$cadena=$id3;
					$query2 = "UPDATE forov SET respuestas=respuestas+1 WHERE ID='$identificador'";
				$result2 = $mysqli->query($query2);
				echo $query2;
				Header("Location: ../vista/vistaForoVet.php?id=$identificador&id2=$id3"); 
				exit();
				}elseif($cadena==1 || $cadena==2){ 
					$cadena=$id3;
					$query2 = "UPDATE forov SET respuestas=respuestas+1 WHERE ID='$identificador'";
				$result2 = $mysqli->query($query2);
				echo $query2;
				Header("Location: ../vista/vistaForoVet.php?id=$identificador&id2=$id3"); 
				exit();
				}
				

				
			}
			$id2=$_GET['id'];
			$cadena=$id2;
			$cadena= substr($cadena, -1); 				
			if($cadena==0 || $cadena==2){
					
					Header("Location: ../indexForoVet.php?id=$id2");
				}elseif($cadena==1 || $cadena==2){
					
					Header("Location: ../indexForoVet.php?id=$id2");
				}
		}
	}
?>