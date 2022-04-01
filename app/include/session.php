<?php
session_start();
include 'conexion.php';

if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
	header('location:/pixelsasistencias/index.php');   }

	$sqln2 = "SELECT * FROM usuarios WHERE id = '".$_SESSION['admin']."'";
	$queryn2 = $conn->query($sqln2);
	$user = $queryn2->fetch_assoc();

	$timezone = 'America/Tegucigalpa';
	date_default_timezone_set($timezone);
	$fecha_y_hora_actual = date("Y-m-d H:i:s");
	$fecha_actual = date("Y-m-d");
	$hora_actual = date("H:i:s");

?>