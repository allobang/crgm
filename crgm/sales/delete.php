<?php
	session_start();
	include_once('../../database.php');

	if(isset($_GET['id'])){
     
		$query = "DELETE FROM cash_order WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($query)){
			$_SESSION['success'] = 'Data deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting data';
		}
	}
	else{
		$_SESSION['error'] = 'Select data to delete first';
	}

	header('location: sales.php');
?>