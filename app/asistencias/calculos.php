<br>
<br>
<h3>---------------------- inicio calculos de prueba------------------ </h3>

<?php  


$id_registro=34;



//$id_registro=$item1['empid'];
$sqlx = "SELECT * , 

asistencias.fecha as date_ini, 
asistencias.fecha2 as date_end, 
asistencias.hora_entrada as time_ini, 
asistencias.hora_salida as time_end, 
horarios.hora_inicio as t1, 
horarios.hora_final as t2 

FROM asistencias 

left join usuarios on usuarios.id = asistencias.usuario_id
left join horarios on horarios_id.id = usuarios.horario_id

WHERE asistencias.id = '".$id_registro."'";

$query = $conn->query($sqlx);
$rowx = $query->fetch_assoc();



//HORAS TOTAL TRABAJADAS

                  $total_h_extras="0";
                  $total_h_tardes="0";

$fecha_hora_inicio_of = date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['t1']));

//fecha y hora en que debe salir
$fecha_hora_final_of = date('yy-m-d', strtotime($rowx['date_end'])).' '.date('h:i:s A', strtotime($rowx['t2']));


$fecha_1_x= date('yy-m-d', strtotime($rowx['date_ini'])).' '.date('h:i:s A', strtotime($rowx['time_ini']));

//fecha y hora en que marco la salida
$fecha_2_x= date('yy-m-d', strtotime($rowx['date_end'])).' '.date('h:i:s A', strtotime($rowx['time_end']));

$fecha1 = new DateTime($fecha_1_x);//fecha inicial
$fecha2 = new DateTime($fecha_2_x);//fecha de cierre


$fecha1_of = new DateTime($fecha_hora_inicio_of);//fecha inicial 2
$fecha2_of = new DateTime($fecha_hora_final_of);//fecha de cierre 2

$intervalo = $fecha1->diff($fecha2);

$anos_1x=$intervalo->format('%Y');
$meses_1x=$intervalo->format('%M');
$dias_1x=$intervalo->format('%D');
$horas_1x=$intervalo->format('%H');
$minutos_1x=$intervalo->format('%I');
$segundos_1x=$intervalo->format('%S');

$totalHoras= ($segundos_1x/60/60) + ($minutos_1x/60) + ($dias_1x*24) + $horas_1x;// minutos y horas


echo $anos_1x.' años '.$meses_1x.' meses '. $dias_1x .' days '.$horas_1x. ' horas ' .$minutos_1x.' minutos '.$segundos_1x.' segundos total horas='.$totalHoras.'<br><br>';//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

echo 'fecha y hora de inicio: '.$fecha_1_x.'<br><br>';
echo 'fecha y hora de termino: '.$fecha_2_x.'<br><br>';
echo 'horas trabajadas: '.$totalHoras;




//9:10 - 8:00
$intervalo_entrada = $fecha1->diff($fecha1_of);
//$intervalo_entrada = $fecha1_of->diff($fecha1); //horas extras o tardes
$anos_2x=$intervalo_entrada->format('%Y');
$meses_2x=$intervalo_entrada->format('%M');
$dias_2x=$intervalo_entrada->format('%D');
$horas_2x=$intervalo_entrada->format('%H');
$minutos_2x=$intervalo_entrada->format('%I');
$segundos_2x=$intervalo_entrada->format('%S');

$totalHoras_2x= ($segundos_2x/60/60) + ($minutos_2x/60) + ($dias_2x*24) + $horas_2x;// minutos y horas

echo '<br><br><br><h1> diferencias entre hora entrada ofc y marcada </h1><br>';
echo $anos_2x.' años '.$meses_2x.' meses '. $dias_2x .' days '.$horas_2x. ' horas ' .$minutos_2x.' minutos '.$segundos_2x.' segundos total horas='.$totalHoras_2x.'<br><br>';//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

echo 'fecha y hora de inicio: '.$fecha_hora_inicio_of.'<br><br>';
echo 'fecha y hora de termino: '.$fecha_1_x.'<br><br>';
echo 'dif hra ofc y hora marc: '.$totalHoras_2x.'<br><br>';




$stado_entrada = 0;

if ($fecha_hora_inicio_of < $fecha_1_x) {
  $stado_entrada = 0;//tarde
  $total_h_tardes = $totalHoras_2x;
  echo 'horas tardes?: '.$total_h_tardes.'<br><br>';
}
else{$stado_entrada = 1;//a tiempo-extras
  $total_h_extras = $totalHoras_2x;
  echo 'horas extras?c: '.$total_h_extras.'<br><br>';
}



//5:00 - 11:00 = -6
//$intervalo_salida = $fecha2_of->diff($fecha2);
$intervalo_salida = $fecha2->diff($fecha2_of); // horas extras o tardes
$anos_3x=$intervalo_salida->format('%Y');
$meses_3x=$intervalo_salida->format('%M');
$dias_3x=$intervalo_salida->format('%D');
$horas_3x=$intervalo_salida->format('%H');
$minutos_3x=$intervalo_salida->format('%I');
$segundos_3x=$intervalo_salida->format('%S');

$totalHoras_3x= ($segundos_3x/60/60) + ($minutos_3x/60) + ($dias_3x*24) + $horas_3x;// minutos y horas

echo '<br><br><br><h1> diferencias entre hora salida ofc y marcada </h1><br>';
echo $anos_3x.' años '.$meses_3x.' meses '. $dias_3x .' days '.$horas_3x. ' horas ' .$minutos_3x.' minutos '.$segundos_3x.' segundos total horas='.$totalHoras_3x.'<br><br>';//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

echo 'fecha y hora de inicio: '.$fecha_hora_final_of.'<br><br>';
echo 'fecha y hora de termino: '.$fecha_2_x.'<br><br>';
echo 'dif hra ofc y hora marc: '.$totalHoras_3x.'<br><br>';



$stado_salida = 0;

if ($fecha2_of < $fecha2) {
  $stado_salida = 1;//salida bien extras
  $total_h_extras = $total_h_extras + $totalHoras_3x;
 echo 'horas extras?c: '.$total_h_extras.'<br><br>';
}
else{$stado_salida = 0;//salida temprano
  $total_h_tardes = $total_h_tardes + $totalHoras_3x;
   echo 'horas tardes?: '.$total_h_tardes.'<br><br>';
}








?>



<br>
<br>
<br>
<br>
<br>
<br>
<h3>---------------------- fin calculos de prueba------------------ </h3>