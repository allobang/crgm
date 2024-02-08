<?php

session_start();

include('../database.php');

// require("database.php");

include('../crgmclass.php');

// require_once('crgmclass.php');
// $users = $crgm->getUsers();


// $userdetails = $crgm->get_userdata();

// if (isset($userdetails)) {

//     if ($userdetails['access'] != "cashier") {

//         header("Location: login.php");

//     }

// } else {

//     header("Location: login.php");
// }
?>



<!DOCTYPE html>
<html>

<head>
    <title>Monthly Reports</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">

    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</head>

<body>
<header class="rounded">
        <div class="hamburger-menu" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="menu">
            <ul class="main-menu">
                <li id="indvlmenu"><a href="../crgmmain.php">Home</a></li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Income Generating Enterprise</a>
                    <ul class="submenu">
                        <li id="indvlmenu2"><a href="../crgm_agri_based_enterprise.php">Agri-Based Enterprise</a>

                        </li>
                        <li class="has-has-submenu" id="indvlmenu2"><a href="#">Non Agri-Based Enterprise</a>
                            <ul class="submenu">
                                <li><a href="#">Rentals</a></li>
                                <li class="last-submenu"><a href="#"></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Reports</a>
                    <ul class="submenu" id="indvlmenu2">
                        <li><a href="../reports/crgm_monthly.php">Monthly</a></li>
                        <li><a href="#">Quarterly</a></li>
                        <li><a href="#">Annually</a></li>
                    </ul>
                </li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Account Receivables</a>
                    <ul class="submenu" id="indvlmenu2">
                    <li><a href="../crgm_account_receivable/january_account_receivable.php">January</a></li>
                    <li><a href="../crgm_account_receivable/february_account_receivable.php">February</a></li>
                    <li><a href="../crgm_account_receivable/march_account_receivable.php">March</a></li>
                    <li><a href="../crgm_account_receivable/april_account_receivable.php">April</a></li>
                    <li><a href="../crgm_account_receivable/may_account_receivable.php">May</a></li>
                    <li><a href="../crgm_account_receivable/june_account_receivable.php">June</a></li>
                    <li><a href="../crgm_account_receivable/july_account_receivable.php">July</a></li>
                    <li><a href="../crgm_account_receivable/august_account_receivable.php">August</a></li>
                    <li><a href="../crgm_account_receivable/september_account_receivable.php">September</a></li>
                    <li><a href="../crgm_account_receivable/october_account_receivable.php">October</a></li>
                    <li><a href="../crgm_account_receivable/november_account_receivable.php">November</a></li>
                    <li><a href="../crgm_account_receivable/december_account_receivable.php">December</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        <a href="../crgmmain.php"><img src="../images/logo.png" alt="ISU Logo"></a>
        <h3><a href="../crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <!-- Add Sign In and Sign Out options -->
                <li>
                    <a href="../logout.php">
                        <span class="glyphicon glyphicon-user"></span> Sign Out
                    </a>
                </li>
                <!-- Add Sign Out option -->
            </ul>
        </div>
    </header>


    <br>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table ">
            <tr>

                <th>Account Receivable</th>
                <th>Cash</th>
                <th>Sales</th>
                <th>Expenses</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody>
            <?php


            try {
                // Establish a connection to the database using PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                
                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Query to fetch 'amount' column from 'cash_order' table
                $cashOrderQuery = "SELECT amount FROM cash_order";
            
                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery = "SELECT amount FROM credit_order";
            
                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt = $conn->prepare($cashOrderQuery);
                $cashOrderStmt->execute();
            
                $creditOrderStmt = $conn->prepare($creditOrderQuery);
                $creditOrderStmt->execute();
            
                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts = $cashOrderStmt->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts = $creditOrderStmt->fetchAll(PDO::FETCH_COLUMN);
            
                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount = array_sum($cashAmounts);
                $totalCreditAmount = array_sum($creditAmounts);
                $totalAmount = $totalCashAmount + $totalCreditAmount;
            
                // Display results in an HTML table
                // echo "<table border='1'>";
                // echo "<tr><th>Amount of cash_order</th><th>Amount of credit_order</th><th>Total Amount</th></tr>";
                // echo "<tr><td>$totalCashAmount</td><td>$totalCreditAmount</td><td>$totalAmount</td></tr>";
                // echo "</table>";

                ?>
                <tr>
                    <td>
                        
                        <?php echo $totalCashAmount; ?>

                    </td>
                    <td>
                    <?php echo $totalCreditAmount; ?>
                    </td>
                    <td>
                    <?php echo $totalAmount; ?>
                    </td>
                    <td>
                        <!-- <?= $data['business_enterprise']; ?> -->
                    </td>
                    <td>
                        <!-- <?= $data['code']; ?> -->
                    </td>
                </tr>
                <?php
            
            } catch(PDOException $e) {
                // Display an error message if connection or query fails
                echo "Connection failed: " . $e->getMessage();
            }
            
            // Close the database connection
            $conn = null;



            ?>

        </tbody>
    </table>


    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="../script.js"></script>
</body>

</html>