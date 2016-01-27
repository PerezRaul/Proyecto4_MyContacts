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
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="img/favicon.png" />

        <!-- JQUERY -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- VALIDATION -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"></link>
        <script type="text/javascript" src="js/bootstrapValidator.js"></script>
          
        <!-- FONTAWESOME ICONS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    </head>
    <body cz-shorcut-listen="true">
        <div id="cont">
            <header id="cab">
                <img src="img/logo.png" width="50px" height="55px" />
                <h1 id="my">MyContacts</h1>
            </header>
            <section id="sec">
                <article id="art">
                    <header>
                        <h1> Iniciar Sesión </h1>
                    </header>
                	<form name="form" action="login.proc.php" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="username" maxlength="25" placeholder="Username" class="form-control" />
                        </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" name="pwd" maxlength="50" placeholder="Password" class="form-control" />
                        </div><br />
                        <div style="color:red;">
                            <?php
                                if(isset($error)){
                                    echo $error ."<br /><br />";
                                }
                            ?>
                        </div>
                		<input type="submit" class="btn btn-default" name="entrar" value="Entrar" />
                	</form><br />
                    <p>¿Todavía no eres miembro? <a href="agregar_usuario.php">¡Haz clic aquí!</a></p>
                </article>
            </section>
            <footer id="foot">
            	<p>Derechos reservados &copy;2016 - Alejandro Moreno y Raúl Pérez</p>
            </footer>
        </div>
    </body>
</html>