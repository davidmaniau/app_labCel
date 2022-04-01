<?php 
	include '../include/session.php';	

	if(isset($_POST['id'])&&isset($_POST['tabla'])){
		$tabla= $_POST['tabla'];
		$id = $_POST['id'];
		
		
		//$sql = "SELECT *, ".$tabla.".id as empid  FROM ".$tabla." WHERE ".$tabla.".id = '$id'";


		$sql = "SELECT *, ".$tabla.".id as empid,
producto.descripcion as producto_descrip,

".$tabla.".descripcion as descripcion2


FROM ".$tabla."  
left join producto on producto.id = ".$tabla.".producto_id
left join unidades_medidas on unidades_medidas.factor_conversion = ".$tabla.".unidad_id

WHERE ".$tabla.".id = '$id'";




		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>