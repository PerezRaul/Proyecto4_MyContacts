<?php 
	session_start();

	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar contacto</title>
        <meta lang="es">
        <meta charset="utf-8">
        <meta name="author" content="Raúl">
        <!-- <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="icon" type="image/png" href="img/favicon.png" /> -->
    </head>
    <body>
    	<?php
		    if(isset($_SESSION['username'])){
		    	include('conexion.php');
		    	$sql_mod_cont = "SELECT * FROM tbl_contacto WHERE con_id=$_REQUEST[con_id]";
		    	$datos_mod_cont = mysqli_query($con, $sql_mod_cont);
		?>
				<header>
		        	<h1>Modificar contacto</h1>
		        </header>
		<?php
				if(mysqli_num_rows($datos_mod_cont) > 0){
					$modificar = mysqli_fetch_array($datos_mod_cont);
		?>
					<form name="modificar" action="modificar_contacto.proc.php" method="post">
						Id del contacto: <input type="text" name="id" value="<?php echo $modificar['con_id']; ?>" /><br /><br />
						Nombre del contacto: <input type="text" name="nombre" value="<?php echo utf8_encode($modificar['con_nombre']); ?>" /><br /><br />
						Apellidos del contacto: <input type="text" name="apellidos" value="<?php echo utf8_encode($modificar['con_apellidos']); ?>" /><br /><br />
						E-mail del contacto: <input type="text" name="mail" value="<?php echo $modificar['con_mail']; ?>" /><br /><br />
						Dirección del contacto: <input type="text" name="direccion" value="<?php echo utf8_encode($modificar['con_direccion']); ?>" /><br /><br />
						Teléfono fijo del contacto: <input type="text" name="telf_fijo" value="<?php echo $modificar['con_telefono_fijo']; ?>" /><br /><br />
						Teléfono móvil del contacto: <input type="text" name="telf_movil" value="<?php echo $modificar['con_telefono_movil']; ?>" /><br /><br />
						<div>
		                    <?php
		                        if(isset($error)){
		                            echo $error ."<br /><br />";
		                        }
		                    ?>
		                </div>
						<input type="submit" name="guardar" value="Guardar" />
					</form>
		<?php
				}
			} else {
				$_SESSION['error'] = "¡No has iniciado sesión!";
				header('location: index.php');
			}
		?>
	</body>
</html>