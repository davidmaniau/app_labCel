<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:../trabajadores/index.php');   }



$titulo_pagina = "Usuarios";
$titulo_modulo = "Usuarios";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="usuarios";

$campo0 = "id";
$campo1 = "Nombre de usuario";
$campo2 = "Contraseña";
$campo3 = "Rol";
$campo4 = "Nombre";
$campo5 = "Cargo";
$campo6 = "Horario";


$campo8 = "usuario_tipo_id";

//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "username";
$dato2 = "password";
$dato3 = "rol_id";
$dato4 = "nombre_completo";
$dato5 = "cargo_id";
$dato6 = "horario_id";





//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, "
.$tabla.".id as empid,
roles.descripcion as rol_descrip,
cargos.descripcion as cargo_descrip

 FROM ".$tabla." 

left join roles on roles.id = ".$tabla.".rol_id
left join cargos on cargos.id = ".$tabla.".cargo_id
left join horarios on horarios.id = ".$tabla.".horario_id

 where ".$tabla.".estado_registro = '1'";


$query = $conn->query($sql);





?>