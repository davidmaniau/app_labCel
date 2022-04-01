<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$fecha1 = $_POST['fecha'];
		$dato01 = date("Y-m-d", strtotime($fecha1) );
		$dato02 = $_POST['cliente_id'];
		$dato03 = $_POST['vendedor_id'];	
		$dato04 = $_POST['tipo_venta_id'];
		$dato05 = '2';
		$dato06 = $_POST['forma_pago_id'];

		$dato07 = '1';
		$dato08 = '0';

		//$doc;

			
		$sql = "INSERT INTO ".$tabla."(fecha,cliente_id,vendedor_id,venta_tipo_id,tipo_doc_id,forma_pago_id,estado_registro,estado_detalles,no_doc)
		VALUES ('$dato01','$dato02','$dato03','$dato04','$dato05','$dato06','$dato07','$dato08','$doc')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	

$sql17 = "SELECT max(no_doc) as doc from ventas where tipo_doc_id = 2";
$query17 = $conn->query($sql17);
$row17 = $query17->fetch_assoc();
$doc = $row17['doc'];
	
	header('location: ../ventas_detalles_f/01index.php?d='.$doc);
	
?>
