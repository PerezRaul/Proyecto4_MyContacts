<?php
	session_start();

	if(isset($_SESSION['username'])){
		include('conexion.php');

		$sql_eliminar = "DELETE tbl_mapa FROM tbl_contacto INNER JOIN tbl_login ON tbl_login.log_id=tbl_contacto.log_id INNER JOIN tbl_mapa ON tbl_contacto.con_id=tbl_mapa.con_id WHERE tbl_login.log_id=$_REQUEST[usu_id]";

		$sql_eliminar2 = "DELETE tbl_contacto FROM tbl_contacto INNER JOIN tbl_login ON tbl_login.log_id=tbl_contacto.log_id WHERE tbl_login.log_id=$_REQUEST[usu_id]";

		$sql_eliminar3 = "DELETE FROM tbl_login WHERE log_id=$_REQUEST[usu_id]";

		$datos_eliminar = mysqli_query($con,$sql_eliminar);

		$datos_eliminar2 = mysqli_query($con,$sql_eliminar2);

		$datos_eliminar3 = mysqli_query($con,$sql_eliminar3);

		if(mysqli_affected_rows($con) == 0){
			header("location: principal.php");
		} else {
			header('location: index.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>