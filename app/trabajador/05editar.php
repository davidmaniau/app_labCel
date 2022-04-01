<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$dni = $_POST['dni'];		
        $cargo_id = $_POST['cargo_id'];
		$salario_mensual = $_POST['salario_mensual'];
		$numero_cuenta_banco = $_POST['numero_cuenta_banco'];
		$entrada = $_POST['entrada'];
        $salida = $_POST['salida'];


		$sql = "UPDATE ".$tabla." SET nombre = '$nombre', apellido = '$apellido',
		dni = '$dni',
        cargo_id = '$cargo_id', salario_mensual = '$salario_mensual',
        numero_cuenta_banco = '$numero_cuenta_banco', entrada = '$entrada', salida = '$salida'
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