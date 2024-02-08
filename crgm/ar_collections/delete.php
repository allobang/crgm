<?php
	session_start();
	include_once('../../database.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM credit_order WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Data deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting data';
		}
	}
	else{
		$_SESSION['error'] = 'Select data to delete first';
	}

	header('location: account_receivables.php');
?>