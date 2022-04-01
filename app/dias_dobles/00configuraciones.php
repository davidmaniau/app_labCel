<?php
//include '../include/conexion.php';
include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Dias dobles";
$titulo_modulo = "dias dobles";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="asistencias_dobles";
$campo0 = "id";
$campo1 = "Usuario";
$campo2 = "Fecha";
$campo3 = "Comentario";


//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "usuario_id";
$dato2 = "fecha";
$dato3 = "comentario";


//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid
FROM ".$tabla."
left join usuarios on usuarios.id = ".$tabla.".usuario_id";

$query = $conn->query($sql);


?>