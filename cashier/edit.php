<?php
	session_start();
	include_once('../database.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$date = $_POST['date'];
		$ornumber = $_POST['ornumber'];
		$fullname = $_POST['fullname'];
		$rice = $_POST['rice'];
		$poultry = $_POST['poultry'];
		$large_ruminants = $_POST['large_ruminants'];
		$aqua_culture = $_POST['aqua_culture'];
		$id_fee = $_POST['id_fee'];
		$id_lace = $_POST['id_lace'];
		$hard_bound = $_POST['hard_bound'];
		$cottage_dorm = $_POST['cottage_dorm'];
		$sablay = $_POST['sablay'];
		$cap_gown = $_POST['cap_gown'];
		$deposit = $_POST['deposit'];
		$disallowance = $_POST['disallowance'];
		$fin_assistance = $_POST['fin_assistance'];
		$internet_subsc = $_POST['internet_subsc'];

		$sql = "UPDATE cashier_data SET date = '$date', ornumber = '$ornumber', fullname = '$fullname', rice = '$rice', poultry = '$poultry', large_ruminants = '$large_ruminants', aqua_culture = '$aqua_culture', id_fee = '$id_fee', id_lace = '$id_lace', hard_bound = '$hard_bound', cottage_dorm = '$cottage_dorm', sablay = '$sablay', cap_gown = '$cap_gown', deposit = '$deposit', disallowance = '$disallowance', fin_assistance = '$fin_assistance', internet_subsc = '$internet_subsc' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Data updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating data';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: cashiermain.php');

?>