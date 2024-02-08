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
    <?php

    include('../partials/header.php');

    ?>


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