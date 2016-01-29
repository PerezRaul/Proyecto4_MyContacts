<?php
	session_start();

	if(isset($_SESSION['username'])){

		include('conexion.php');

		$pass_encriptada = md5($_REQUEST['password']);

		$sql_modificar = "UPDATE tbl_login SET log_password='$pass_encriptada' WHERE log_id=$_REQUEST[id]";

		$usu_id = $_REQUEST['id'];

		$datos_modificar = mysqli_query($con,utf8_decode($sql_modificar));

		if(mysqli_affected_rows($datos_modificar) == 0){
			header("location: cambiar_pass.php?usu_id=$usu_id");
		} else {
			header('location: principal.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>