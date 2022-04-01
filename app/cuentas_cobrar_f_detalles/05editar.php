<?php
	include '../include/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id']; //id_detalle_venta
		$empid2 = $_POST['id2']; //id_venta

			$tabla = $_POST['tabla'];			
			$modulo = $_POST['modulo'];

		$producto_id = $_POST['producto_id'];
		$descripcion = $_POST['descripcion'];
		$cant = $_POST['cant'];	
                    
$precioU = $_POST['pu'];	



// $sql2H = "SELECT venta_tipo_id FROM ventas WHERE id = ".$producto_id.;
// $query2H = $conn->query($sql2H);
// $row2H = $query2H->fetch_assoc(); 
                    
// $tipoV = $row2H[venta_tipo_id];
                   

// $sql1H = "SELECT * FROM producto WHERE id = ".$producto_id." and estado_registro = 1";
// $query1H = $conn->query($sql1H);
// $row1H = $query1H->fetch_assoc(); 
                    
// $precioU = $row1H['costo2'];			
//         $pu = $precioU;
			
         $pu = $precioU;

$ancho = $_POST['ancho'];
$alto = $_POST['altura'];
$unidad_id = $_POST['unidad_id'];
$area = $_POST['area_pieza'];
$precio_pieza = $_POST['precio_pieza'];

if ($unidad_id==39.37) {
  $areax = ($alto*$unidad_id)*($ancho*$unidad_id);
}

if ($unidad_id==2.54) {
  $areax = ($alto/$unidad_id)*($ancho/$unidad_id);
}

if ($unidad_id==12.00) {
  $areax = ($alto*$unidad_id)*($ancho*$unidad_id);
}
if ($unidad_id==1.00) {
  $areax = ($alto*$unidad_id)*($ancho*$unidad_id);
}

		 $subt = $cant*$precio_pieza;
		 $impuesto = 0;
		 $total = $subt+$impuesto;

		$sql = "UPDATE ".$tabla." SET producto_id = '$producto_id', descripcion = '$descripcion',
		cant = '$cant', pu = '$pu',  impuesto = '$impuesto', total = '$total',
		ancho = '$ancho', alto = '$alto',unidad_id = '$unidad_id',area = '$areax',subt = '$precio_pieza', precio_pieza = '$precio_pieza'
		WHERE id = '$empid'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'actualizado con éxito ';//.$sql;
		}
		else{
			$_SESSION['error'] = $conn->error;//.$sql;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccionar  para editar primero';
	}	
	header('location: '.$modulo);
?>