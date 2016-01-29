<?php 
	session_start();

	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
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

	    <style type="text/css">
	      #map {
	        height: 480px;
	        width: 550px;
	        margin-top: 85px;
	        margin-left: 640px;
	        border: 1px solid #D2D2D2;
	        position: fixed !important;
	        overflow: hidden;
	      }
	    </style>

    </head>
    <body cz-shorcut-listen="true">
    	<?php
		    if(isset($_SESSION['username'])){
		    	include('conexion.php');

				$sql_usuario = "SELECT log_username FROM tbl_login WHERE log_id=$_SESSION[id]";
				$datos_usuario = mysqli_query($con, $sql_usuario);
				$usuario = mysqli_fetch_array($datos_usuario);

		?>
		<div id="map"></div> 
    <script type="text/javascript">
        var map;
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 41.3495464, lng: 2.1076887},
            //mapTypeId: google.maps.MapTypeId.SATELLITE,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            zoom: 11
          });
          cargaContenido();
        }

        var READY_STATE_UNINITIALIZED=0;
        var READY_STATE_LOADING=1;
        var READY_STATE_LOADED=2;
        var READY_STATE_INTERACTIVE=3;
        var READY_STATE_COMPLETE=4;

        var peticion_http,datosCargados;

        function inicializa_xhr() {
          if(window.XMLHttpRequest) {
            return new XMLHttpRequest();
          }
          else if(window.ActiveXObject) {
            return new ActiveXObject("Microsoft.XMLHTTP");
          }
        }

        function cargaContenido() {
          peticion_http = inicializa_xhr();
          if(peticion_http) {
            peticion_http.onreadystatechange = muestraContenido;
            peticion_http.open("GET", "mapacontacts.php", true);
            peticion_http.send(null);
          }
        }

        function muestraContenido() {
          if(peticion_http.readyState == READY_STATE_COMPLETE) {
            if(peticion_http.status == 200) {
              ///creamos los markers
              datosCargados=eval('('+peticion_http.responseText+')');
              for(var i=0;i<datosCargados.contacto.length;i++){
                var myLatLng = {lat: datosCargados.contacto[i].posicion.lat, lng: datosCargados.contacto[i].posicion.lng};
                var marker = new google.maps.Marker({
                  map: map,
                  position: myLatLng,
                  opacity:1,
                  animation:google.maps.Animation.DROP,  //DROP, BOUNCE
                  title: datosCargados.contacto[i].nombre
                });
                var contentString;
                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(marker,'click', (function(marker,i) {
                  return function() {
                    contentString = '<div id="content"'+'" alt="'+datosCargados.contacto[i].nombre+'" height="42" width="42"><p>'+datosCargados.contacto[i].nombre+'<br>'+datosCargados.contacto[i].direccion+'</p></div>';
                    infowindow.setContent(contentString);
                    infowindow.open(map, marker);
                  }

                })(marker,i));
              }
            }
          }
        }
        
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhXaF13fF5Exi4nzqVZ_PD1q9bO_O8Y_M&callback=initMap">
    </script>
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
                		<article id="art2">
							<header style="margin-top: 20px;">
					        	<h1 style="display:inline;">Agenda de contactos</h1>
					        	<a href="agregar_contacto.php"><i class="fa fa-plus-circle fa-3x" style="color:green;"></i></a>
					        </header><br />
					        <div>
			                    <?php
			                        if(isset($error)){
			                            echo $error ."<br /><br />";
			                        }
			                    ?>
			                </div>
		<?php
				include('conexion.php');

				$sql_contactos = "SELECT * FROM tbl_contacto LEFT JOIN tbl_mapa ON tbl_contacto.con_id=tbl_mapa.con_id WHERE log_id=$_SESSION[id]";
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