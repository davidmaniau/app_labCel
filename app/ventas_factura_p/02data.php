<?php 
	include '../include/session.php';	

	if(isset($_POST['id'])&&isset($_POST['tabla'])){
		$tabla= $_POST['tabla'];
		$id = $_POST['id'];
		
		
		//$sql = "SELECT *, ".$tabla.".id as empid  FROM ".$tabla." WHERE ".$tabla.".id = '$id'";


		$sql = "SELECT *, ".$tabla.".id as empid,

cliente.nombre as nombre_cliente,
usuarios.nombre_completo as nombre_vendedor,

ventas_doc_tipo.descripcion as doc_descrip,

venta_tipo.descripcion as venta_descrip,
forma_pago.descripcion as pago_descrip

FROM ".$tabla."  



left join cliente on cliente.id = ".$tabla.".cliente_id
left join usuarios on usuarios.id = ".$tabla.".cliente_id
left join ventas_doc_tipo on ventas_doc_tipo.id = ".$tabla.".tipo_doc_id
left join venta_tipo on venta_tipo.id = ".$tabla.".venta_tipo_id
left join forma_pago on forma_pago.id = ".$tabla.".forma_pago_id

where ".$tabla.".estado_registro = '1'

and ".$tabla.".id = '$id'";



		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>