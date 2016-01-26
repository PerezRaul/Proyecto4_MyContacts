<?php
	session_start();

	if(isset($_SESSION['username'])){
		
		include('conexion.php');

		$id_usuario = $_SESSION['id'];

		$sql_agregar = "INSERT INTO tbl_contacto (con_nombre, con_apellidos, con_mail, con_direccion, con_telefono_fijo, con_telefono_movil, log_id) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[mail]', '$_REQUEST[direccion]', '$_REQUEST[telf_fijo]', '$_REQUEST[telf_mvl]', $id_usuario);";

		$datos_agregar = mysqli_query($con,utf8_decode($sql_agregar));

		if(mysqli_affected_rows($datos_agregar) == 0){
			$_SESSION['error'] = "¡No se ha podido añadir el contacto!";
			header("location: agregar_contacto.php");
		} else {
			header('location: agregar_contacto.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>