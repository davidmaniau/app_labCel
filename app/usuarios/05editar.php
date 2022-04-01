<?php
include '../include/session.php';

if(isset($_POST['edit'])){
	$empid = $_POST['id']; 		
	$tabla = $_POST['tabla'];			
	$modulo = $_POST['modulo'];

	$rol_id = $_POST['rol_id'];
	$cargo_id = $_POST['cargo_id'];
	$nombre_usuario = $_POST['nombre_usuario'];
	$nombre_completo = $_POST['nombre_completo'];
	$horario_id = $_POST['horario_id'];	
	$dni = $_POST['dni'];
	$no_cuenta = $_POST['no_cuenta'];
	$salario = $_POST['salario'];





	$sql = "UPDATE ".$tabla." SET 


	rol_id = '$rol_id',
	cargo_id = '$cargo_id',
	username = '$nombre_usuario',
	nombre_completo = '$nombre_completo',
	horario_id = '$horario_id',
	dni = '$dni',
	numero_cuenta = '$no_cuenta',
	salario_m = '$salario'



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