<?php
session_start();
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Input values
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];

    // Calculate total
    $total = $quantity * $amount;

    // Insert into credit_order
    $sql = "INSERT INTO credit_order (quantity, amount, total) VALUES ('$quantity', '$amount', '$total')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Data inserted successfully into credit_order';

        // Check if total becomes 0
        if ($total == 0) {
            // Get the last inserted ID
            $lastID = $conn->insert_id;

            // Transfer data to cash_order
            $sqlTransfer = "INSERT INTO cash_order (quantity, amount, total) SELECT quantity, amount, total FROM credit_order WHERE id = '$lastID'";
            if ($conn->query($sqlTransfer)) {
                $_SESSION['success'] .= ' and transferred to cash_order';
            } else {
                $_SESSION['error'] = 'Error transferring data to cash_order';
            }

            // Delete the record from credit_order
            $sqlDelete = "DELETE FROM credit_order WHERE id = '$lastID'";
            $conn->query($sqlDelete);
        }
    } else {
        $_SESSION['error'] = 'Error inserting data into credit_order';
    }

    header('location: your_page.php'); // Redirect to your desired page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate and Store</title>
</head>
<body>

<form method="POST" action="">
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>
    <br>

    <label for="amount">Amount:</label>
    <input type="number" name="amount" required>
    <br>

    <button type="submit">Calculate and Store</button>
</form>

</body>
</html>
