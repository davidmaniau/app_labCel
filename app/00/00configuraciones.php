<?php

include '../include/conexion.php';

include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/app/index.php');   }

$titulo_pagina = "Demostracion";
$titulo_modulo = "Demostracion";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="demostracion";
$campo0 = "id";
$campo1 = "campo1";
$campo2 = "campo2";
$campo3 = "campo3";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "dato1";
$dato2 = "dato2";
$dato3 = "dato3";




//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT * FROM ".$tabla;
$query = $conn->query($sql);





?>