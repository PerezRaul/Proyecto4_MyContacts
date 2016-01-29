<?php
    session_start();

	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar perfil</title>
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

        <!-- EFECTO METRO -->
        <script>            
	        jQuery(document).ready(function() {
	        	var offset = 220;
	          	var duration = 500;
	          	jQuery(window).scroll(function() {
	            	if (jQuery(this).scrollTop() > offset) {
	              		jQuery('.crunchify-top').fadeIn(duration);
	            	} else {
	              		jQuery('.crunchify-top').fadeOut(duration);
	            	}
	          	});
	       
	          	jQuery('.crunchify-top').click(function(event) {
	            	event.preventDefault();
	            	jQuery('html, body').animate({scrollTop: 0}, duration);
	            	return false;
	          	})
	        });
	    </script>
    </head>
    <body cz-shorcut-listen="true">
        <?php
            if(isset($_SESSION['username'])){
                include('conexion.php');

                $sql_usuario = "SELECT log_username FROM tbl_login WHERE log_id=$_SESSION[id]";
                $datos_usuario = mysqli_query($con, $sql_usuario);
                $usuario = mysqli_fetch_array($datos_usuario);
        ?>
        	<div id="cont">
                <header id="cab">
                        <a href="principal.php"><img src="img/logo.png" width="50px" height="55px" />
                        <h1 id="my" style="display: inline;">MyContacts</h1></a>
                        <?php
                            echo "<a id='modificarPerfil' href='modificar_usuario.php?usu_id=$_SESSION[id]'>Modificar perfil</a>";
                        ?>
                        <a href="principal.php" id="misContactos">Mis contactos</a>
                        <?php
                            echo "<b>".$usuario['log_username']."</b>";
                        ?>
                        <a href="logout.php">Logout</a>
                    </header>
                <section id="sec">
                    <article id="art5">
    					<header>
    					    <h1>Modificar perfil</h1>
    					</header>
        					<form name="agregar" action="cambiar_pass.proc.php" method="post">
        						<input type="text" name="id" value="<?php echo $_REQUEST['usu_id']; ?>">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" maxlength="50" />
                                </div><br />
        						<div>
        				            <?php
        				                if(isset($error)){
        				                    echo $error ."<br /><br />";
        				                }
        				            ?>
        				        </div>
        						<input type="submit" class="btn btn-success" name="crear" value="Crear" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<a href='cambiar_pass?usu_id=$_SESSION[id]'>Cambiar password</a>"; ?>
        					</form>
    				</article>
    			</section><br />
    			<footer id="foot">
                	<b><p>Derechos reservados &copy;2016 - Alejandro Moreno y Raúl Pérez</p></b>
                	<a href="#" class="crunchify-top"><img src ="img/flecha.png" width="70px" height="70px"></a>
                </footer>
    		</div>
        <?php
            }else {
                $_SESSION['error'] = "¡No has iniciado sesión!";
                header("location: index.php");
            }
        ?>
	</body>
</html>