<?php 
	include '../include/session.php';	

	if(isset($_POST['id'])&&isset($_POST['tabla'])){
		$tabla= $_POST['tabla'];
		$id = $_POST['id'];
		
		
		//$sql = "SELECT *, ".$tabla.".id as empid  FROM ".$tabla." WHERE ".$tabla.".id = '$id'";


	$sql = "SELECT *, ".$tabla.".id as empid,

proveedor.nombre as nombre_provee,
gasto_tipo.descripcion as nombre_gasto

FROM ".$tabla."

left join proveedor on proveedor.id = ".$tabla.".proveedor_id
left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id

where ".$tabla.".estado_registro = '1' and ".$tabla.".id = '$id'";



		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>