<?php
session_start();
include_once('../database.php');

if (isset($_POST['edit'])) {

	// Associative array to map business enterprises to codes
	$businessCodes = [
		"Rice Production" => "Agri-01",
		"Farm Machineries- Harvester" => "Agri-02",
		"Farm Machineries- Rotovator" => "Agri-03",
		"Turmeric Egg" => "Agri-04",
		"Fishpond Production" => "Agri-05",
		"Hatchery" => "Agri-06",
		"Swine Production" => "Agri-07",
		"Poultry Production-small ruminants" => "Agri-08",
		"Mango Production" => "Agri-09",
		"Vegetable Production" => "Agri-10"
	];

	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
	$created_at = $_POST['created_at'];
	$product_name = $_POST['product_name'];
	$business_enterprise = $_POST['business_enterprise'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$ornumber = $_POST['ornumber'];

	// Check if business_enterprise is a valid key in $businessCodes
	if (array_key_exists($business_enterprise, $businessCodes)) {
		// Check if total amount is 0 and ornumber is not empty
		$totalAmount = $quantity * $amount;
		$code = (empty($ornumber) && $totalAmount == 0) ? $businessCodes[$business_enterprise] : '';
		$codeTrue = (!empty($ornumber) && $totalAmount == 0) ? $businessCodes[$business_enterprise] : '';

		$sql = "UPDATE credit_order SET created_at = '$created_at', fullname = '$fullname', 
				product_name = '$product_name', business_enterprise = '$business_enterprise', 
				code = '$code', quantity = '$quantity', amount = '$amount' WHERE id = '$id'";

		$sql2 = "UPDATE cash_order SET created_at = '$created_at', fullname = '$fullname', 
				product_name = '$product_name', business_enterprise = '$business_enterprise', 
				code = '$codeTrue', quantity = '$quantity', amount = '$amount', ornumber = '$ornumber' 
				WHERE id = '$id'";

		// Use for MySQLi OOP
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Data updated successfully in credit_order';
		} elseif ($conn->query($sql2)) {
			$_SESSION['success'] = 'Data updated successfully in cash_order';
		} else {
			$_SESSION['error'] = 'Something went wrong in updating data';
		}
	} else {
		$_SESSION['error'] = 'Invalid business enterprise';
	}
} else {
	$_SESSION['error'] = 'Select member to edit first';
}

header('location: account_receivables.php');
?>





<!-- sad -->


<?php
session_start();
include_once('../database.php');

if (isset($_POST['edit'])) {

	// Associative array to map business enterprises to codes
	$businessCodes = [
		"Rice Production" => "Agri-01",
		"Farm Machineries- Harvester" => "Agri-02",
		"Farm Machineries- Rotovator" => "Agri-03",
		"Turmeric Egg" => "Agri-04",
		"Fishpond Production" => "Agri-05",
		"Hatchery" => "Agri-06",
		"Swine Production" => "Agri-07",
		"Poultry Production-small ruminants" => "Agri-08",
		"Mango Production" => "Agri-09",
		"Vegetable Production" => "Agri-10"
	];

	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
	$created_at = $_POST['created_at'];
	$product_name = $_POST['product_name'];
	$business_enterprise = $_POST['business_enterprise'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$ornumber = $_POST['ornumber'];

	// Check if business_enterprise is a valid key in $businessCodes
	if (array_key_exists($business_enterprise, $businessCodes)) {
		// Check if total amount is 0 and ornumber is not empty
		$totalAmount = $quantity * $amount;
		$code = (empty($ornumber) && $totalAmount == 0) ? $businessCodes[$business_enterprise] : '';
		$codeTrue = (!empty($ornumber) && $totalAmount == 0) ? $businessCodes[$business_enterprise] : '';

		$sql = "UPDATE credit_order SET created_at = '$created_at', fullname = '$fullname', 
				product_name = '$product_name', business_enterprise = '$business_enterprise', 
				code = '$code', quantity = '$quantity', amount = '$amount' WHERE id = '$id'";

		$sql2 = "UPDATE cash_order SET created_at = '$created_at', fullname = '$fullname', 
				product_name = '$product_name', business_enterprise = '$business_enterprise', 
				code = '$codeTrue', quantity = '$quantity', amount = '$amount', ornumber = '$ornumber' 
				WHERE id = '$id'";

		// Use for MySQLi OOP
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Data updated successfully';
		} elseif ($conn->query($sql2)) {
			$_SESSION['success'] = 'Data Payed successfully';
		} else {
			$_SESSION['error'] = 'Something went wrong in updating data';
		}
	} else {
		$_SESSION['error'] = 'Invalid business enterprise';
	}
} else {
	$_SESSION['error'] = 'Select member to edit first';
}

header('location: account_receivables.php');
?>

