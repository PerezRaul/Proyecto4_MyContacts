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
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="icon" type="image/png" href="img/favicon.png" /> -->
    </head>
    <body>
        <header>
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
        	</form>
        </section>
        <footer>
        	Footer
        </footer>
    </body>
</html>