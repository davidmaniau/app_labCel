<?php
include '../include/session.php';

if(isset($_POST['edit'])){
	$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

	$fecha1 = $_POST['fecha'];
	$fecha = date("Y-m-d", strtotime($fecha1) );
	$usuario_id = $_POST['usuario_id'];
	$monto = $_POST['monto'];




	$sql = "UPDATE ".$tabla." SET fecha = '$fecha',
	usuario_id = '$usuario_id',
	monto = '$monto'
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