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

        <style>
	      	html, body {
		        height: 100%;
		        margin: 0;
		        padding: 0;
	      	}
	      	#mapaparasituar {
		        height: 300px;
		        width: 100%;
		        margin-top: 20px;
	      	}
	     	 #map {
		        top: 0;
		        position: ;
		        height: 100%;
		        z-index: 1;
	      	}
	      	#panel {
		        position: absolute;
		        z-index: 2;
		        display: none;
		        top: 83%;
		        margin-bottom: 30px;
		        margin-right: 30px;
		        padding: 10px;
		        left: 30%;
		        background-color: white;
		        width-min: 200px !important;
		        height-min: 100px !important;
	      	}
			.controls {
			  	margin-top: 10px;
			  	border: 1px solid transparent;
			  	border-radius: 2px 0 0 2px;
			  	box-sizing: border-box;
			  	-moz-box-sizing: border-box;
			 	height: 32px;
			  	outline: none;
			  	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			}

			#pac-input {
			  	background-color: #fff;
			  	font-family: Roboto;
			  	font-size: 15px;
			  	font-weight: 300;
			  	margin-left: 12px;
			  	padding: 0 11px 0 13px;
			  	text-overflow: ellipsis;
			  	width: 300px;
			}

			#pac-input:focus {
			  	border-color: #4d90fe;
			}

			.pac-container {
			  	font-family: Roboto;
			}

			#type-selector {
			  	color: #fff;
			  	background-color: #4d90fe;
			  	padding: 5px 11px 0px 11px;
			}

			#type-selector label {
			  	font-family: Roboto;
			  	font-size: 13px;
			  	font-weight: 300;
			}

    	</style>
    </head>
    <body>
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
		                <article id="art3">
		                    <header>
		                        <h1> Añadir contacto </h1>
		                    </header>
							<form name="agregar" action="agregar_contacto.proc.php" method="post">
								<div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" maxlength="25" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" maxlength="35" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
		                            <input type="text" class="form-control" name="mail" placeholder="E-mail" maxlength="50" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
		                            <input type="text" class="form-control" name="telf_fijo" placeholder="Teléfono fijo" maxlength="9" />
		                        </div><br />
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="fa fa-mobile fa-lg"></i></span>
		                            <input type="text" class="form-control" name="telf_mvl" placeholder="Teléfono móvil" maxlength="9" />
		                        </div><br />
								
								<div id="mapaparasituar">
								    <input id="pac-input" class="controls" type="text"
								        placeholder="Introduce la localización">
								    
								    <div id="panel"></div>

								    <div id="map"></div>
								    <script>

										function initMap() {
										  //echo "hola";
										  var map = new google.maps.Map(document.getElementById('map'), {
										    center: {lat: 41.38506389999999, lng: 2.1734034999999494},
										    zoom: 10
										  });
										  var input = /** @type {!HTMLInputElement} */(
										      document.getElementById('pac-input'));

										  var types = document.getElementById('type-selector');
										  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
										  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

										  var autocomplete = new google.maps.places.Autocomplete(input);
										  autocomplete.bindTo('bounds', map);

										  var infowindow = new google.maps.InfoWindow();
										  var marker = new google.maps.Marker({
										    map: map,
										    anchorPoint: new google.maps.Point(0, -29)
										  });

										  autocomplete.addListener('place_changed', function() {
										    infowindow.close();
										    marker.setVisible(false);
										    var place = autocomplete.getPlace();
										    if (!place.geometry) {
										      window.alert("Autocomplete's returned place contains no geometry");
										      return;
										    }

										    // If the place has a geometry, then present it on a map.
										    if (place.geometry.viewport) {
										      map.fitBounds(place.geometry.viewport);
										    } else {
										      map.setCenter(place.geometry.location);
										      map.setZoom(17);  // Why 17? Because it looks good.
										    }
										    marker.setIcon(/** @type {google.maps.Icon} */({
										      url: place.icon,
										      size: new google.maps.Size(71, 71),
										      origin: new google.maps.Point(0, 0),
										      anchor: new google.maps.Point(17, 34),
										      scaledSize: new google.maps.Size(35, 35)
										    }));
										    marker.setPosition(place.geometry.location);
										    marker.setVisible(true);
										    
										    //var cosa=window.open("mia.php?lat="+place.geometry.location.lat()+"&lon="+place.geometry.location.lng(),"confirmacion","width=100,height=100,menubar=no");
										    
										    var address = '';
										    if (place.address_components) {
										      address = [
										         (place.address_components[0] && place.address_components[0].short_name || '')
										        // (place.address_components[1] && place.address_components[1].short_name || ''),
										        // (place.address_components[2] && place.address_components[2].short_name || ''),
										        // (place.address_components[2] && place.address_components[2].short_name || ''),
										        // (place.address_components[2] && place.address_components[2].short_name || ''),
										      ].join(' ');
										       //onload=window.alert ("lat="+place.geometry.location.lat()+"<br>lon="+place.geometry.location.lng())
										       var latitud = place.geometry.location.lat();
										       var longitud = place.geometry.location.lng();
										       //var direccion = direccion.formatted_address;
										       var localizacion = '<input name="latitud" value="'+latitud+'" readonly /><input name="longitud" value="'+longitud+'" readonly /><input name="direccion" value="'+place.formatted_address+'" readonly />';
										         //dirección=<input value='"+place.address_components[1].long_name+", "+place.address_components[0].long_name+", "+place.address_components[2].long_name+"' readonly />";
										       document.getElementById("panel").innerHTML = localizacion;
										       //document.getElementById("panel").style.display = "inline";
										    }

										    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
										    infowindow.open(map, marker);

										  });

										  // Sets a listener on a radio button to change the filter type on Places
										  // Autocomplete.
										  function setupClickListener(id, types) {
										    var radioButton = document.getElementById(id);
										    radioButton.addEventListener('click', function() {
										      autocomplete.setTypes(types);
										      // var latitud = place.geometry.location.lat();
										      //  var longitud = place.geometry.location.lng();
										      //  var direccion = place.address_components[1].long_name+" "+place.address_components[0].long_name+", "+place.address_components[2].long_name+", "+place.address_components[3].long_name+", "+place.address_components[4].long_name+", "+place.address_components[5].long_name;
										      //  var localizacion = "latitud=<input value='"+latitud+"' readonly /><br/><br/>longitud=<input value='"+longitud+"' readonly />";
										      // document.getElementById("panel").innerHTML = localizacion;
										      // document.getElementById("panel").style.display = "inline";
										    });
										  }

										  setupClickListener('changetype-all', []);
										  setupClickListener('changetype-address', ['address']);
										  setupClickListener('changetype-establishment', ['establishment']);
										 
										  //window.alert ("lat="+place.geometry.location.lat()+"<br>lon="+place.geometry.location.lng())
										  //var latitud = place.geometry.location.lat();
										  //var longitud = place.geometry.location.lng();
										  //document.getElementById("panel").innerHTML = latitud;
										  // var latitud = place.geometry.location.lat();
										  //      var longitud = place.geometry.location.lng();
										  //      //var direccion = place.address_components[1].long_name+" "+place.address_components[0].long_name+", "+place.address_components[2].long_name+", "+place.address_components[3].long_name+", "+place.address_components[4].long_name+", "+place.address_components[5].long_name;
										  //      var localizacion = place;
										  //      //var localizacion = "latitud=<input value='"+latitud+"' readonly /><br/><br/>longitud=<input value='"+longitud+"' readonly />";
										      document.getElementById("panel").innerHTML = place.geometry.location.lng();
										      //document.getElementById("panel").style.display = "inline";
										}
								    </script>
								    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC__AIH1JoDnULPGkVqYRsPFDavL-aoQO8&signed_in=true&libraries=places&callback=initMap"
								        async defer></script>
					  			</div><br />
								<div>
						            <?php
						                if(isset($error)){	
						                	if($error != ''){
						                    	echo $error ."<br /><br />";
						                	}
						                }
						            ?>
						        </div><br />
								<input type="submit" class="btn btn-success" name="anadir" value="Añadir" />
							</form>
						</article>
					</section><br />
					<footer id="foot">
		            	<b><p>Derechos reservados &copy;2016 - Alejandro Moreno y Raúl Pérez</p></b>
		            	<a href="#" class="crunchify-top"><img src ="img/flecha.png" width="70px" height="70px"></a>
		            </footer>
				</div>
		<?php
			} else {
				$_SESSION['error'] = "¡No has iniciado sesión!";
				header('location: index.php');
			}
		?>
	</body>
</html>