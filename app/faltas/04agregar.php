<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];	

// $tabla="asistencias_faltas";

// $dato1 = "usuarios_id";
// $dato2 = "fecha";
// $dato3 = "comentario";

		$dato01 = $_POST['usuarios_id'];
		$fecha1 = $_POST['fecha'];
		$dato02 = date("Y-m-d", strtotime($fecha1) );
		$dato03 = $_POST['comentario'];


			
		$sql = "INSERT INTO ".$tabla."(usuario_id,fecha,comentario)
		VALUES ('$dato01','$dato02','$dato03')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>
