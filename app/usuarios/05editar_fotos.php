<?php
	include '../include/session.php';

	if(isset($_POST['upload'])){
		$empid = $_POST['id'];


		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
		}

		$sql = "UPDATE usuarios SET photo = '$filename' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Usuario photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}




	}
	else{
		$_SESSION['error'] = 'Select employee to update photo first';
	}

	header('location: 01index.php');
