<?php
	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Añadir usuario</title>
        <meta lang="es">
        <meta charset="utf-8">
        <meta name="author" content="Raúl">
        <!-- <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">-->
        <link rel="icon" type="image/png" href="img/favicon.png" /> 
    </head>
    <body>
		<header>
		    <h1>Creación de usuario</h1>
		</header>
		<form name="agregar" action="agregar_usuario.proc.php" method="post">
			Username: <input type="text" name="username" /><br /><br />
			E-mail: <input type="text" name="mail" /><br /><br />
			Password: <input type="password" name="password" /><br /><br />
			<div>
	            <?php
	                if(isset($error)){
	                    echo $error ."<br /><br />";
	                }
	            ?>
	        </div>
			<input type="submit" name="crear" value="Crear" />
		</form>
	</body>
</html>