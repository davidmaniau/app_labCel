<?php
include '../include/session.php';
/////////////////EDITAR LA ENTRADA ////////////////////////////////////
if(isset($_POST['edit_e'])){

	$hora_almuerzo = 1;

	$id_row = $_POST['id'];
	$tabla = $_POST['tabla'];
	$modulo = $_POST['modulo'];

	$fecha = $_POST['fecha_ini'];
	$old_date1 = $_POST['fecha_ini'];
	$new_date1 = date("Y-m-d", strtotime($old_date1) );

	$hora_entrada = $_POST['time_in'];
	$hora_entrada = date('H:i:s', strtotime($hora_entrada));

	$sql = "UPDATE ".$tabla." SET hora_entrada = '$hora_entrada', fecha = '$new_date1' WHERE id = '$id_row'";

	if($conn->query($sql))
	{

		$id_registro = $id_row;

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

		$estado_asistencia=$rowx['estado_asistencia_id'];

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

		//convertir esa variable string a variable de tipo fecha -hora HORA QUE MARCO
		$fecha1 = new DateTime($fecha_1_x);//fecha inicial MARCACION POR EL USUARIO

		//convertir esa variable string a variable de tipo fecha -hora
		$fecha1_of = new DateTime($fecha_hora_inicio_of);//fecha inicial 2 HORA OFICIAL DESIGNADA POR EL SISTEMA

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
		$totalHoras_2x_min = ($segundos_2x/60/60) + ($minutos_2x/60) + ($dias_2x*24) + $horas_2x;// minutos y horas

		//variable tipo FECHA Y HORA MARCACION por el empleado
		//$fecha1 = new DateTime($fecha_1_x);//fecha inicial
		$fecha2 = new DateTime($fecha_2_x);//fecha de cierre

		//variable tipo FECHA Y HORA OFICIAL que debe segun horario del empleado
		//$fecha1_of = new DateTime($fecha_hora_inicio_of);//fecha inicial 2
		$fecha2_of = new DateTime($fecha_hora_final_of);//fecha de cierre 2

		//TOTAL DE HORAS TRABAJADAS Y minutos
		$intervalo = $fecha1->diff($fecha2);  //DIFERECIA ENTRE DOS FECHAS_HORAS
											  //FECHA_HORA_TERMINASTE DE TRABAJAR - FECHA_HORA_INICIASTE A TRABAJAR
		//$intervalo = $fecha2_of->diff($fecha2);
		$anos_1x=$intervalo->format('%Y');
		$meses_1x=$intervalo->format('%M');
		$dias_1x=$intervalo->format('%D');
		$horas_1x=$intervalo->format('%H');
		$minutos_1x=$intervalo->format('%I');
		$segundos_1x=$intervalo->format('%S');

		$totalHoras_min= ($segundos_1x/60/60) + ($minutos_1x/60) + ($dias_1x*24) + $horas_1x;// minutos y horas

		$totalHoras_min_HMI_HFS= ($segundos_1x/60/60) + ($minutos_1x/60) + ($dias_1x*24) + $horas_1x;// minutos y horas

		//5:00 - 11:00 = -6
		$intervalo_salida = $fecha2->diff($fecha2_of); // horas extras o tardes
		$anos_3x=$intervalo_salida->format('%Y');
		$meses_3x=$intervalo_salida->format('%M');
		$dias_3x=$intervalo_salida->format('%D');
		$horas_3x=$intervalo_salida->format('%H');
		$minutos_3x=$intervalo_salida->format('%I');
		$segundos_3x=$intervalo_salida->format('%S');

		$totalHoras_3x_min= ($segundos_3x/60/60) + ($minutos_3x/60) + ($dias_3x*24) + $horas_3x;// minutos y horas


		$intervalo_hot = $fecha1->diff($fecha2_of); // HORAS OFICIAL TRABAJADO (INICIO - FIN OFICIAL DEL DIA)
		$anos_hot=$intervalo_hot->format('%Y');
		$meses_hot=$intervalo_hot->format('%M');
		$dias_hot=$intervalo_hot->format('%D');
		$horas_hot=$intervalo_hot->format('%H');
		$minutos_hot=$intervalo_hot->format('%I');
		$segundos_hot=$intervalo_hot->format('%S');
		$totalHoras_hot = ($segundos_hot/60/60) + ($minutos_hot/60) + ($dias_hot*24) + $horas_hot;// minutos y horas


		$stado_entrada = 0;

				 // 202x-10-10 15:30:00 >   202x-10-10 8:00:00
		if ($fecha1 > $fecha1_of  ) {
					$stado_entrada = 0;//tarde
					$total_h_tardes = $totalHoras_2x_min;
				}
				else{
				$stado_entrada = 1;//a tiempo-extras
				$total_h_extras = $totalHoras_2x_min;
			}


			$stado_salida = 0;

				// 202x-10-17 8:00:00 >   202x-10-16 7:00:00    
			if ($fecha2 > $fecha2_of  ) {
					$stado_salida = 1;//salida bien extras
					$total_h_extras = $totalHoras_2x_min + $totalHoras_3x_min;

				}
				else{
				$stado_salida = 0;//salida temprano
				$total_h_tardes = $totalHoras_2x_min + $totalHoras_3x_min;
			}

			if ($estado_asistencia == 1){

					//contamos con fecha_hora_marco de inicio y fecha_hora_fin_marco

				$totalHoras_min = $totalHoras_min - $hora_almuerzo;
				$totalHoras_hot = ($totalHoras_min - $hora_almuerzo) - $totalHoras_hot;


				$sql = "UPDATE ".$tabla." SET
				horas_trabajadas = '$totalHoras_min',
				estado_salida = '$stado_salida',
				estado_entrada = '$stado_entrada',
				horas_extras = '$totalHoras_hot'
				WHERE id = '". $id_row. "'";

				//horas_extras = '$total_h_extras'


				if($conn->query($sql)){
								$_SESSION['success'] = 'Salida Grabada con éxito';//.$sql;
							}
							else{
								$_SESSION['error'] = $conn->error.$sql;
							}


						}

						if ($estado_asistencia == 0){

					//el usuario no ha marcado su salida

							$sql = "UPDATE ".$tabla." SET

							estado_entrada = '$stado_entrada'

							WHERE id = '". $id_row. "'";



							if($conn->query($sql)){
								$_SESSION['success'] = 'Actualizacion Entrada con con éxito';//.$sql;
							}
							else{
								$_SESSION['error'] = $conn->error.$sql;
							}


						}




					}
					else{
						$_SESSION['error'] = $conn->error;
					}

				}
	// fin del isset

				else{
		//$_SESSION['error'] = 'si no se esta enviando la variable isset';
				}




