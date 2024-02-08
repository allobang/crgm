<?php
	session_start();
	include('../database.php');

	if(isset($_POST['edit'])){
		$code1 = "Agri-01";
    $code2 = "Agri-02";
    $code3 = "Agri-03";
    $code4 = "Agri-04";
    $code5 = "Agri-05";
    $code6 = "Agri-06";
    $code7 = "Agri-07";
    $code8 = "Agri-08";
    $code9 = "Agri-09";
    $code10 = "Agri-10";

	$code = $_POST["code"];

	$created_at = $_POST["created_at"];

    $fullname = $_POST["fullname"];
    $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $business_enterprise = $_POST["business_enterprise"];

    $quantity = $_POST["quantity"];
    $amount = $_POST["amount"];
    $ornumber = $_POST["ornumber"];



		
		$sql = "UPDATE credit_order SET firstname = '$fullname', created_at = '$created_at', product_name = '$product_name', business_enterprise = '$business_enterprise', quantity = '$quantity', amount = '$amount', ornumber = '$ornumber' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Data updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating Data';
		}
	}
	else{
		$_SESSION['error'] = 'Select Data to edit first';
	}

	header('location: account_receivables.php');

?>