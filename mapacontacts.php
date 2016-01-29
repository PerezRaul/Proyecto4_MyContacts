<?php
	session_start();
 	include('conexion.php');

 	$sql_contactos = "SELECT tbl_mapa.map_id, tbl_mapa.map_longitud, tbl_mapa.map_latitud, tbl_mapa.map_direccion, tbl_contacto.con_nombre FROM tbl_mapa INNER JOIN tbl_contacto ON tbl_mapa.con_id=tbl_contacto.con_id";
 	$datos_contactos = mysqli_query($con, $sql_contactos);
 	if(mysqli_num_rows($datos_contactos) > 0){
  		echo utf8_encode('{"contacto": [');
 		while($contacto = mysqli_fetch_array($datos_contactos)){
   			echo utf8_encode('{"posicion": {"lat": '.($contacto["map_latitud"]).',"lng": '.($contacto["map_longitud"]).'},"direccion": "'.($contacto["map_direccion"]).'","nombre": "'.(utf8_encode($contacto["con_nombre"])).'"},');
  		}  
  		echo utf8_encode(']}');
 	}
?>