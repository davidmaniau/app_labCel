<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	
		$tabla = 'ventas_detalle';	

$venta_id = $_GET['doc'];//venta id
$producto_id = $_GET['id'];// producto id
		
		$sql17 = "SELECT costo2 as pu from producto WHERE producto.id = ".$producto_id;
		$query17 = $conn->query($sql17);
		$row17 = $query17->fetch_assoc();


$pu = $row17['pu'];//20

$cant = '1'; //cant = 1
$descripcion = " "; //descrip = ""
$subt = $pu; //sub = pu 1*20=20
$impuesto = '0'; //impu = 0
$total = $pu; //total = pu=20

			
				$sql = "INSERT INTO ".$tabla."(venta_id, cant, producto_id,descripcion,pu,subt,impuesto,total,tipo_doc_id)
		VALUES ('$venta_id','$cant','$producto_id','$descripcion','$pu','$subt','$impuesto','$total','2')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	

	


	
	header('location: 01index.php?d='.$venta_id);
	
?>
