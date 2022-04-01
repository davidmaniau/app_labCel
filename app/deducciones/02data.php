<?php 
	include '../include/session.php';	

	if(isset($_POST['id'])&&isset($_POST['tabla'])){
		$tabla= $_POST['tabla'];
		$id = $_POST['id'];
		
		
		$sql = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." WHERE ".$tabla.".id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>