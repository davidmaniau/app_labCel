<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['add'])){
		$tabla = $_POST['tabla'];

			$dato01 = $_POST["nombre"];
			$dato02 = $_POST["apellido"];
			$dato03 = $_POST["dni"];
			$dato04 = $_POST["cargo_id"];
			$dato05 = $_POST["salario_mensual"];
			$dato06 = $_POST["numero_cuenta_banco"];
			$dato07 = $_POST["entrada"];
			$dato08 = $_POST["salida"];

			
		$sql = "INSERT INTO ".$tabla."(nombre,apellido,dni,cargo_id,salario_mensual,numero_cuenta_banco,entrada,salida)
		VALUES ('$dato01','$dato02','$dato03','$dato04','$dato05','$dato06','$dato07','$dato08')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}
	header('location: '.$modulo);
?>

