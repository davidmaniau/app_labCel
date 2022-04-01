<?php
include '../include/conexion.php';
include '../include/session.php';

if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location: ../trabajadores/index.php');
}



$titulo_pagina = "Asistencias";
$titulo_modulo = "Asistencias";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="asistencias";

$campo0 = "id";
$campo1 = "Nombre<br>Trabajador";

$horario = "Horario";

$campo2 = "fecha<br>entrada";
$campo3 = "hora<br>entrada";
$campo4 = "estado<br>entrada";

$campo5 = "fecha<br>salida";
$campo6 = "hora<br>salida";
$campo7 = "estado<br>salida";

$campo8 = "horas<br>tardes";
$campo9 = "horas<br>extras";
$campo10 = "horas<br>trabajadas";



//titulos de los modales
$dato0 = "id";
$dato1 = "usuario_id";
$dato2 = "fecha";
$dato3 = "hora entrada";




//toda la data a mostrar en la tabla de registros previamente guardados

// $sql1v = "SELECT *, ".$tabla.".id as empid,
// usuarios.nombre_completo as nombre_completo2,
// concat(horarios.hora_inicio,' ',horarios.hora_final) as horarioempleado,
// horarios.hora_inicio as hora_entrada_of,
// horarios.hora_final as hora_salida_of

// FROM ".$tabla."

// left join usuarios on usuarios.id = ".$tabla.".usuario_id
// left join horarios on horarios.id = usuarios.horario_id

// order by ".$tabla.".fecha desc";

// $query1v = $conn->query($sql1v);





?>