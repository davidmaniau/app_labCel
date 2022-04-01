<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$nombre = $_POST['nombre'];
		$rtn_dni = $_POST['rtn_dni'];
		$cliente_tipo_id = $_POST['cliente_tipo_id'];		
        $telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$email = $_POST['email'];


		$sql = "UPDATE ".$tabla." SET nombre = '$nombre', rtn_dni = '$rtn_dni',
		cliente_tipo_id = '$cliente_tipo_id',
        telefono = '$telefono', direccion = '$direccion', email = '$email'
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