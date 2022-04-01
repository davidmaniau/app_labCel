<?php
	include '../include/session.php';


 $nombres = array();

$sql = "SELECT count(*) as tpacientes,usuarios.nombre FROM `facturas` inner join pacientes on pacientes.id = facturas.paciente_id inner join usuarios on usuarios.id = pacientes.promotor_id group by pacientes.promotor_id, usuarios.nombre";


 //$sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($nombres, $oquery->num_rows);

		echo json_encode($nombres);

?>