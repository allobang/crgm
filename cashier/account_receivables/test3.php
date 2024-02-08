<?php
session_start();
include_once('../database.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    // Get the current totalAmount from credit_order
    $queryTotalAmount = "SELECT totalAmount FROM credit_order WHERE id = '$id'";
    $resultTotalAmount = $conn->query($queryTotalAmount);

    if ($resultTotalAmount->num_rows > 0) {
        $row = $resultTotalAmount->fetch_assoc();
        $totalAmount = $row['totalAmount'];
    } else {
        echo "Error fetching totalAmount";
        exit();
    }

    // Extract other values from the form
    $fullname = $_POST["fullname"];
    $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $business_enterprise = $_POST["business_enterprise"];
    $quantity = $_POST["quantity"];
    $amount = $_POST["amount"];
    $toPay = $_POST["toPay"];
    $totals = $totalAmount - $toPay;
    $ornumber = $_POST["ornumber"];

    // Update totalAmount in credit_order
    $queryUpdateCreditOrder = "UPDATE credit_order SET totalAmount = '$totals' WHERE id = '$id'";
    if ($conn->query($queryUpdateCreditOrder) !== TRUE) {
        echo "Error updating totalAmount in credit_order: " . $conn->error;
        exit();
    }

    // Check if ornumber is not empty
    if (!empty($ornumber)) {
        // Prepare the query to insert into cash_order based on business_enterprise
        $queryInsertCashOrder = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) 
                                 VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code', '$quantity', '$amount', '$ornumber', '$totalAmount')";

        // Execute the SQL statement
        if ($conn->query($queryInsertCashOrder) !== TRUE) {
            echo "Error inserting into cash_order: " . $conn->error;
            exit();
        }
    }

    // Redirect to your desired page after processing
    header('Location: account_receivables.php');
} else {
    $_SESSION['error'] = 'Select Data to edit first';
    // header('Location: account_receivables.php');
}

$conn->close();
?>
