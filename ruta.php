<?php 
	session_start();

	if(isset($_SESSION['error'])){
		$error=$_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>
    <head>
    	<style type="text/css">
      #map {
        height: 500px;
        width: 500px;
        border: 1px solid #D2D2D2;
        
        
      }
    </style>
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
    </head>
    <body cz-shorcut-listen="true"> 
 <!--     	<?php
		    if(isset($_SESSION['username'])){
		    	include('conexion.php');

				$sql_usuario = "SELECT log_username FROM tbl_login WHERE log_id=$_REQUEST[map_id]";
				$datos_usuario = mysqli_query($con, $sql_usuario);
				$usuario = mysqli_fetch_array($datos_usuario);

		?>  -->
		        <div id="cont">
		            <header id="cab">
		                <a href="principal.php"><img src="img/logo.png" width="50px" height="55px" />
		                <h1 id="my" style="display: inline;">MyContacts</h1></a>
		                 <?php
		                	echo "<a id='modificarPerfil' href='modificar_usuario.php?usu_id=$_SESSION[id]'>Modificar perfil</a>";
		                ?> 
		                <a href="principal.php" id="misContactos">Mis contactos</a>
		                 <?php
		                	echo $usuario['log_username'];
		                ?> 
		            </header>
		            <section id="sec">
                		<article id="art2">
							<header style="margin-top: 20px;">
					           <div id="map"></div>
    <script>
    function localizar() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initMap);

        } else { 
            alert("Geolocation is not supported by this browser.");
        }
    };
    function initMap(position) {
      alert(position.coords.latitude);
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {lat: position.coords.latitude, lng: position.coords.longitude}
  });
  directionsDisplay.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsDisplay, position.coords.latitude, position.coords.longitude);
  document.getElementById('mode').addEventListener('change', function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay, position.coords.latitude, position.coords.longitude);
  });
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, latitude, longitude) {
  alert(latitude);
  alert(longitude); 
  var selectedMode = document.getElementById('mode').value;
  directionsService.route({
    origin: {lat: latitude, lng: longitude},  // Haight.
    destination: {lat: 41.3520453, lng: 2.1087691000000177},  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhXaF13fF5Exi4nzqVZ_PD1q9bO_O8Y_M&callback=localizar">
    </script>
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