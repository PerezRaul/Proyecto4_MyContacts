<?php
	session_start();

	if(isset($_SESSION['username'])){
		include('conexion.php');

		$sql_eliminar = "DELETE FROM tbl_contacto WHERE con_id=$_REQUEST[con_id];";

		$datos_eliminar = mysqli_query($con,utf8_decode($sql_eliminar));

		if(mysqli_affected_rows($datos_eliminar) == 0){
			$_SESSION['error'] = "¡No se ha podido eliminar el contacto!";
			header("location: principal.php");
		} else {
			header('location: principal.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>