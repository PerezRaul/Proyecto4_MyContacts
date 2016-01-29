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
        <?php
		    if(isset($_SESSION['username'])){
		    	include('conexion.php');

				$sql_usuario = "SELECT log_username FROM tbl_login WHERE log_id=$_SESSION[id]";
				$datos_usuario = mysqli_query($con, $sql_usuario);
				$usuario = mysqli_fetch_array($datos_usuario);
		?>
		        <div id="cont">
		            <header id="cab">
		                <img src="img/logo.png" width="50px" height="55px" />
		                <h1 id="my">MyContacts</h1>
		            </header>
		            <section id="sec">
		                <article id="art3">
		                    <header>
		                        <h1> Modificar contacto </h1>
		                    </header>
    	<?php
		    	include('conexion.php');
		    	$sql_mod_cont = "SELECT * FROM tbl_contacto WHERE con_id=$_REQUEST[con_id]";
		    	$datos_mod_cont = mysqli_query($con, $sql_mod_cont);

				if(mysqli_num_rows($datos_mod_cont) > 0){
					$modificar = mysqli_fetch_array($datos_mod_cont);
		?>
							<form name="modificar" action="modificar_contacto.proc.php" method="post">
								<input type="hidden" name="id" value="<?php echo $modificar['con_id']; ?>" /><br />
								<div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" maxlength="25" value="<?php echo utf8_encode($modificar['con_nombre']); ?>" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" maxlength="35" value="<?php echo utf8_encode($modificar['con_apellidos']); ?>" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
		                            <input type="text" class="form-control" name="mail" placeholder="E-mail" maxlength="50" value="<?php echo $modificar['con_mail']; ?>" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
		                            <input type="text" class="form-control" name="telf_fijo" placeholder="Teléfono fijo" maxlength="9" value="<?php echo $modificar['con_telefono_fijo']; ?>" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-mobile fa-lg"></i></span>
		                            <input type="text" class="form-control" name="telf_movil" placeholder="Teléfono móvil" maxlength="9" value="<?php echo $modificar['con_telefono_movil']; ?>" />
		                        </div><br />
								<div>
				                    <?php
				                        if(isset($error)){
				                            echo $error ."<br /><br />";
				                        }
				                    ?>
				                </div>
								<input type="submit" class="btn btn-success" name="guardar" value="Guardar" />
							</form>
						</article>
					</section><br />
					<footer id="foot">
		            	<b><p>Derechos reservados &copy;2016 - Alejandro Moreno y Raúl Pérez</p></b>
		            	<a href="#" class="crunchify-top"><img src ="img/flecha.png" width="70px" height="70px"></a>
		            </footer>
				</div>
		<?php
				}
			} else {
				$_SESSION['error'] = "¡No has iniciado sesión!";
				header('location: index.php');
			}
		?>
	</body>
</html>