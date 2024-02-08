<?php
session_start();
require '../database.php';


if (isset($_POST['confirm_data'])) {

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

    


    $fullname = $_POST["fullname"];
    $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $business_enterprise = $_POST["business_enterprise"];

    $quantity = $_POST["quantity"];
    $amount = $_POST["amount"];
    $ornumber = $_POST["ornumber"];

    $ornumber_exists = false;
    $query = "SELECT * FROM cash_order WHERE ornumber = '$ornumber'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $ornumber_exists = true;
    }
    
    $totalAmount = $amount * $quantity;


    $currentDate = date('Y-m-d'); // You can use any format that contains month information

    // Format the date to extract the month
    $formattedDate = date('F', strtotime($currentDate)); // 'F' format returns the full month name

    // $checkDate = include('partials/credit_conditional_statements.php');

    // Depending on the selected payment type, insert into respective table
    if (isset($_POST["ornumber"]) && empty($_POST["ornumber"])) {

        include 'partials/credit_order.php';

    } elseif (isset($_POST["ornumber"]) && !empty($_POST["ornumber"]) && !$ornumber_exists) {

        include 'partials/cash_order.php';

    } else {
        $_SESSION['error'] = 'OR NO# is already Exist';
        header('Location: crgmmain.php');
        exit(); // Exit script if payment type is invalid or OR number already exists
    }

    // Execute the SQL statement
    if ($conn->query($query) === TRUE) {
        header('Location: crgmmain.php');
        // echo "Payment confirmation saved successfully.";
        // Additional logic for successful payment confirmation saving
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }


    // Check if the payment_type field exists and is not empty
    if (isset($_POST["ornumber"]) && !empty($_POST["ornumber"])) {



    } else {
        echo "Please select a payment confirmation.";
    }
}


if (isset($_POST['confirm_expenses'])) {

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


    $created_at = $_POST["created_at"];
    // $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $business_enterprise = $_POST["business_enterprise"];

    $expenses = $_POST["expenses"];

    $expenses_description = $_POST["expenses_description"];




    if ($business_enterprise == "Rice Production") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code1', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Farm Machineries- Harvester") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code2', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Farm Machineries- Rotovator") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code3', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Turmeric Egg") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code4', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Fishpond Production") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code5', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Hatchery") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code6', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Swine Production") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code7', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Poultry Production-small ruminants") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code8', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Mango Production") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code9', '$expenses', '$expenses_description')";
    } elseif ($business_enterprise == "Vegetable Production") {
        $query = "INSERT INTO expenses_data (created_at, business_enterprise, code, expenses, expenses_description) VALUES ('$created_at', '$business_enterprise', '$code10', '$expenses', '$expenses_description')";
    } else {
        echo "Error input";
    }



    // Execute the SQL statement
    if ($conn->query($query) === TRUE) {
        header('Location: expenses.php');
        // echo "Payment confirmation saved successfully.";
        // Additional logic for successful payment confirmation saving
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

} else {
    echo "Please select a payment confirmation.";
}


if (isset($_POST['confirm_purchase_request'])) {

    $created_at = $_POST["created_at"];
    // $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $qty = $_POST["qty"];

    $unit_of_issue = $_POST["unit_of_issue"];

    $item_description = $_POST["item_description"];
    $estimated_unit_cost = $_POST["estimated_unit_cost"];
    $estimated_cost = $_POST["estimated_cost"];
    $purpose = $_POST["purpose"];


    $query = "INSERT INTO purchase_request (created_at, qty, unit_of_issue, item_description, estimated_unit_cost, estimated_cost, purpose) VALUES ('$created_at','$qty','$unit_of_issue','$item_description','$estimated_unit_cost','$estimated_cost','$purpose')";


    if ($conn->query($query) === TRUE) {
        header('Location: purchase_request.php');
        // echo "Payment confirmation saved successfully.";
        // Additional logic for successful payment confirmation saving
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}




// Close the database connection
$conn->close();
?>