<?php
	include('conexion.php');

	$sql_modificar = "UPDATE tbl_contacto SET con_nombre='$_REQUEST[nombre]', con_apellidos='$_REQUEST[apellidos]', con_mail='$_REQUEST[mail]', con_direccion='$_REQUEST[direccion]', con_telefono_fijo='$_REQUEST[telf_fijo]', con_telefono_movil='$_REQUEST[telf_movil]' WHERE con_id=$_REQUEST[id]";

	$con_id = $_REQUEST['id'];

	$datos_modificar = mysqli_query($con,utf8_decode($sql_modificar));

	if(mysqli_affected_rows($datos_modificar) == 0){
		$_SESSION['error'] = "¡No se ha podido eliminar el contacto!";
		header("location: principal.php");
	} else {

		header('location: principal.php');
	}

	mysqli_close($con);

?>