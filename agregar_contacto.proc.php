<?php
	session_start();

	if(isset($_SESSION['username'])){
		
		include('conexion.php');

		$id_usuario = $_SESSION['id'];

		$sql_agregar = "INSERT INTO tbl_contacto (con_nombre, con_apellidos, con_mail, con_telefono_fijo, con_telefono_movil, log_id) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[mail]', '$_REQUEST[telf_fijo]', '$_REQUEST[telf_mvl]', $id_usuario)";

		$datos_agregar = mysqli_query($con,utf8_decode($sql_agregar));

		$ultimoCont = mysqli_insert_id($con);

		$direccion = mysqli_real_escape_string($con, $_REQUEST['direccion']);

		$sql_agregar_mapa = "INSERT INTO tbl_mapa (map_longitud, map_latitud, map_direccion, con_id) VALUES ('$_REQUEST[longitud]', '$_REQUEST[latitud]', '$direccion' , $ultimoCont)";

		$datos_mapa = mysqli_query($con, $sql_agregar_mapa);

		if(mysqli_affected_rows($con) == 0){
			header("location: agregar_contacto.php");
		} else {
			header('location: principal.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>