<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$dias = $_POST['dias'];
		$hora_inicio = $_POST['time_in'];
		$hora_inicio = date('H:i:s', strtotime($hora_inicio));
		$hora_final = $_POST['time_fi'];
		$hora_final = date('H:i:s', strtotime($hora_final));
		
		$sql = "UPDATE ".$tabla." SET dias = '$dias', hora_inicio = '$hora_inicio', hora_final = '$hora_final'
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


