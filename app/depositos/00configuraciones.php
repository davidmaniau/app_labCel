<?php
include '../include/conexion.php';

include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Depositos";
$titulo_modulo = "Depositos";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="depositos";
$campo0 = "id";
$campo1 = "Trabajador";
$campo2 = "Fecha";
$campo3 = "Destinatario";
$campo4 = "Banco";
$campo5 = "Numero Cuenta";
$campo6 = "Monto";
$campo7 = "Detalle";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "usuarios_id";
$dato2 = "fecha";
$dato3 = "nombre";
$dato4 = "banco";
$dato5 = "numero_cuenta";
$dato6 = "monto";
$dato7 = "detalle";

//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid,

".$tabla.".numero_cuenta as numero_cuenta_deposito


FROM ".$tabla." 

left join usuarios on usuarios.id = ".$tabla.".usuarios_id


where ".$tabla.".estado_registro = '1'";

$query = $conn->query($sql);


?>