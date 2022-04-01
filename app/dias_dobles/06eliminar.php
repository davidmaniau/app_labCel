<?php
	include '../include/session.php';


	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$tabla = $_POST['tabla'];
		$modulo = $_POST['modulo'];

		$sql = "DELETE FROM ".$tabla." WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Registro eliminado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione el elemento para eliminar primero';
	}

	header('location: '.$modulo);

?>