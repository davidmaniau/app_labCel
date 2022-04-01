<?php
	include '../include/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	
       if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];	

		$gasto_tipo_id = $_POST['gasto_tipo_id'];
		// $fecha = $_POST['fecha'];
		// $fecha2 = date("Y-m-d H:i:s", strtotime($fecha) );

		$fecha1 = $_POST['fecha'];
		$fecha = date("Y-m-d", strtotime($fecha1) );

		$proveedor_id = $_POST['proveedor_id'];
		$descripcion_gasto = $_POST['descripcion_gasto'];
		$monto = $_POST['monto'];


		$sql = "UPDATE ".$tabla." SET gasto_tipo_id = '$gasto_tipo_id', fecha = '$fecha',
        proveedor_id = '$proveedor_id', descripcion_gasto = '$descripcion_gasto', monto = '$monto'
		WHERE id = '$empid'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'actualizado con éxito ';//.$modulo;//.$sql;
		}
		else{
			$_SESSION['error'] = $conn->error;//.$sql;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccionar  para editar primero';
	}	
	header('location: '.$modulo);
?>
