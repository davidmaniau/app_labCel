<?php
	include '../include/session.php';

	if(isset($_POST['delete'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$sql = "DELETE FROM ".$tabla."  WHERE id = '$empid'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Eliminado con éxito '.$modulo;//.$sql;
		}
		else{
			$_SESSION['error'] = $conn->error.$sql;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccionar  para editar primero'.$sql;
	}	
	header('location: '.$modulo);
?>