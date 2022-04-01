<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$dato01 = $_POST['descripcion'];
		$dato02 = $_POST['costo1'];
		$dato03 = $_POST['costo2'];
			
		$sql = "INSERT INTO ".$tabla."(descripcion,costo1,costo2)
		VALUES ('$dato01','$dato02','$dato03')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>
