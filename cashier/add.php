<?php
	session_start();
	include_once('../database.php');

	if(isset($_POST['add'])){

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

		$sql = "INSERT INTO cashier_data (date, ornumber, fullname, rice, poultry, large_ruminants, aqua_culture, id_fee, id_lace, hard_bound, cottage_dorm, sablay, cap_gown, deposit, disallowance, fin_assistance, internet_subsc) VALUES ('$date', '$ornumber', '$fullname', '$rice', '$poultry', '$large_ruminants', '$aqua_culture', '$id_fee', '$id_lace', '$hard_bound', '$cottage_dorm', '$sablay', '$cap_gown', '$deposit', '$disallowance', '$fin_assistance', '$internet_subsc')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Data added successfully';
		}
		

		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: cashiermain.php');
?>
