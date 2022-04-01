<?php

//include '../include/conexion.php';

include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/bodega/proyecto/index.php');   }


$titulo_pagina = "Dashboard - Ventas";
$titulo_modulo = "Dasboard - Ventas";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar


//$sql = "SELECT * FROM usuarios WHERE usuario_tipo_id = 2 ";
$sql = "SELECT count(*) as totalr  FROM `facturas` ";

$oquery = $conn->query($sql);
$resultado = $oquery->fetch_assoc();
$totalr =  $resultado['totalr'];




$nombres = array();
$ventas = array();


//$sql = "SELECT * FROM usuarios WHERE usuario_tipo_id = 2 ";
$sql = "SELECT count(*) as tpacientes,usuarios.nombre FROM `facturas` inner join pacientes on pacientes.id = facturas.paciente_id inner join usuarios on usuarios.id = pacientes.promotor_id group by pacientes.promotor_id, usuarios.nombre";

$oquery = $conn->query($sql);
while($resultado = $oquery->fetch_assoc()){
$nombre =  $resultado['nombre'];
$venta =  $resultado['tpacientes'];
array_push($nombres, $nombre);
array_push($ventas, $venta);
}

$nombres = json_encode($nombres);
$ventas = json_encode($ventas);
?>