///////////////////////////////////////////////////////////////////////
/////////////////EDITAR LA SALIDA /////////////////////////////////////
///////////////////////////////////////////////////////////////////////



				if( isset( $_POST['edit_s'] ) ) {

					$hora_almuerzo = 1;

					$id_row = $_POST['id'];
					$tabla = $_POST['tabla'];
					$modulo = $_POST['modulo'];

					$fecha = $_POST['fecha_ini'];
		//Try this one 
					$old_date1 = $_POST['fecha_ini'];
					$new_date1 = date("Y-m-d", strtotime($old_date1) );



					$hora_entrada = $_POST['time_in'];
					$hora_entrada = date('H:i:s', strtotime($hora_entrada));

					$fecha2 = $_POST['fecha_out'];
		//Try this one 
					$old_date2 = $_POST['fecha_out'];
					$new_date2 = date("Y-m-d", strtotime($old_date2) );

					$hora_salida = $_POST['time_out'];
					$hora_salida = date('H:i:s', strtotime($hora_salida));



					$sql = "UPDATE ".$tabla." SET


					hora_salida = '$hora_salida',

					fecha2 = '$new_date2'

					WHERE id = '$id_row'";

					if($conn->query($sql))
					{
			//$_SESSION['success'] = 'actualizado con éxito '.$sql;


						$id_registro=$id_row;

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


				$stado_entrada = 0;

				 // 202x-10-10 15:30:00 >   202x-10-10 8:00:00
				if ($fecha1 > $fecha1_of  ) {
					$stado_entrada = 0;//tarde
					$total_h_tardes = $totalHoras_2x_min;
				}
				else{
				$stado_entrada = 1;//a tiempo-extras
				$total_h_extras = $totalHoras_2x_min;
			}


			$stado_salida = 0;

				// 202x-10-17 8:00:00 >   202x-10-16 7:00:00    
			if ($fecha2 > $fecha2_of  ) {
					$stado_salida = 1;//salida bien extras
					$total_h_extras = $totalHoras_2x_min + $totalHoras_3x_min;

				}
				else{
				$stado_salida = 0;//salida temprano
				$total_h_tardes = $totalHoras_2x_min + $totalHoras_3x_min;
			}


			$totalHoras_min = $totalHoras_min - $hora_almuerzo;

			$sql = "UPDATE ".$tabla." SET

			horas_trabajadas = '$totalHoras_min',
			estado_salida = '$stado_salida',
			horas_extras = '$total_h_extras',
			estado_asistencia_id = '1'

			WHERE id = '". $id_row. "'";

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
					else{
		//$_SESSION['error'] = 'error al no recibir la variable';
					}









					header('location: '.$modulo);
				?>