<?php

//include '../include/conexion.php';

include '../include/session.php';
  if($user['usuario_tipo_id'] == 1  || $user['usuario_tipo_id'] == 5){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/bodega/proyecto/index.php');   }


$titulo_pagina = "Adelantos";
$titulo_modulo = "Adelantos";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="adelantos";

$campo0 = "Id";
$campo1 = "Fecha";
$campo2 = "Usuario";
$campo3 = "Monto";




//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "fecha";
$dato2 = "usuario_id";
$dato3 = "monto";







//toda la data a mostrar en la tabla de registros previamente guardados
$sqlnt = "SELECT *, ".$tabla.".id as idp FROM ".$tabla." inner join usuarios on usuarios.id = ".$tabla.".usuario_id ";

$query = $conn->query($sqlnt);





?>