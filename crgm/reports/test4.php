<?php

session_start();

require("../../database.php");

require_once('../../crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if (isset($userdetails)) {

    if ($userdetails['access'] != "crgm") {

        header("Location: ../../login.php");

    }

} else {

    header("Location: ../../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Annual Reports</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../public/sys.css">


    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>

<body>
    <header class="navbar">
        <div class="navbar__logo">
            <a href="../crgmmain.php"><img src="../images/logo.png" alt="ISU Logo"></a>
            <h3><a href="../crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <li><a href="../crgmmain.php">Home</a></li>

                <li class="menu__dropdown">
                    <a href="#">Expenses</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="../expenses.php">Expenses</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="../purchase_request.php" class="submenu-trigger">Purchase Request</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="../sales.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="../account_receivables.php" class="submenu-trigger">Account Receivables</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
                        <li><a href="monthly.php">Monthly</a></li>
                        <li><a href="quarterly.php">Quarterly</a></li>
                        <li><a href="annually.php">Annually</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        <div class="navbar__signout">
            <a href="../../logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>

    <center>
        <h1><strong>ANNUALLY REPORTS</strong></h1>
    </center>

    <br>

    <!-- Change the title to Annual Reports -->
    <title>Annual Reports</title>

    <!-- Update the select element to represent years -->
    <select id="selectYear" class="form-select form-control" onchange="filterData()">
        <option disabled selected>All Years</option>
        <!-- Add years dynamically based on your data -->
        <?php
        $currentYear = date("Y");
        $startYear = 2023; // Change this to the start year of your data
        for ($year = $startYear; $year <= $currentYear; $year++) {
            echo "<option value='$year'>$year</option>";
        }
        ?>
    </select>



    <table class="table table-bordered table-striped table-hover">
        <thead class="table ">
            <tr>
                <!-- <th>Code</th> -->
                <th>Business Enterprise</th>
                <!-- <th>Account Receivable</th> -->
                <!-- <th>Cash</th> -->
                <th>Sales</th>
                <th>Expenses</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody id="annualData">

        <tr>
            <!-- Data will be displayed here -->

            <?php
// Include your database connection file here
// include_once '../../database.php';

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

    echo "<tr>
                        
                        <td>$business_enterprise</td>
                        <td>{$result['sales'] }</td>
                        <td>{$result['expenses']}</td>
                        <td>{$result['profit']}</td>
                    </tr>";
                    

    
}
?>
</tr>
           


        </tbody>
    </table>

    <script>
        $(".js-example-tags").select2({
            tags: true
        });


        document.getElementById("mySelect").options[0].disabled = true;

        function filterData() {
            var selectedYear = document.getElementById("selectYear").value;

            $.ajax({
                type: "POST",
                url: "fetch_annual_data.php", // Replace with the actual filename where you put the PHP code
                data: { selectedYear: selectedYear },
                success: function (response) {
                    $("#annualData").html(response);
                }
            });
        }


    </script>

    <script src="../script.js"></script>
</body>

</html>