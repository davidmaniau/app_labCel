<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Detalle Factura";
$titulo_modulo = "Detalle Factura";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla  = "ventas_detalle";

$campo0 = "id";
$campo1 = "no venta";
$campo2 = "cantidad";
$campo3 = "producto";
$campo4 = "descripcion";
$campo5 = "precio u";
$campo6 = "sub total";
$campo7 = "impuesto";
$campo8 = "total";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "venta_id";
$dato2 = "cant";
$dato3 = "producto_id";
$dato4 = "descripcion";
$dato5 = "pu";
$dato6 = "subt";
$dato7 = "impuesto";
$dato8 = "total";



//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid,
producto.descripcion as producto_descrip
FROM ".$tabla."  
left join producto on producto.id = ".$tabla.".producto_id 
";

$query = $conn->query($sql);

?>