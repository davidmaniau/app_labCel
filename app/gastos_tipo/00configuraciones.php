<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Tipo de Gasto";
$titulo_modulo = "Tipo de Gasto";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="gasto_tipo";
// $campo0 = "id";
$campo1 = "Descripción";


//nombre de campos de la tabla
// $dato0 = "id";
$dato1 = "descripcion";

//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." where estado_registro = '1'";

$query = $conn->query($sql);


?>