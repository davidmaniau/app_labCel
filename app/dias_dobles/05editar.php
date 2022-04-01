<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; 		$tabla = $_POST['tabla'];			$modulo = $_POST['modulo'];

		$usuario_id = $_POST['usuarios_id'];
		$fecha1 = $_POST['fecha'];
		$fecha = date("Y-m-d", strtotime($fecha1) );
		$comentario = $_POST['comentario'];
		

			
		$sql = "UPDATE ".$tabla." SET usuario_id='$usuario_id', fecha='$fecha', comentario='$comentario'
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