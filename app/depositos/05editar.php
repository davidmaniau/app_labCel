<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$usuarios_id = $_POST['usuarios_id'];
		$fecha1 = $_POST['fecha'];
		$fecha = date("Y-m-d", strtotime($fecha1) );
		$nombre = $_POST['nombre'];
		$banco = $_POST['banco'];
		$numero_cuenta = $_POST['numero_cuenta'];
		$monto = $_POST['monto'];
		$detalle = $_POST['detalle'];

			
		$sql = "UPDATE ".$tabla." SET usuarios_id='$usuarios_id', fecha='$fecha', nombre='$nombre',
		banco='$banco', numero_cuenta='$numero_cuenta', monto='$monto',detalle='$detalle'
		WHERE id = '$empid'";
		

		if($conn->query($sql)){
			$_SESSION['success'] = 'actualizado con éxito ';
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