<?php
	session_start();

	if(isset($_SESSION['username'])){

		include('conexion.php');

		$sql_modificar = "UPDATE tbl_login SET log_username='$_REQUEST[username]', log_mail='$_REQUEST[mail]' WHERE log_id=$_REQUEST[id]";

		$usu_id = $_REQUEST['id'];

		$datos_modificar = mysqli_query($con,utf8_decode($sql_modificar));

		if(mysqli_affected_rows($con) == 0){
			header("location: modificar_usuario.php?usu_id=$usu_id");
		} else {
			header('location: principal.php');
		}

		mysqli_close($con);
	} else {
		$_SESSION['error'] = "¡No has iniciado sesión!";
		header('location: index.php');
	}
?>