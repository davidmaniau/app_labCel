<?php

include '../include/conexion.php';
include '00configuraciones.php';


if(isset($_POST['abonar'])){
	$id = $_POST['id'];
	$id3 = $_POST['id3'];
	$tabla = $_POST['tabla'];
	$tabla1 = 'ventas_detalle_abonos';
	$modulo = $_POST['modulo'];

	$fecha1 = $_POST['fecha'];

	$fecha = date("Y-m-d", strtotime($fecha1) );
	$monto = str_replace(",", "" , $_POST['abono']);
	$venta_detalle_id = $id;
	$forma_pago = $_POST['forma_pago'];
	$tipo_doc_id = '1';//TIPO DOCUMENTO FACTURA

	$sql = "INSERT INTO ".$tabla1."(fecha,monto,venta_detalle_id,forma_pago,tipo_doc_id)
	VALUES ('$fecha','$monto','$venta_detalle_id','$forma_pago','$tipo_doc_id')";

	if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';//.$sql ;

	}
	else{ $_SESSION['error'] = $conn->error.$sql ; }
}
else{	$_SESSION['error'] = 'Fill up add form first';	}




header('location: '.$modulo);

?>
