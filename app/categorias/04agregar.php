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

		//$dato01 = $_POST['tasa_c'];		
		$sql = "INSERT INTO ".$tabla."($dato1,$dato2,$dato3) VALUES ('$dato01','$dato02','$dato03')";
		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>