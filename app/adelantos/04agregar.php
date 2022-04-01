<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

		$fecha1 = $_POST['fecha'];
		$fecha = date("Y-m-d", strtotime($fecha1) );

		$usuario_id = $_POST['usuario_id'];
		$monto = $_POST['monto'];



		//$dato01 = $_POST['tasa_c'];
		$sql = "INSERT INTO ".$tabla."(fecha,usuario_id,monto) VALUES ('$fecha','$usuario_id','$monto')";
		if($conn->query($sql)){
			$_SESSION['success'] = ' añadido satisfactoriamente';

	// if($adelanto>0){
	// 		$sql5x = "SELECT max(id) as maximo_id FROM facturas";
	// 		$query5x = $conn->query($sql5x);
	// 		$row5x = $query5x->fetch_assoc();
	// 		$id_fac = $row5x['maximo_id'];


	// 		$sql = "INSERT INTO facturas_abonos(factura_id,fecha,abono) VALUES ('$id_fac',NOW(),'$adelanto')";
	// 				if($conn->query($sql)){
	// 					$_SESSION['success'] = ' añadido satisfactoriamente';

	// 					}
	// 				else{ $_SESSION['error'] = $conn->error; }

		//}




		}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>