<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$descripcion = $_POST['descripcion'];
		$costo1 = $_POST['costo1'];		
        $costo2 = $_POST['costo2'];
		
		$sql = "UPDATE ".$tabla." SET descripcion = '$descripcion', costo1 = '$costo1',
        costo2 = '$costo2'
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