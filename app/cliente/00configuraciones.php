<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Cliente";
$titulo_modulo = "Cliente";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="cliente";
$campo0 = "id";
$campo1 = "Nombre";
$campo2 = "RTN/DNI";
$campo3 = "Tipo de Cliente";
$campo4 = "Teléfono";
$campo5 = "Dirección";
$campo6 = "Email";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "nombre";
$dato2 = "rtn_dni";
$dato3 = "cliente_tipo_id";
$dato4 = "telefono";
$dato5 = "direccion";
$dato6 = "email";




//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid,

cliente_tipo.descripcion as cliente_tipo_id

FROM ".$tabla."  

left join cliente_tipo on cliente_tipo.id = ".$tabla.".cliente_tipo_id

where ".$tabla.".estado_registro = '1'";


$query = $conn->query($sql);

?>