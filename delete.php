<?php

	include("connection.php");
	
	if(isset($_GET['id']) != null) {
		// Delete the Selected Record
		$id = $_GET['id'];
		$DeleteQuery = "DELETE FROM leave_record WHERE Leave_Form_ID = '$id'";
		
		$result = mysqli_query($con, $DeleteQuery);
		if($result) {
			header("Location: report.php");
		}
			
	} else {
		// Redirect back to the previous Page
		header("Location: report.php");
	}

?>