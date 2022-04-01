<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$telefono = $_POST['telefono'];
        $promotor_id = $_POST['promotor_id'];
		$ciudad_id = $_POST['ciudad_id'];

		$C10 = $_POST['diez'];
		$costo = $_POST['costo'];



		$fecha1 = $_POST['fecha'];
		$fecha = date("Y-m-d", strtotime($fecha1) );




		$sql = "UPDATE ".$tabla." SET nombre = '$nombre', edad = '$edad',
		telefono = '$telefono',
        promotor_id = '$promotor_id', ciudad_id = '$ciudad_id', C10 = '$C10'
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