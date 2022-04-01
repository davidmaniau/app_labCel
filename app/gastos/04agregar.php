<?php
	include '../include/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$dato01 = $_POST['gasto_tipo_id'];
		// $dato02 = $_POST['fecha'];
		// 	$fecha = date("Y-m-d H:i:s", strtotime($dato02) );

		$fecha1 = $_POST['fecha'];
		$dato02 = date("Y-m-d", strtotime($fecha1) );

		$dato03 = $_POST['proveedor_id'];
		$dato04 = $_POST['descripcion_gasto'];
		$dato05 = $_POST['monto'];

			
		$sql = "INSERT INTO ".$tabla."(gasto_tipo_id,fecha,proveedor_id,descripcion_gasto,monto)
		VALUES ('$dato01','$dato02','$dato03','$dato04','$dato05')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';//.$sql;

			}

		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>
