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
		?>
		        <div id="cont">
		            <header id="cab">
		                <img src="img/logo.png" width="50px" height="55px" />
		                <h1 id="my" style="display: inline;">MyContacts</h1>
		                <?php
		                	echo "<a id='modificarPerfil' href='modificar_usuario.php?usu_id=$_SESSION[id]'>Modificar perfil</a>";
		                ?>
		            </header>
		            <section id="sec">
                		<article id="art2">
							<header style="margin-top: 20px;">
					        	<h1 style="display:inline;">Agenda de contactos</h1>
					        	<a href="agregar_contacto.php"><i class="fa fa-plus-circle fa-3x" style="color:green;"></i></a>
					        </header><br />
		<?php
				include('conexion.php');

				$sql_contactos = "SELECT * FROM tbl_contacto WHERE log_id=$_SESSION[id]";
				$datos_contactos = mysqli_query($con, $sql_contactos);

				if(mysqli_num_rows($datos_contactos) > 0){
					while($contacto = mysqli_fetch_array($datos_contactos)){
						echo "<div id='mostrarContactosDiv'><br /><b>Nombre completo: </b>".utf8_encode($contacto['con_nombre']);
						echo " ".utf8_encode($contacto['con_apellidos'])."<br />";
						echo "<b>E-mail:</b> ".$contacto['con_mail']."<br />";
						echo "<b>Teléfono fijo:</b> ".$contacto['con_telefono_fijo']."<br />";
						echo "<b>Teléfono móvil:</b> ".$contacto['con_telefono_movil']."<br /><br />";
						echo "<a href='modificar_contacto.php?con_id=$contacto[con_id]' class='btn btn-default'><i class='fa fa-pencil-square-o fa-lg'></i> Modificar</a> <a href='eliminar_contacto.proc.php?con_id=$contacto[con_id]' class='btn btn-danger'><i class='fa fa-times fa-lg'></i> Eliminar</a><br /><br /></div><br />";
					}

				} else {
					echo "En este momento no tienes ningún contacto. ¡Empieza a añadir a tus contactos!";
				}
		?>
						</article>
					</section>
					<footer id="foot">
						<p>Derechos reservados &copy;2016 - Alejandro Moreno y Raúl Pérez</p>
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