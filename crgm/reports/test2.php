<?php
// Include your database connection file here
include_once '../../database.php';

// Define an array to store results for each business enterprise

// Define an array to store results for each business enterprise
$business_enterprise_results = array();

// Fetch data from cash_order and credit_order tables
$query_cash_order = "SELECT business_enterprise, SUM(totalAmount) AS total_sales FROM cash_order GROUP BY business_enterprise";
$query_credit_order = "SELECT business_enterprise, SUM(totalAmount) AS total_sales FROM credit_order GROUP BY business_enterprise";

$result_cash_order = mysqli_query($conn, $query_cash_order);
$result_credit_order = mysqli_query($conn, $query_credit_order);

// Calculate total sales for each business enterprise
while ($row_cash_order = mysqli_fetch_assoc($result_cash_order)) {
    $business_enterprise = $row_cash_order['business_enterprise'];
    $total_sales = $row_cash_order['total_sales'];
    if (!isset($business_enterprise_results[$business_enterprise])) {
        $business_enterprise_results[$business_enterprise] = array();
    }
    $business_enterprise_results[$business_enterprise]['sales'] = $total_sales;
}

while ($row_credit_order = mysqli_fetch_assoc($result_credit_order)) {
    $business_enterprise = $row_credit_order['business_enterprise'];
    $total_sales = $row_credit_order['total_sales'];
    if (!isset($business_enterprise_results[$business_enterprise])) {
        $business_enterprise_results[$business_enterprise] = array();
    }
    if (!isset($business_enterprise_results[$business_enterprise]['sales'])) {
        $business_enterprise_results[$business_enterprise]['sales'] = 0;
    }
    $business_enterprise_results[$business_enterprise]['sales'] += $total_sales;
}

// Fetch data from expenses_data table
$query_expenses_data = "SELECT business_enterprise, SUM(expenses) AS total_expenses FROM expenses_data GROUP BY business_enterprise";
$result_expenses_data = mysqli_query($conn, $query_expenses_data);

// Calculate total expenses for each business enterprise
while ($row_expenses_data = mysqli_fetch_assoc($result_expenses_data)) {
    $business_enterprise = $row_expenses_data['business_enterprise'];
    $total_expenses = $row_expenses_data['total_expenses'];
    if (!isset($business_enterprise_results[$business_enterprise])) {
        $business_enterprise_results[$business_enterprise] = array();
    }
    $business_enterprise_results[$business_enterprise]['expenses'] = $total_expenses;
}

// Calculate profit for each business enterprise
foreach ($business_enterprise_results as $business_enterprise => $result) {
    $sales = $result['sales'] ?? 0;
    $expenses = $result['expenses'] ?? 0;
    $profit = $sales - $expenses;
    $business_enterprise_results[$business_enterprise]['profit'] = $profit;
}

// Sort the results by profit (descending order)
arsort($business_enterprise_results);

// Display results for each business enterprise
foreach ($business_enterprise_results as $business_enterprise => $result) {
    echo "Business Enterprise: $business_enterprise<br>";
    echo "Sales: $" . $result['sales'] . "<br>";
    echo "Expenses: $" . $result['expenses'] . "<br>";
    echo "Profit: $" . $result['profit'] . "<br>";
    echo "<br>";
}
?>