<?php 
	include '../include/session.php';	

	if(isset($_POST['id'])&&isset($_POST['tabla'])){
		$tabla= $_POST['tabla'];
		$id = $_POST['id'];
		
		$sql = "SELECT *,".$tabla.".id as empid, concat(usuarios.nombre_completo) as nombreempleado, ".$tabla.".fecha as fecha1 FROM ".$tabla."
left join usuarios on usuarios.id = ".$tabla.".usuario_id
		   WHERE ".$tabla.".id = '$id'";


// $sql = "SELECT *, ".$tabla.".id as empid,
// concat(usuarios.nombres,' ',usuarios.apellidos) as nombreempleado,
// concat(horarios.hora_inicio,' ',horarios.hora_final) as horarioempleado,
// horarios.hora_inicio as hora_entrada_of

// FROM ".$tabla."

// left join usuarios on usuarios.id = ".$tabla.".usuario_id
// left join horarios on horarios.id = usuarios.horario_id  

// WHERE ".$tabla.".id = '".$id."'

// order by ".$tabla.".fecha desc";



		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>