<?php
	//session_start();

	include('conexion.php');

	$pass_encriptada = md5($_REQUEST['password']);

	$sql_agregar = "INSERT INTO tbl_login (log_username, log_mail, log_password) VALUES ('$_REQUEST[username]', '$_REQUEST[mail]', '$pass_encriptada')";

	$datos_agregar = mysqli_query($con,utf8_decode($sql_agregar));

	if(mysqli_affected_rows($datos_agregar) == 0){
		//$_SESSION['error'] = "¡No se ha podido crear el usuario!";
		header("location: agregar_usuario.php");
	} else {
		//$_SESSION['error'] = "¡Usuario creado correctamente!";
		header('location: index.php');
	}

	mysqli_close($con);
?>