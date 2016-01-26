<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contactos</title>
        <meta lang="es">
        <meta charset="utf-8">
        <meta name="author" content="Raúl">
        <!-- <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">-->
        <link rel="icon" type="image/png" href="img/favicon.png" /> 
    </head>
    <body>
    	<?php
		    if(isset($_SESSION['username'])){
		?>
				<header>
		        	<h1>Agenda de contactos</h1>
		        </header>

		        <a href="agregar_contacto.php">Añadir contacto</a><br /><br />
		<?php
				include('conexion.php');

				$sql_contactos = "SELECT * FROM tbl_contacto WHERE log_id=$_SESSION[id]";
				$datos_contactos = mysqli_query($con, $sql_contactos);

				if(mysqli_num_rows($datos_contactos) > 0){
					while($contacto = mysqli_fetch_array($datos_contactos)){
						echo "Nombre del contacto: ".utf8_encode($contacto['con_nombre'])."<br />";
						echo "Apellidos del contacto: ".utf8_encode($contacto['con_apellidos'])."<br />";
						echo "Mail del contacto: ".$contacto['con_mail']."<br />";
						echo "Dirección del contacto: ".utf8_encode($contacto['con_direccion'])."<br />";
						echo "Teléfono fijo del contacto: ".$contacto['con_telefono_fijo']."<br />";
						echo "Teléfono móvil del contacto: ".$contacto['con_telefono_movil']."<br /><br />";
						echo "<a href='modificar_contacto.php?con_id=$contacto[con_id]'>Modificar</a> <a href='eliminar_contacto.proc.php?con_id=$contacto[con_id]'>Eliminar</a><br /><br />";
					}

				} else {
					echo "En este momento no tienes ningún contacto. ¡Empieza a añadir a tus contactos!";
				}


			}else {
				$_SESSION['error'] = "¡No has iniciado sesión!";
				header("location: index.php");
			}
		
		?>
        
    </body>
</html>