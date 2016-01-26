<?php
	session_start();

	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}

	session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar Sesión</title>
        <meta lang="es">
        <meta charset="utf-8">
        <meta name="author" content="Raúl">
        <!-- <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">-->
        <link rel="icon" type="image/png" href="img/favicon.png" /> 
    </head>
    <body>
        <header>
            <img src="img/logo.png" width="50px" height="55px" />
        	<h1> Iniciar Sesión </h1>
        </header>
        <section>
        	<form name="form" action="login.proc.php" method="post">
        		Username: <input type="text" name="username" maxlength="25" /><br/><br/>
        		Password: <input type="password" name="pwd" maxlength="50" /><br/><br/>
                <div>
                    <?php
                        if(isset($error)){
                            echo $error ."<br /><br />";
                        }
                    ?>
                </div>
        		<input type="submit" name="entrar" value="Entrar" />
        	</form><br />
            ¿Todavía no eres miembro? <a href="agregar_usuario.php">¡Haz clic aquí!</a><br /><br />
        </section>
        <footer>
        	Footer
        </footer>
    </body>
</html>