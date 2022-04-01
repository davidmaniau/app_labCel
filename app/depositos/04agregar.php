<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$dato01 = $_POST['usuarios_id'];
		$fecha1 = $_POST['fecha'];
		$dato02 = date("Y-m-d", strtotime($fecha1) );
		$dato03 = $_POST['nombre'];
		$dato04 = $_POST['banco'];
		$dato05 = $_POST['numero_cuenta'];
		$dato06 = $_POST['monto'];
		$dato07 = $_POST['detalle'];

			
		$sql = "INSERT INTO ".$tabla."(usuarios_id,fecha,nombre,banco,numero_cuenta,monto,detalle)
		VALUES ('$dato01','$dato02','$dato03','$dato04','$dato05','$dato06','$dato07')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>
