<?php
include '../include/conexion.php';

require "plantilla.php";

$sqlc = "SELECT g.id, gt.gasto_tipo_id, p.proveedor_id, g.descripcion_gasto, g.monto FROM gastos AS g AND gasto_tipo AS gt INNER JOIN proveedor AS p on  g.id";

// $sql = "SELECT g.fecha, t.descripcion, p.nombre, g.descripcion_gasto, g.monto FROM gastos AS g JOIN gasto_tipo AS t INNER JOIN proveedor AS p ON g.id='proveedor_id' AND g.id='gasto_tipo_id'";

// $resultado= $mysqli->query ($sql);

// $sql = "SELECT FROM gastos,

// proveedor.nombre as nombre_provee,
// gasto_tipo.descripcion as nombre_gasto

// FROM gastos  

// left join proveedor on proveedor.id = gastos.proveedor_id
// left join gasto_tipo on gasto_tipo.id = gastos.gasto_tipo_id

// where gastos.estado_registro = '1' ";

// $resultado = query("$sql");



$pdf = new PDF("P","mm", "Letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();
$pdf->SetFont("Arial","B", 12);


$pdf->SetFont("Arial","B", 9);

// $pdf->Cell(10,5,"Id",1,0,"C");
$pdf->Cell(20,5,"Fecha",1,0,"C");
$pdf->Cell(50,5,"Tipo de Gasto",1,0,"C");
$pdf->Cell(50,5,"Proveedor",1,0,"C");
$pdf->Cell(50,5,"Descripcion",1,0,"C");
$pdf->Cell(40,5,"Monto",1,1,"C");


$pdf->SetFont("Arial", 9);
while($fila=$resultado->fetch_assoc()){
	
// $pdf->Cell(50,5,$file[id],1,0,"C");
$pdf->Cell(50,5,$file[Fecha],1,0,"C");
$pdf->Cell(50,5,$file[gasto],1,0,"C");
$pdf->Cell(50,5,$file[proveedor],1,0,"C");
$pdf->Cell(50,5,$file[descriocion],1,0,"C");
$pdf->Cell(50,5,$file[monto],1,1,"C");
}

$pdf->Output();

$query = $conn->query($sql);
?>