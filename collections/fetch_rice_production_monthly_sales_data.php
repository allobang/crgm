<?php
// fetch_monthly_data.php

include('../../database.php');

try {
    $selectedMonth = $_POST['selectedMonthlySales'];

    // Establish a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Customize your queries based on the selected month
    // Example: Query to fetch data for January
    $cashOrderQuery = "SELECT amount FROM cash_order WHERE MONTH(created_at) = :selectedMonth";

    

    // Prepare and execute the query
    $cashOrderStmt = $conn->prepare($cashOrderQuery);
    $cashOrderStmt->bindParam(':selectedMonth', $selectedMonth);
    $cashOrderStmt->execute();

    $creditOrderStmt = $conn->prepare($creditOrderQuery);
    $creditOrderStmt->bindParam(':selectedMonth', $selectedMonth);
    $creditOrderStmt->execute();

    $expensesStmt = $conn->prepare($expensesQuery);
    $expensesStmt->bindParam(':selectedMonth', $selectedMonth);
    $expensesStmt->execute();

    // Fetch data
    $cashAmounts = $cashOrderStmt->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts = $creditOrderStmt->fetchAll(PDO::FETCH_COLUMN);
    $expensesAmounts = $expensesStmt->fetchAll(PDO::FETCH_COLUMN);

    // Calculate total and display results in an HTML table
    $totalCashAmount = array_sum($cashAmounts);
    $totalCreditAmount = array_sum($creditAmounts);
    $totalAmount = $totalCashAmount + $totalCreditAmount;
    $totalExpensesAmount = array_sum($expensesAmounts);
    echo "<tr>";
    echo "<td>" . $totalCashAmount . "</td>";
    echo "<td>" . $totalCreditAmount . "</td>";
    echo "<td>" . $totalAmount . "</td>";
    echo "<td>" . $totalExpensesAmount . "</td>";
    echo "<td>" . '' . "</td>";
    // Repeat for other columns
    echo "</tr>";

} catch (PDOException $e) {
    // Display an error message if connection or query fails
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>