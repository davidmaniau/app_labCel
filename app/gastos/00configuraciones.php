<?php
include '../include/conexion.php';
include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta  permisos!';
  header('location:/pixelasistencias/index.php');   }

$titulo_pagina = "Gastos";
$titulo_modulo = "Gastos";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="gastos";
$campo0 = "id";
$campo1 = "Fecha";
$campo2 = "Tipo de Gasto";
$campo3 = "Proveedor";
$campo4 = "Descripción";
$campo5 = "Monto";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "fecha";
$dato2 = "gasto_tipo_id";
$dato3 = "proveedor_id";
$dato4 = "descripcion_gasto";
$dato5 = "monto";

//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid,

proveedor.nombre as nombre_provee,
gasto_tipo.descripcion as nombre_gasto

FROM ".$tabla."  

left join proveedor on proveedor.id = ".$tabla.".proveedor_id
left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id

where ".$tabla.".estado_registro = '1'";


$query = $conn->query($sql);

?>