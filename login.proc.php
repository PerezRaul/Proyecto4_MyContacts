<?php
	session_start();

	include('conexion.php');

	$pwd_encript = md5($_REQUEST['pwd']);

	$sql_login = "SELECT * FROM tbl_login WHERE log_username='$_REQUEST[username]' AND log_password='$pwd_encript'";

	$res = mysqli_query($con, $sql_login);

	if(mysqli_num_rows($res) == 1){
		$datos_login = mysqli_fetch_array($res);

		$_SESSION['id'] = $datos_login['log_id'];
		$_SESSION['username'] = $_REQUEST['username'];
		$_SESSION['mail'] = $datos_login['log_mail'];

		header('location: principal.php');


	} else {
		$_SESSION['error'] = 'Usuario y/o contraseña incorrectos';
		header('location: index.php');
	}

?>