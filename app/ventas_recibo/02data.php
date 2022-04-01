<?php 
include '../include/session.php';

if(isset($_POST['id'])&&isset($_POST['tabla'])){
	$tabla= $_POST['tabla'];
	$id = $_POST['id'];
	$tablax  = "ventas_detalle";

	$tablax  = "ventas_detalle";
	$sql = "SELECT IfNull(sum(".$tablax.".total),0) as totalr,
		".$tablax.".venta_id as empid2, ventas.id as empid,
		IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$id." and ventas_detalle_abonos.tipo_doc_id = 1) ,0)
		as totalAbonos, (IfNull( sum(total),0)) - IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$id." and ventas_detalle_abonos.tipo_doc_id = 1) ,0)
		as pendiente FROM ".$tablax."
		INNER JOIN ventas on ventas.no_doc = ventas_detalle.venta_id
		where ".$tablax.".venta_id = ".$id." and ventas.tipo_doc_id = 1 and ".$tablax.".tipo_doc_id = 1 ";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>