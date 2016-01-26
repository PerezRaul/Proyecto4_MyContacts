<?php 
	session_start();
	
	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Añadir contacto</title>
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
				    <h1>Añadir contacto</h1>
				</header>
				<form name="agregar" action="agregar_contacto.proc.php" method="post">
					Nombre del contacto: <input type="text" name="nombre" /><br /><br />
					Apellidos del contacto: <input type="text" name="apellidos" /><br /><br />
					Mail del contacto: <input type="text" name="mail" /><br /><br />
					Dirección del contacto: <input type="text" name="direccion" /><br /><br />
					Teléfono fijo del contacto: <input type="text" name="telf_fijo" /><br /><br />
					Teléfono móvil del contacto: <input type="text" name="telf_mvl" /><br /><br />
					<div>
			            <?php
			                if(isset($error)){
			                    echo $error ."<br /><br />";
			                }
			            ?>
			        </div>
					<input type="submit" name="anadir" value="Añadir" />
				</form>
		<?php
			} else {
				$_SESSION['error'] = "¡No has iniciado sesión!";
				header('location: index.php');
			}
		?>
	</body>
</html>