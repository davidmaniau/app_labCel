<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$dato01 = $_POST['dato1'];
		$dato02 = $_POST['dato2'];
		$dato03 = $_POST['dato3'];

		$telefono = $_POST['telefono'];
		$fecha1 = $_POST['fecha'];   $fecha = date("Y-m-d", strtotime($fecha1) );
		$diez = $_POST['diez'];
		$costo = $_POST['costo'];
		$ciudad_id = $_POST['ciudad_id'];


		//$dato01 = $_POST['tasa_c'];		
		$sql = "INSERT INTO ".$tabla."($dato1,$dato2,$dato3,telefono,fecha,C10,costo,ciudad_id) VALUES ('$dato01','$dato02','$dato03', '$telefono','$fecha','$diez','$costo','$ciudad_id')";
		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>