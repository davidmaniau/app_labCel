<?php
session_start();

include 'conexion.php';

$timezone = 'America/Tegucigalpa';
date_default_timezone_set($timezone);
$fecha_y_hora_actual = date("Y-m-d H:i:s");
$hora_actual = date("H:i:s");
$fecha_actual = date("Y-m-d");



if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM usuarios WHERE username = '$username'";
	$query = $conn->query($sql);

	if($query->num_rows < 1){
		$_SESSION['error'] = 'el nombre de usuario no esta vinculada a ninguna cuenta';
	}
	else{
		$row = $query->fetch_assoc();
		if(password_verify($password, $row['password'])){
			$_SESSION['admin'] = $row['id'];
 				//header('location:../index.php');
		}
		else{
			$_SESSION['error'] = 'Nombre de usuario o contraseña incorrectos por favor verificar de nuevo !!!';
				// header('location: ../index.php');
		}
	}
}
else{
	$_SESSION['error'] = 'introduce las credeciales primero';
}

header('location: ../acceder.php');


?>