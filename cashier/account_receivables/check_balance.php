<?php
session_start();
include_once('../database.php');



$queryTotalAmount = "SELECT totalAmount FROM credit_order WHERE id = '$id'";
$resultTotalAmount = $conn->query($queryTotalAmount);

if ($resultTotalAmount->num_rows > 0) {
    $row = $resultTotalAmount->fetch_assoc();
    $totalAmount = $row['totalAmount'];
} else {
    echo "Error fetching totalAmount";
    exit();
}


if ($totalAmount == 0.00 ){
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







header('location: account_receivables.php');
?>