<?php
	session_start();

	if(isset($_SESSION['username'])){

		include('conexion.php');

		$sql_modificar = "UPDATE tbl_contacto SET con_nombre='$_REQUEST[nombre]', con_apellidos='$_REQUEST[apellidos]', con_mail='$_REQUEST[mail]', con_telefono_fijo='$_REQUEST[telf_fijo]', con_telefono_movil='$_REQUEST[telf_movil]' WHERE con_id=$_REQUEST[id]";

		$con_id = $_REQUEST['id'];

		$datos_modificar = mysqli_query($con,utf8_decode($sql_modificar));

		if(mysqli_affected_rows($datos_modificar) == 0){
			$_SESSION['error'] = "¡No se ha podido modificar el contacto!";
			header("location: modificar_contacto.php?con_id=$con_id");
		} else {
			header('location: modificar_contacto.php?con_id=$con_id');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>