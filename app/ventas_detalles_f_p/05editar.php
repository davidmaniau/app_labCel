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
		 $subt = $cant*$pu;
		 $impuesto = '0.00';
		 $total = $subt;



		$sql = "UPDATE ".$tabla." SET producto_id = '$producto_id', descripcion = '$descripcion',
		cant = '$cant',
        pu = '$pu', subt = '$subt', impuesto = '$impuesto', total = '$total'
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