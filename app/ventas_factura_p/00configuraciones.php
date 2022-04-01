<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Cotizacion para Venta Factura ";
$titulo_modulo = "Cotizacion para Venta Factura ";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="ventas";


$sql2x = "SELECT max(no_doc) as consecutivo FROM ".$tabla."  where ".$tabla.".estado_registro = '1' and  tipo_doc_id = 2 ";
$query2x = $conn->query($sql2x);
$row2x = $query2x->fetch_assoc(); 
$doc = $row2x['consecutivo']+1;


$campo0 = "Doc";
$campo1 = "Fecha";
$campo2 = "Cliente";
$campo3 = "Vendedor";
$campo4 = "Tipo Venta";
$campo5 = "Tipo Doc";
$campo6 = "Forma Pago";
$campo7 = "Estado Detalle Venta";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "fecha";
$dato2 = "cliente_id";
$dato3 = "vendedor_id";
$dato4 = "venta_tipo_id";
$dato5 = "forma_pago_id";
$dato6 = "estado_registro";




//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid,

cliente.nombre as nombre_cliente,
usuarios.nombre_completo as nombre_vendedor,

ventas_doc_tipo.descripcion as doc_descrip,

venta_tipo.descripcion as venta_descrip,
forma_pago.descripcion as pago_descrip

FROM ".$tabla."  

left join cliente on cliente.id = ".$tabla.".cliente_id
left join usuarios on usuarios.id = ".$tabla.".vendedor_id
left join ventas_doc_tipo on ventas_doc_tipo.id = ".$tabla.".tipo_doc_id
left join venta_tipo on venta_tipo.id = ".$tabla.".venta_tipo_id
left join forma_pago on forma_pago.id = ".$tabla.".forma_pago_id

where ".$tabla.".estado_registro = '1' and tipo_doc_id = 2
order by ".$tabla.".fecha desc
";

$query = $conn->query($sql);

?>