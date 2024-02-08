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
            <a href="../crgmmain.php"><img src="../../images/logo.png" alt="ISU Logo"></a>
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


    <div class="row">
					
					
					<a href="annually_print_pdf.php" class="btn btn-success pull-right"><span
							class="glyphicon glyphicon-print"></span> PDF</a>
					<a href="annually_export_excel.php" class="btn btn-success pull-right"><span
							class="glyphicon glyphicon-print"></span> Excel</a>
				</div>
                <hr>

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
                <th>Code</th>
                <th>Business Enterprise</th>
                <th>Account Receivable</th>
                <th>Cash</th>
                <th>Sales</th>
                <th>Expenses</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody id="annualData">
            <!-- Data will be displayed here -->
            <?php
            try {
                // Establish a connection to the database using PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Your existing code for fetching data...
            

                $sql1 = "SELECT * FROM cash_order WHERE business_enterprise='Rice Production'";

                $query1 = $conn->query($sql1);

                $row1 = $query1->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery1 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Rice Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery1 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Rice Production'";

                $expensesQuery1 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Rice Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt1 = $conn->prepare($cashOrderQuery1);
                $cashOrderStmt1->execute();

                $creditOrderStmt1 = $conn->prepare($creditOrderQuery1);
                $creditOrderStmt1->execute();

                $expensesStmt1 = $conn->prepare($expensesQuery1);
                $expensesStmt1->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts1 = $cashOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts1 = $creditOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts1 = $expensesStmt1->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount1 = array_sum($cashAmounts1);
                $totalCreditAmount1 = array_sum($creditAmounts1);
                $totalSales1 = $totalCashAmount1 + $totalCreditAmount1;
                $totalExpensesAmount1 = array_sum($expensesAmounts1);

                $totalProfit1 = $totalSales1 - $totalExpensesAmount1;


                // echo "<tr>
                //         <td>{$row1['code']}</td>
                //         <td>{$row1['business_enterprise']}</td>
                //         <td>{$totalCreditAmount1}</td>
                //         <td>{$totalCashAmount1}</td>
                //         <td>{$totalSales1}</td>
                //         <td>{$totalExpensesAmount1}</td>
                //         <td>{$totalProfit1}</td>
                //         <!-- Add other columns as needed -->
                //     </tr>";
            
                echo "<tr>
                        <td>Agri-01</td>
                        <td>Rice Production</td>
                        <td>" . number_format($totalCreditAmount1, 2, '.', ',') . "</td>
                        <td>" . number_format($totalCashAmount1, 2, '.', ',') . "</td>
                        <td>" . number_format($totalSales1, 2, '.', ',') . "</td>
                        <td>" . number_format($totalExpensesAmount1, 2, '.', ',') . "</td>
                        <td>" . number_format($totalProfit1, 2, '.', ',') . "</td>
                    </tr>";


                // query 2
            
                $sql2 = "SELECT * FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'";

                $query2 = $conn->query($sql2);

                $row2 = $query2->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery2 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery2 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Harvester'";

                $expensesQuery2 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Harvester'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt2 = $conn->prepare($cashOrderQuery2);
                $cashOrderStmt2->execute();

                $creditOrderStmt2 = $conn->prepare($creditOrderQuery2);
                $creditOrderStmt2->execute();

                $expensesStmt2 = $conn->prepare($expensesQuery2);
                $expensesStmt2->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts2 = $cashOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts2 = $creditOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts2 = $expensesStmt2->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount2 = array_sum($cashAmounts2);
                $totalCreditAmount2 = array_sum($creditAmounts2);
                $totalSales2 = $totalCashAmount2 + $totalCreditAmount2;
                $totalExpensesAmount2 = array_sum($expensesAmounts2);

                $totalProfit2 = $totalSales2 - $totalExpensesAmount2;


                echo "<tr>
                            <td>Agri-02</td>
                            <td>Farm Machineries - Harvester</td>
                            <td>" . number_format($totalCreditAmount2, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount2, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales2, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount2, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit2, 2, '.', ',') . "</td>
                        </tr>";

                // query 3
            
                $sql3 = "SELECT * FROM cash_order WHERE business_enterprise='Farm Machineries- Rotovator'";

                $query3 = $conn->query($sql3);

                $row3 = $query3->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery3 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Rotovator'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery3 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Rotovator'";

                $expensesQuery3 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Rotovator'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt3 = $conn->prepare($cashOrderQuery3);
                $cashOrderStmt3->execute();

                $creditOrderStmt3 = $conn->prepare($creditOrderQuery3);
                $creditOrderStmt3->execute();

                $expensesStmt3 = $conn->prepare($expensesQuery3);
                $expensesStmt3->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts3 = $cashOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts3 = $creditOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts3 = $expensesStmt3->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount3 = array_sum($cashAmounts3);
                $totalCreditAmount3 = array_sum($creditAmounts3);
                $totalSales3 = $totalCashAmount3 + $totalCreditAmount3;
                $totalExpensesAmount3 = array_sum($expensesAmounts3);

                $totalProfit3 = $totalSales3 - $totalExpensesAmount3;


                echo "<tr>
                            <td>Agri-03</td>
                            <td>Farm Machineries - Rotovator</td>
                            <td>" . number_format($totalCreditAmount3, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount3, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales3, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount3, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit3, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 4
            




                $sql4 = "SELECT * FROM cash_order WHERE business_enterprise='Turmeric Egg'";

                $query4 = $conn->query($sql4);

                $row4 = $query4->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery4 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Turmeric Egg'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery4 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Turmeric Egg'";

                $expensesQuery4 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Turmeric Egg'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt4 = $conn->prepare($cashOrderQuery4);
                $cashOrderStmt4->execute();

                $creditOrderStmt4 = $conn->prepare($creditOrderQuery4);
                $creditOrderStmt4->execute();

                $expensesStmt4 = $conn->prepare($expensesQuery4);
                $expensesStmt4->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts4 = $cashOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts4 = $creditOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts4 = $expensesStmt4->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount4 = array_sum($cashAmounts4);
                $totalCreditAmount4 = array_sum($creditAmounts4);
                $totalSales4 = $totalCashAmount4 + $totalCreditAmount4;
                $totalExpensesAmount4 = array_sum($expensesAmounts4);

                $totalProfit4 = $totalSales4 - $totalExpensesAmount4;


                echo "<tr>
                            <td>Agri-04</td>
                            <td>Turmeric Egg</td>
                            <td>" . number_format($totalCreditAmount4, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount4, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales4, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount4, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit4, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 5
            
                $sql5 = "SELECT * FROM cash_order WHERE business_enterprise='Fishpond Production'";

                $query5 = $conn->query($sql5);

                $row5 = $query5->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery5 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Fishpond Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery5 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Fishpond Production'";

                $expensesQuery5 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Fishpond Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt5 = $conn->prepare($cashOrderQuery5);
                $cashOrderStmt5->execute();

                $creditOrderStmt5 = $conn->prepare($creditOrderQuery5);
                $creditOrderStmt5->execute();

                $expensesStmt5 = $conn->prepare($expensesQuery5);
                $expensesStmt5->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts5 = $cashOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts5 = $creditOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts5 = $expensesStmt5->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount5 = array_sum($cashAmounts5);
                $totalCreditAmount5 = array_sum($creditAmounts5);
                $totalSales5 = $totalCashAmount5 + $totalCreditAmount5;
                $totalExpensesAmount5 = array_sum($expensesAmounts5);

                $totalProfit5 = $totalSales5 - $totalExpensesAmount5;


                echo "<tr>
                            <td>Agri-05</td>
                            <td>Fishpond Production</td>
                            <td>" . number_format($totalCreditAmount5, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount5, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales5, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount5, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit5, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 6
            
                $sql6 = "SELECT * FROM cash_order WHERE business_enterprise='Hatchery'";

                $query6 = $conn->query($sql6);

                $row6 = $query6->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery6 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Hatchery'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery6 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Hatchery'";

                $expensesQuery6 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Hatchery'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt6 = $conn->prepare($cashOrderQuery6);
                $cashOrderStmt6->execute();

                $creditOrderStmt6 = $conn->prepare($creditOrderQuery6);
                $creditOrderStmt6->execute();

                $expensesStmt6 = $conn->prepare($expensesQuery6);
                $expensesStmt6->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts6 = $cashOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts6 = $creditOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts6 = $expensesStmt6->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount6 = array_sum($cashAmounts6);
                $totalCreditAmount6 = array_sum($creditAmounts6);
                $totalSales6 = $totalCashAmount6 + $totalCreditAmount6;
                $totalExpensesAmount6 = array_sum($expensesAmounts6);

                $totalProfit6 = $totalSales6 - $totalExpensesAmount6;


                echo "<tr>
                            <td>Agri-06</td>
                            <td>Hatchery</td>
                            <td>" . number_format($totalCreditAmount6, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount6, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales6, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount6, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit6, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 7
            
                $sql7 = "SELECT * FROM cash_order WHERE business_enterprise='Swine Production'";

                $query7 = $conn->query($sql7);

                $row7 = $query7->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery7 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Swine Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery7 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Swine Production'";

                $expensesQuery7 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Swine Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt7 = $conn->prepare($cashOrderQuery7);
                $cashOrderStmt7->execute();

                $creditOrderStmt7 = $conn->prepare($creditOrderQuery7);
                $creditOrderStmt7->execute();

                $expensesStmt7 = $conn->prepare($expensesQuery7);
                $expensesStmt7->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts7 = $cashOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts7 = $creditOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts7 = $expensesStmt7->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount7 = array_sum($cashAmounts7);
                $totalCreditAmount7 = array_sum($creditAmounts7);
                $totalSales7 = $totalCashAmount7 + $totalCreditAmount7;
                $totalExpensesAmount7 = array_sum($expensesAmounts7);

                $totalProfit7 = $totalSales7 - $totalExpensesAmount7;


                echo "<tr>
                            <td>Agri-07</td>
                            <td>Swine Production</td>
                            <td>" . number_format($totalCreditAmount7, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount7, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales7, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount7, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit7, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 8
            
                $sql8 = "SELECT * FROM cash_order WHERE business_enterprise='Poultry Production-small ruminants'";

                $query8 = $conn->query($sql8);

                $row8 = $query8->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery8 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Poultry Production-small ruminants'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery8 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Poultry Production-small ruminants'";

                $expensesQuery8 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Poultry Production-small ruminants'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt8 = $conn->prepare($cashOrderQuery8);
                $cashOrderStmt8->execute();

                $creditOrderStmt8 = $conn->prepare($creditOrderQuery8);
                $creditOrderStmt8->execute();

                $expensesStmt8 = $conn->prepare($expensesQuery8);
                $expensesStmt8->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts8 = $cashOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts8 = $creditOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts8 = $expensesStmt8->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount8 = array_sum($cashAmounts8);
                $totalCreditAmount8 = array_sum($creditAmounts8);
                $totalSales8 = $totalCashAmount8 + $totalCreditAmount8;
                $totalExpensesAmount8 = array_sum($expensesAmounts8);

                $totalProfit8 = $totalSales8 - $totalExpensesAmount8;


                echo "<tr>
                            <td>Agri-08</td>
                            <td>Poultry Production-small ruminants</td>
                            <td>" . number_format($totalCreditAmount8, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount8, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales8, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount8, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit8, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 9
            
                $sql9 = "SELECT * FROM cash_order WHERE business_enterprise='Mango Production'";

                $query9 = $conn->query($sql9);

                $row9 = $query9->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery9 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Mango Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery9 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Mango Production'";

                $expensesQuery9 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Mango Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt9 = $conn->prepare($cashOrderQuery9);
                $cashOrderStmt9->execute();

                $creditOrderStmt9 = $conn->prepare($creditOrderQuery9);
                $creditOrderStmt9->execute();

                $expensesStmt9 = $conn->prepare($expensesQuery9);
                $expensesStmt9->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts9 = $cashOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts9 = $creditOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts9 = $expensesStmt9->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount9 = array_sum($cashAmounts9);
                $totalCreditAmount9 = array_sum($creditAmounts9);
                $totalSales9 = $totalCashAmount9 + $totalCreditAmount9;
                $totalExpensesAmount9 = array_sum($expensesAmounts9);

                $totalProfit9 = $totalSales9 - $totalExpensesAmount9;


                echo "<tr>
                            <td>Agr-09</td>
                            <td>Mango Production</td>
                            <td>" . number_format($totalCreditAmount9, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount9, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales9, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount9, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit9, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 10
            

                $cashOrderQuery10 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Vegetable Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery10 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Vegetable Production'";

                $expensesQuery10 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Vegetable Production'";


                // Prepare and execute the query
            




                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt10 = $conn->prepare($cashOrderQuery10);
                $cashOrderStmt10->execute();

                $creditOrderStmt10 = $conn->prepare($creditOrderQuery10);
                $creditOrderStmt10->execute();

                $expensesStmt10 = $conn->prepare($expensesQuery10);
                $expensesStmt10->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts10 = $cashOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts10 = $creditOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts10 = $expensesStmt10->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount10 = array_sum($cashAmounts10);
                $totalCreditAmount10 = array_sum($creditAmounts10);
                $totalSales10 = $totalCashAmount10 + $totalCreditAmount10;
                $totalExpensesAmount10 = array_sum($expensesAmounts10);

                $totalProfit10 = $totalSales10 - $totalExpensesAmount10;


                echo "<tr>
                            <td>Agri-10</td>
                            <td>Vegetable Production</td>
                            <td>" . number_format($totalCreditAmount10, 2, '.', ',') . "</td>
                            <td>" . number_format($totalCashAmount10, 2, '.', ',') . "</td>
                            <td>" . number_format($totalSales10, 2, '.', ',') . "</td>
                            <td>" . number_format($totalExpensesAmount10, 2, '.', ',') . "</td>
                            <td>" . number_format($totalProfit10, 2, '.', ',') . "</td>
                            <!-- Add other columns as needed -->
                        </tr>";


                // Prepare and execute the query
            

                // Fetch data


                
            


            } catch (PDOException $e) {
                // Display an error message if connection or query fails
                echo "Connection failed: " . $e->getMessage();
            } finally {
                // Close the database connection
                $conn = null;
            }





            ?>


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