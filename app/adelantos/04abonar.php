<?php
	//include 'includes/session.php';
	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";

	if(isset($_POST['editar2'])){
		$tabla = "facturas_abonos";

		$dato01 = $_POST['id'];
		//$dato02 = $_POST['id'];
		$dato03 = $_POST['abono'];

		$sql = "INSERT INTO ".$tabla."(factura_id,fecha,abono) VALUES ('$dato01',NOW(),'$dato03')";
		if($conn->query($sql))
			{ $_SESSION['success'] = ' añadido satisfactoriamente';


 $CONSULTA = "SELECT sum(abono) as tabonos FROM facturas_abonos where factura_id = ".$dato01;
      $EJECUTAR = $conn->query($CONSULTA);
      $RESPUESTA = $EJECUTAR->fetch_assoc();
      $tabonos =  $RESPUESTA['tabonos'];

      $CONSULTA = "SELECT costo as costox, IfNull(adelanto,0) as adelantox FROM facturas where id = ".$dato01;
      $EJECUTAR = $conn->query($CONSULTA);
      $RESPUESTA = $EJECUTAR->fetch_assoc();
      $costox =  $RESPUESTA['costox'];
      $adelantox =  $RESPUESTA['adelantox'];

      $saldox = $costox - $tabonos - $adelantox;

  $sql = "UPDATE facturas SET abonos = '$tabonos',saldo = '$saldox'  WHERE id = '$dato01'";

        if($conn->query($sql)){
            $_SESSION['success'] = 'actualizado con éxito '.$sql;
        }
        else{
            $_SESSION['error'] = $conn->error;//.$sql;
        }



	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first x';	}
	header('location: '.$modulo);
?>