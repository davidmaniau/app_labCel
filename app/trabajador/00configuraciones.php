<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



$titulo_pagina = "Trabajador";
$titulo_modulo = "Trabajador";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="trabajador";
$campo0 = "id";
$campo1 = "Nombre";
$campo2 = "Apellido";
$campo3 = "DNI";
$campo4 = "Cargo";
$campo5 = "Salario Mensual";
$campo6 = "N° Cuenta Banco";
$campo7 = "H. Entrada";
$campo8 = "H. Salida";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "nombre";
$dato2 = "apellido";
$dato3 = "dni";
$dato4 = "cargo_id";
$dato5 = "salario_mensual";
$dato6 = "numero_cuenta_banco";
$dato7 = "entrada";
$dato8 = "salida";


//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, "
.$tabla.".id as empid,
cargos.descripcion as cargo_id

 FROM ".$tabla." 

left join cargos on cargos.id = ".$tabla.".cargo_id

where ".$tabla.".estado_registro = '1'";


$query = $conn->query($sql);
?>