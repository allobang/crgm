<?php
session_start();
include_once('../../database.php');

if (isset($_POST['edit'])) {

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

	$id = $_POST['id'];
	// $totalAmount = $_POST['totalAmount'];



	
	$queryTotalAmount = "SELECT totalAmount FROM credit_order WHERE id = '$id'";
    $resultTotalAmount = $conn->query($queryTotalAmount);

    if ($resultTotalAmount->num_rows > 0) {
        $row = $resultTotalAmount->fetch_assoc();
        $totalAmount = $row['totalAmount'];
    } else {
        echo "Error fetching totalAmount";
        exit();
    }

	$created_at = $_POST["created_at"];


	$fullname = $_POST["fullname"];
	$producto = $_POST["producto"];
	// $code = $_POST["code"]; 
	$business_enterprise = $_POST["business_enterprise"];

	$quantity = $_POST["quantity"];
	$amount = $_POST["amount"];
	$toPay = $_POST["toPay"];
	$totals = $totalAmount - $toPay;


	$ornumber = $_POST["ornumber"];



	if ($totalAmount > 0) {
		if (isset($_POST["toPay"])) {

			$query2 = "UPDATE credit_order SET totalAmount = '$totals', created_at = '$created_at' WHERE id = '$id'";

			if (isset($_POST["ornumber"]) && !empty($_POST["ornumber"])) {
				if ($business_enterprise == "Rice Production") {
					
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code1', '$quantity', '$amount', '$ornumber', '$toPay')";
					
					
				} elseif ($business_enterprise == "Farm Machineries- Harvester") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$productoproducto', '$business_enterprise', '$code2', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Farm Machineries- Rotovator") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code3', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Turmeric Egg") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code4', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Fishpond Production") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code5', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Hatchery") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code6', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Swine Production") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code7', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Poultry Production-small ruminants") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code8', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Mango Production") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code9', '$quantity', '$amount', '$ornumber', '$toPay')";
				} elseif ($business_enterprise == "Vegetable Production") {
					$query = "INSERT INTO accounting_credit_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', '$created_at', '$producto', '$business_enterprise', '$code10', '$quantity', '$amount', '$ornumber', '$toPay')";
				} else {
					echo "Error input";
				}
			}	
		}
	}elseif ($totalAmount <= 0){
		$query = "DELETE FROM `credit_order` WHERE `credit_order`.`id` = $id";

	}

	

	// Execute the SQL statement
	if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
		
		// echo "Payment confirmation saved successfully.";
		// Additional logic for successful payment confirmation saving

		
		
		header('Location: account_receivable.php');

		


	} else {
		echo "Error: " . $query . "or" . $query2 . "<br>" . $conn->error;
	}


	// Check if the payment_type field exists and is not empty
	// if (isset($_POST["ornumber"]) && !empty($_POST["ornumber"])) {



	// } else {
	// 	echo "Please select a payment confirmation.";
	// }
}

header('location: account_receivables.php');
?>