<?php

include '../include/conexion.php';

include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }

$titulo_pagina = "Categorias";
$titulo_modulo = "Categorias";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="categorias";
$campo0 = "id";
$campo1 = "categoria";
$campo2 = "usuario crea";
$campo3 = "fecha crea";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "categoria";
$dato2 = "usuario_crea";
$dato3 = "fecha_crea";




//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT * FROM ".$tabla;
$query = $conn->query($sql);





?>