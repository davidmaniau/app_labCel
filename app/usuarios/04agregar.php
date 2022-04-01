<?php
	//include 'includes/session.php';
include '../include/conexion.php';
include '00configuraciones.php';
$modulo = "01index.php";

if(isset($_POST['add'])){
	$tabla = $_POST['tabla'];	

	$dato01 = $_POST['rol_id'];
	$dato02 = $_POST['cargo_id'];
	$dato03 = $_POST['nombre_usuario'];
	$dato04 = $_POST['clave'];
	$pass_cifrado = password_hash($dato04, PASSWORD_DEFAULT);

	$dato05 = $_POST['nombre_completo'];

	$dato06 = $_POST['horario_id'];

	$dato07 = "1";


	$filename = $_FILES['photo']['name'];

	if (!empty($filename)) {
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
	}


	$dato09 = $_POST['dni'];
	$dato10 = $_POST['no_cuenta'];
	$dato11 = $_POST['salario'];


	$sql = "INSERT INTO ".$tabla."(rol_id,cargo_id,username,password,nombre_completo,horario_id,usuario_tipo_id,photo,dni,numero_cuenta,salario_m) VALUES ('$dato01','$dato02','$dato03','$pass_cifrado','$dato05','$dato06','$dato07', '$filename','$dato09','$dato10', '$dato11')";

	if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
	else{ $_SESSION['error'] = $conn->error; }
}
else{	$_SESSION['error'] = 'Fill up add form first';	}
header('location: '.$modulo);
?>