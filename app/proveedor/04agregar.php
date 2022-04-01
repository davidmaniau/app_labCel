<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$dato01 = $_POST['nombre'];
		$dato02 = $_POST['rtn_dni'];
		$dato03 = $_POST['telefono'];
		$dato04 = $_POST['direccion'];
		$dato05 = $_POST['email'];

			
		$sql = "INSERT INTO ".$tabla."(nombre,rtn_dni,telefono,direccion,email)
		VALUES ('$dato01','$dato02','$dato03','$dato04','$dato05')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>
