<?php
	session_start();
	include 'conexion.php';

	$timezone = 'America/Tegucigalpa';
date_default_timezone_set($timezone);
$fecha_y_hora_actual = date("Y-m-d H:i:s");
$hora_actual = date("H:i:s");
$fecha_actual = date("Y-m-d");

	if(isset($_POST['loginx'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM usuarios WHERE username = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'el nombre de usuario no esta vinculada a ninguna cuenta';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Nombre de usuario o contraseña incorrectos por favor verificar de nuevo !!!';
			}
		}

	}
	else{
		$_SESSION['error'] = 'introduce las credeciales primero'.$sqld;
	}




if(isset($_POST['marcar_asistencia'])){
		
		$tipo_marcacion_id = $_POST['tipo_marcacion_id'];
		$usuario_id = $_POST['usuario_id'];

		$sqld = "SELECT count(*) as totalr FROM asistencias WHERE usuario_id = '$usuario_id' and estado_asistencia_id = '0'  ";
		$query = $conn->query($sqld);
		$item = $query->fetch_assoc();

if ($item['totalr']==0) {


// si tipo_marcacion_id  = 1
	// no hay registros con la fecha de indicada(del momento ensi),  no es con el usuario indicado, tipo_indicado
	//INSERT GUARDAR ID_USUARIO, HORA ENTRADA, TIPO_MARCACION_ID = 1 y estado_asistencia_id=0     1//ENTRADA Y   2//SALIDA    el cero en estado_asistencia_id es para indicar que el ciclo no se ha cerrado independientemente de la fecha.

	if ($tipo_marcacion_id==1) {
		
		$tabla = 'asistencias';	

		
		$sql = "INSERT INTO ".$tabla."(
		fecha,
		usuario_id,
		hora_entrada,
		estado_entrada,
		hora_salida, 		
		estado_salida,

		horas_tardes, 
		horas_extras,	
		horas_trabajadas,	
		tipo_marcacion_id,		
		estado_asistencia_id 
	)  VALUES (
	'$fecha_actual',
	'$usuario_id',
	'$hora_actual',
	'0', 
	'00:00:00', 	
	'0', 

	'0',
	'0',
	'0',	
	'0',	
	'0' )";


		if($conn->query($sql)){ $_SESSION['success'] = ' Ha registrado su Entrada satisfactoriamente';	
	}
		else{ $_SESSION['error'] = 'Ya ha ingresado su entrada anteriormente, debe de registrar su salida para volvera grabar su entrada!!!'; }

	}
	else{	$_SESSION['error'] = 'Fill up add form first';	

	}
	
	}



// si tipo_marcacion_id = 2
	//no has marcado tu entrada aun no puedes marcar tu salida





			if ($totalr==1) {	

				 $_SESSION['success'] = 'Ya ha ingresado su entrada anteriormente, debe de registrar su salida para volvera grabar su entrada!!!';



			//$sql = "SELECT tipo_marcacion_id as tipo_marca FROM asistencias WHERE usuario_id = '$usuario_id' and estado_asistencia_id = '0' ";
				//$item = $query->fetch_assoc();

			//si r  tipo_marca ==  $tipo_marcacion_id

			//si tipo_marca = 1
			//la persona ya marco su entrada  y no puede marcarla una vez mas

			//si tipo_marca = 2
			//la persona ya marco su salida  y no puede marcarla una vez mas

			//else de lo contrario

			//si tipo marca  = 2 nos vamos a permitir un update


			//si tipo marca  = 1 detalle no se puede actualizar



			}


		

	}
	else{
		$_SESSION['error'] = ' tu marcacion';
	}



	 //header('location:/pixelasistencias/index.php'.$sql);
	 header('location:/pixelasistencias/index.php');

?>