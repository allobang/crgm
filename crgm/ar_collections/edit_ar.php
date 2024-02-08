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

	

	$created_at = $_POST["created_at"];


	$fullname = $_POST["fullname"];
	$product_name = $_POST["product_name"];
	// $code = $_POST["code"]; 
	$business_enterprise = $_POST["business_enterprise"];

	$quantity = $_POST["quantity"];
	$amount = $_POST["amount"];
	// $toPay = $_POST["toPay"];
	$totalAmount = $amount * $quantity;


	$ornumber = $_POST["ornumber"];

    if ($business_enterprise == "Rice Production") {

        // $query_run = mysqli_query($conn, $query);
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code1', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
        


        // $query = "UPDATE cash_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code1', quantity='$quantity', amount='$amount', ornumber='$ornumber', totalAmount='$totals' WHERE id='$id'";


        // $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code1', '$quantity', '$amount', '$ornumber', '$toPay')";
    } elseif ($business_enterprise == "Farm Machineries- Harvester") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code2', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Farm Machineries- Rotovator") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code3', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Turmeric Egg") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code4', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Fishpond Production") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code5', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Hatchery") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code6', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Swine Production") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code7', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Poultry Production-small ruminants") {
       $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code8', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Mango Production") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code9', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } elseif ($business_enterprise == "Vegetable Production") {
        $query = "UPDATE credit_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code10', quantity='$quantity', amount='$amount', totalAmount='$totalAmount' WHERE id='$id' ";
        
    } else {
        echo "Error input";
    }

    

    

    if ($conn->query($query) === TRUE) {
		header('Location: account_receivable.php');
		// echo "Payment confirmation saved successfully.";
		// Additional logic for successful payment confirmation saving
	} else {
		echo "Error: " . $query . "or" . $query2 . "<br>" . $conn->error;
	}

}



// if (isset($_POST['edit_sales'])) {

//     $codeMapping = [
//         "Rice Production" => "Agri-01",
//         "Farm Machineries- Harvester" => "Agri-02",
//         "Farm Machineries- Rotovator" => "Agri-03",
//         "Turmeric Egg" => "Agri-04",
//         "Fishpond Production" => "Agri-05",
//         "Hatchery" => "Agri-06",
//         "Swine Production" => "Agri-07",
//         "Poultry Production-small ruminants" => "Agri-08",
//         "Mango Production" => "Agri-09",
//         "Vegetable Production" => "Agri-10"
//     ];

//     $id = $_POST['id'];

//     $queryTotalAmount = "SELECT totalAmount FROM cash_order WHERE id = '$id'";
//     $resultTotalAmount = $conn->query($queryTotalAmount);

//     if ($resultTotalAmount->num_rows > 0) {
//         $row = $resultTotalAmount->fetch_assoc();
//         $totalAmount = $row['totalAmount'];
//     } else {
//         echo "Error fetching totalAmount";
//         exit();
//     }

//     $fullname = $_POST["fullname"];
//     $product_name = $_POST["product_name"];
//     $business_enterprise = $_POST["business_enterprise"];
//     $quantity = $_POST["quantity"];
//     $amount = $_POST["amount"];
//     $totals = $amount * $quantity;
//     $ornumber = $_POST["ornumber"];

//     if ($totalAmount > 0) {
//         if (isset($_POST["ornumber"]) && !empty($_POST["ornumber"])) {
//             $code = isset($codeMapping[$business_enterprise]) ? $codeMapping[$business_enterprise] : '';

//             if (!empty($code)) {
//                 $query = "UPDATE cash_order SET fullname='$fullname', created_at=NOW(),  product_name='$product_name', business_enterprise='$business_enterprise', code='$code', quantity='$quantity', amount='$amount', ornumber='$ornumber', totalAmount='$totals' WHERE id='$id'";
//             } else {
//                 echo "Error input";
//                 exit();
//             }
//         } else {
//             echo "Error input";
//             exit();
//         }
//     } elseif ($totalAmount <= 0) {
//         $query = "DELETE FROM `cash_order` WHERE `cash_order`.`id` = $id";
//     }

//     if ($conn->query($query) === TRUE) {
//         header('Location: sales.php');
//     } else {
//         echo "Error: " . $query . "<br>" . $conn->error;
//     }

//     if (!isset($_POST["ornumber"]) || empty($_POST["ornumber"])) {
//         echo "Please select a payment confirmation.";
//     }
// }

header('Location: account_receivables.php');
?>
