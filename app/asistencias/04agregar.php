<?php
	//include 'includes/session.php';
	// include '../include/conexion.php';
	// include '00configuraciones.php';
	// $modulo = "01index.php";

	// if(isset($_POST['add'])){
	// 	$tabla = $_POST['tabla'];	

	// 	$dato01 = $_POST['dato1'];
	// 	$dato02 = $_POST['dato2'];
	// 	$dato03 = $_POST['dato3'];

	// 	//$dato01 = $_POST['tasa_c'];		
	// 	$sql = "INSERT INTO ".$tabla."($dato1,$dato2,$dato3) VALUES ('$dato01','$dato02','$dato03')";
	// 	if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
	// 	else{ $_SESSION['error'] = $conn->error; }
	// }
	// else{	$_SESSION['error'] = 'Fill up add form first';	}
	// header('location: '.$modulo);
?>




<?php
	//session_start();

include '../include/conexion.php';
	//include '00configuraciones.php';

$timezone = 'America/Tegucigalpa';
date_default_timezone_set($timezone);
$fecha_y_hora_actual = date("Y-m-d H:i:s");
$hora_actual = date("H:i:s");
$fecha_actual = date("Y-m-d");



if(isset($_POST['marcar_asistencia'])){
	
	$tipo_marcacion_id = $_POST['tipo_marcacion_id'];
	$usuario_id = $_POST['usuario_id'];
	$tabla = 'asistencias';
	$tipo_marcacion_id = 'tipo_marcacion_id';

	$fecha_marcacion = 'fecha_ini'; 
	$hora_marcacion = 'time_in';


	$fecha_actual = $fecha_marcacion; 
	$hora_actual = $hora_marcacion;



	$sqld = "SELECT count(*) as totalr FROM asistencias WHERE usuario_id = '$usuarios_id' and estado_asistencia_id = '0'  ";
	$query = $conn->query($sqld);
	$item = $query->fetch_assoc();

	if ($item['totalr']==0) {


			// si tipo_marcacion_id  = 1
				// no hay registros con la fecha de indicada(del momento ensi),  no es con el usuario indicado, tipo_indicado
				//INSERT GUARDAR ID_USUARIO, HORA ENTRADA, TIPO_MARCACION_ID = 1 y estado_asistencia_id=0     1//ENTRADA Y   2//SALIDA    el cero en estado_asistencia_id es para indicar que el ciclo no se ha cerrado independientemente de la fecha.

		if ($tipo_marcacion_id==1) {
			
			
			$sql = "INSERT INTO ".$tabla."(	fecha,	usuario_id,	hora_entrada,				estado_entrada,		hora_salida, 		estado_salida,	horas_tardes, 
			horas_extras,		horas_trabajadas,		tipo_marcacion_id,						estado_asistencia_id 	)  VALUES (			'$fecha_actual',			'$usuario_id',			'$hora_actual',			'0', 		'00:00:00', 				'0', 	'0',		'0',		'0',			'1',			'0' )";


			if($conn->query($sql)){ 

					//$_SESSION['success'] = ' Ha registrado su Entrada satisfactoriamente';

				$sqld2 = "SELECT max(id) as empidx FROM asistencias ";
				$query2 = $conn->query($sqld2);
				$item2 = $query2->fetch_assoc();

				



				$id_registro=$item2['empidx'];
				$sqlx = "SELECT 
				asistencias.fecha as date_ini, 
				asistencias.hora_entrada as time_ini, 
				horarios.hora_inicio as t1 
				FROM asistencias 
				left join usuarios on usuarios.id = asistencias.usuario_id
				left join horarios on horarios.id = usuarios.horario_id
				WHERE asistencias.id = '".$id_registro."'";

				$query = $conn->query($sqlx);
				$rowx = $query->fetch_assoc();



//HORAS TOTAL TRABAJADAS

				$total_h_extras="0";
				$total_h_tardes="0";

// fecha actual y la hora oficial de entrada del trabajador
// 202x-10-10 8:00:00 almaceno en variables string
				$fecha_hora_inicio_of = date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['t1']));


// fecha actual y la hora en que marco la entrada el trabajador esto es una variable string
// 202x-10-10 15:30:00
				$fecha_1_x= date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['time_ini']));


//convertir esa variable string a variable de tipo fecha -hora HORA QUE MARCO
$fecha1 = new DateTime($fecha_1_x);//fecha inicial


//convertir esa variable string a variable de tipo fecha -hora
$fecha1_of = new DateTime($fecha_hora_inicio_of);//fecha inicial 2 HORA OFICIAL OBLIGATORIA A MARCAR

//9:10 - 8:00
//$intervalo_entrada = $fecha1->diff($fecha1_of);
$intervalo_entrada = $fecha1_of->diff($fecha1); //horas extras o tardes
$anos_2x=$intervalo_entrada->format('%Y');
$meses_2x=$intervalo_entrada->format('%M');
$dias_2x=$intervalo_entrada->format('%D');
$horas_2x=$intervalo_entrada->format('%H');
$minutos_2x=$intervalo_entrada->format('%I');
$segundos_2x=$intervalo_entrada->format('%S');

