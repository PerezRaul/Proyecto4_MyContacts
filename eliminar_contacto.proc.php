<?php
	session_start();

	if(isset($_SESSION['username'])){
		include('conexion.php');

		$sql_eliminar = "DELETE tbl_contacto, tbl_mapa FROM tbl_contacto LEFT JOIN tbl_mapa ON tbl_contacto.con_id=tbl_mapa.con_id WHERE tbl_contacto.con_id=$_REQUEST[con_id]";

		$datos_eliminar = mysqli_query($con,$sql_eliminar);

		if(mysqli_affected_rows($con) == 0){
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