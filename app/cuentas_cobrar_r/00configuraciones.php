<?php
include '../include/conexion.php';


include '../include/session.php';
  if($user['usuario_tipo_id'] == 1 || $user['usuario_tipo_id'] == 2 || $user['usuario_tipo_id'] == 3){    //$_SESSION['success'] = 'Usuarios con permisos!';
}
else{
  $_SESSION['error'] = 'Usuarios no cuenta con permisos!';
  header('location:/pixelasistencias/index.php');   }



  $titulo_pagina = "Cuentas por Cobrar - Recibo ";
  $titulo_modulo = "Cuentas por Cobrar - Recibo ";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="ventas";


$sql2x = "SELECT max(no_doc) as consecutivo FROM ".$tabla."  where ".$tabla.".estado_registro = '1' and  tipo_doc_id = 1 ";
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
// $sql = "SELECT *, ".$tabla.".id as empid,
// cliente.nombre as nombre_cliente,
// usuarios.nombre_completo as nombre_vendedor,
// ventas_doc_tipo.descripcion as doc_descrip,
// venta_tipo.descripcion as venta_descrip,
// forma_pago.descripcion as pago_descrip
// FROM ".$tabla."
// left join cliente on cliente.id = ".$tabla.".cliente_id
// left join usuarios on usuarios.id = ".$tabla.".vendedor_id
// left join ventas_doc_tipo on ventas_doc_tipo.id = ".$tabla.".tipo_doc_id
// left join venta_tipo on venta_tipo.id = ".$tabla.".venta_tipo_id
// left join forma_pago on forma_pago.id = ".$tabla.".forma_pago_id
// where ".$tabla.".estado_registro = '1' and tipo_doc_id = 1
// order by ".$tabla.".fecha desc
// ";

//$query = $conn->query($sql);






      $to = date('Y-m-d');//inicio se la fecha actual
       // $from = date('Y-m-d', strtotime('-15 day', strtotime($to)));
        $from = date('Y-m-d');//final del rango sea la fecha actual

        if (isset($_GET['range'])) {
          $range = $_GET['range'];
          $ex = explode(' - ', $range);
          $from = date('Y-m-d', strtotime($ex[0]));
          $to = date('Y-m-d', strtotime($ex[1]));

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
          where ".$tabla.".estado_registro = '1' and tipo_doc_id = 1
               and ".$tabla.".fecha between '$from' AND '$to'
          order by ".$tabla.".fecha desc
          ";

          //echo $sql.'   SQL1' ;

        }

        else{

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
          where ".$tabla.".estado_registro = '1' and tipo_doc_id = 1
               and ".$tabla.".fecha between '$from' AND '$to'
          order by ".$tabla.".fecha desc
          ";
         // echo $sql.'   SQL2' ;
        }
        //toda la data a mostrar en la tabla de registros previamente guardados
        $query = $conn->query($sql);
        while($row1 = $query->fetch_assoc()){

         $tablax  = "ventas_detalle";
         $sql2x = "SELECT IfNull(sum(".$tablax.".total),0) as totalr, ".$tablax.".venta_id as empid2, ventas.id as empid, IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$row1['no_doc']." and ventas_detalle_abonos.tipo_doc_id = 1) ,0)
           as totalAbonos, (IfNull( sum(total),0)) - IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$row1['no_doc']." and ventas_detalle_abonos.tipo_doc_id = 1) ,0)
           as pendiente FROM ".$tablax."
           INNER JOIN ventas on ventas.no_doc = ventas_detalle.venta_id
           where ".$tablax.".venta_id = ".$row1['no_doc']." and ventas.tipo_doc_id = 1 and ".$tablax.".tipo_doc_id = 1 ";

           $query2x = $conn->query($sql2x);
           $row2x = $query2x->fetch_assoc();
           $total_detalles=$row2x['totalr']+$total_detalles;
           $total_abonos=$row2x['totalAbonos']+$total_abonos;
           $total_pendiente=$row2x['pendiente']+$total_pendiente;


         }

         //echo $sql2x;














       ?>