$totalHoras_2x= ($segundos_2x/60/60) + ($minutos_2x/60) + ($dias_2x*24) + $horas_2x;// minutos y horas
$totalHoras_2x_min=($segundos_2x/60/60) + ($minutos_2x/60) + ($dias_2x*24) + $horas_2x;// minutos y horas

$stado_entrada = 0;

 // 202x-10-10 15:30:00 >   202x-10-10 8:00:00
if ($fecha1 > $fecha1_of  ) {
	$stado_entrada = 0;//tarde
	$total_h_tardes = $totalHoras_2x_min;
}
else{$stado_entrada = 1;//a tiempo-extras
	$total_h_extras = $totalHoras_2x_min;
}



$sql = "UPDATE ".$tabla." SET
estado_entrada = '$stado_entrada',
horas_extras = '$total_h_extras',				
horas_tardes = '$total_h_tardes'

WHERE id = '".$id_registro."'";


if($conn->query($sql)){
								$_SESSION['success'] = ' Ha registrado su Entrada satisfactoriamente';//.$sql;
							}
							else{
								$_SESSION['error'] = $conn->error.$sql;
							}






						}
						else{ $_SESSION['error'] = 'no se pudo realizar la accion'; }

					}
					

				}
				
				

				else{




					if ($item['totalr']>0) {	
						


						$sql1 = "SELECT tipo_marcacion_id as tipo_marca, id as empid FROM asistencias WHERE usuario_id = '$usuario_id' and estado_asistencia_id = '0' ";
						$query1 = $conn->query($sql1);
						$item1= $query1->fetch_assoc();

			//si r  tipo_marca ==  $tipo_marcacion_id

			//si tipo_marca = 1
			//la persona ya marco su entrada  y no puede marcarla una vez mas

				//$_SESSION['error'] = 'total mayor a cero';

						if ($item1['tipo_marca']==$tipo_marcacion_id) {

							$_SESSION['error'] = 'item 1 y estado asistencia son iguales';					
							
							if ($tipo_marcacion_id==1){
								$_SESSION['error'] = 'Ya ha ingresado su entrada anteriormente, debe de registrar su salida para volvera grabar su entrada!!!';
							}
							else
							{


								

							}
							

						}
						else{
//$_SESSION['error'] = 'item 1 y estado asistencia NO NO NO son iguales'.$sql1;	

							$sql1 = "SELECT tipo_marcacion_id as tipo_marca, id as empid FROM asistencias WHERE usuario_id = '$usuario_id' and estado_asistencia_id = '0' ";
							$query1 = $conn->query($sql1);
							$item1= $query1->fetch_assoc();
							

							if ($tipo_marcacion_id==2){




//$usuario_id;

// 	horario.hora entrda OFICIAL
// 	horario.hora salida OFICIAL

// 	hora_marco_entrda
// 	hora_marco_salida hora que va corriendo en ese instante

// 	ENTRADA OFICIAL 				ENTRADA MARCADA
// 		8:00						7:00		r =  1 HORAS EXTRAS
// 		8:00	|					9:00 		r = -1 HORAS TARDES
// r = horario.hora entrda - hora_marco_entrda
// si el valor de resultado < 0 //entonces llegada tarde horas tardes
// de lo contrario si R = 0 o mayor cero entrda e a tiempo //horas extras


// 	SALIDA MARCADA 				SALIDA OFICIAL
// 		4:00						5:00		r = -1 HORAS PENDIENTES  
// 		7:00	|					5:00 		r =  2 HORAS EXTRAS 
// r = horario.hora entrda - hora_marco_entrda
// si el valor de resultado < 0 //entonces llegada tarde horas tardes
// de lo contrario si R = 0 o mayor cero entrda e a tiempo //horas extras


// HORAS TRABAJADAS = HORA MARCO SALIDA - HORA MARCO ENTRADA



								$sql_data = "SELECT tipo_marcacion_id as tipo_marca, id as empid FROM asistencias WHERE usuarios_id = '$usuarios_id' and estado_asistencia_id = '0' ";

								$query_data = $conn->query($sql_data);
								$item_data= $query1->fetch_assoc();



								$sql = "UPDATE ".$tabla." SET 

								tipo_marcacion_id = '2', 
								fecha2 = '$fecha_actual',
								hora_salida = '$hora_actual',
								estado_salida = '0',
								horas_extras = '0',
								horas_trabajadas = '0',
								estado_asistencia_id = '1'


								WHERE id = '". $item1['empid']. "'";

								
								

								if($conn->query($sql)){
									$_SESSION['success'] = '0x Salida Grabada con éxito';


									$id_registro=$item1['empid'];

									$sqlx = "SELECT * , 
									asistencias.fecha as date_ini, 
									asistencias.fecha2 as date_end, 
									asistencias.hora_entrada as time_ini, 
									asistencias.hora_salida as time_end, 
									horarios.hora_inicio as t1, 
									horarios.hora_final as t2 

									FROM asistencias 

									left join usuarios on usuarios.id = asistencias.usuario_id
									left join horarios on horarios.id = usuarios.horario_id

									WHERE asistencias.id = '".$id_registro."'";

									$query = $conn->query($sqlx);
									$rowx = $query->fetch_assoc();



//HORAS TOTAL TRABAJADAS

									$total_h_extras="0";
									$total_h_tardes="0";


//variable string FECHA y HORA oficial que debe marcar ENTRADA
									$fecha_hora_inicio_of = date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['t1']));

//variable string FECHA y HORA oficial que debe marcar SALIDA
									$fecha_hora_final_of = date('yy-m-d', strtotime($rowx['date_end'])).' '.date('h:i:s A', strtotime($rowx['t2']));

//variable string FECHA y HORA empleado MARCO ENTRADA
									$fecha_1_x= date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['time_ini']));

//variable string FECHA Y HORA empleado MARCO SALIDA
									$fecha_2_x= date('yy-m-d', strtotime($rowx['date_end'])).' '.date('h:i:s A', strtotime($rowx['time_end']));

//variable tipo FECHA Y HORA MARCACION por ele empleado
$fecha1 = new DateTime($fecha_1_x);//fecha inicial
$fecha2 = new DateTime($fecha_2_x);//fecha de cierre

//variable tipo FECHA Y HORA OFICIAL que debe segun horario del empleado
$fecha1_of = new DateTime($fecha_hora_inicio_of);//fecha inicial 2
$fecha2_of = new DateTime($fecha_hora_final_of);//fecha de cierre 2

//TOTAL DE HORAS TRABAJADAS Y minutos
$intervalo = $fecha1->diff($fecha2);

$anos_1x=$intervalo->format('%Y');
$meses_1x=$intervalo->format('%M');
$dias_1x=$intervalo->format('%D');
$horas_1x=$intervalo->format('%H');
$minutos_1x=$intervalo->format('%I');
$segundos_1x=$intervalo->format('%S');

//$totalHoras= ($segundos_1x/60/60) + ($minutos_1x/60) + ($dias_1x*24) + $horas_1x;// minutos y horas
$totalHoras_min= ($segundos_1x/60/60) + ($minutos_1x/60) + ($dias_1x*24) + $horas_1x;// minutos y horas



//5:00 - 11:00 = -6
//$intervalo_salida = $fecha2_of->diff($fecha2);
$intervalo_salida = $fecha2->diff($fecha2_of); // horas extras o tardes
$anos_3x=$intervalo_salida->format('%Y');
$meses_3x=$intervalo_salida->format('%M');
$dias_3x=$intervalo_salida->format('%D');
$horas_3x=$intervalo_salida->format('%H');
$minutos_3x=$intervalo_salida->format('%I');
$segundos_3x=$intervalo_salida->format('%S');


//$totalHoras_3x= ($segundos_3x/60/60) + ($minutos_3x/60) + ($dias_3x*24) + $horas_3x;// minutos y horas
$totalHoras_3x_min= ($segundos_3x/60/60) + ($minutos_3x/60) + ($dias_3x*24) + $horas_3x;// minutos y horas



$stado_salida = 0;

// 202x-10-10 8:00:00 >   202x-10-10 7:00:00    
if ($fecha2 > $fecha2_of  ) {
	$stado_salida = 1;//salida bien extras
	$total_h_extras = $totalHoras_2x_min + $totalHoras_3x_min;

}
else{$stado_salida = 0;//salida temprano
	$total_h_tardes = $totalHoras_2x_min + $totalHoras_3x_min;
}




//echo $anos_1x.' años '.$meses_1x.' meses '. $dias_1x .' days '.$horas_1x. ' horas ' .$minutos_1x.' minutos '.$segundos_1x.' segundos total horas='.$totalHoras.'<br><br>';//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

//echo 'fecha y hora de inicio: '.$fecha_1_x.'<br><br>';
//echo 'fecha y hora de termino: '.$fecha_2_x.'<br><br>';
//echo 'horas trabajadas: '.$totalHoras;



$sql = "UPDATE ".$tabla." SET 

horas_trabajadas = '$totalHoras_min', 
estado_salida = '$stado_salida',						
horas_extras = '$total_h_extras'	

WHERE id = '". $item1['empid']. "'";

// horas_tardes = '$total_h_tardes'


if($conn->query($sql)){
								$_SESSION['success'] = 'Salida Grabada con éxito';//.$sql;
							}
							else{
								$_SESSION['error'] = $conn->error.$sql;
							}

						}
						else{
							$_SESSION['error'] = $conn->error;
						}

					}



				}

				

			//si tipo_marca = 2
			//la persona ya marco su salida  y no puede marcarla una vez mas

			//else de lo contrario

			//si tipo marca  = 2 nos vamos a permitir un update


			//si tipo marca  = 1 detalle no se puede actualizar



			}


			

		}

		

		

		header('location: 01index.php');

	}


	 //header('location:/pixelasistencias/index.php'.$sql);
	

?>