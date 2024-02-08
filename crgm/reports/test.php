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
    <title>Monthly Reports</title>
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
        <h1><strong>MONTHLY REPORTS</strong></h1>
    </center>

    <br>

    <select id="selectMonth" class="form-select form-control" onchange="filterData()">
        <option disabled selected>All Months</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
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
        <tbody id="monthlyData">
            <!-- Data will be displayed here -->
            <?php


            try {
                // "SELECT * FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'"   
            
                $code1_query = "SELECT * FROM cash_order WHERE code='Agri-01'";
                $code1_result = $conn->query($code1_query);

                if ($code1_result->num_rows > 0) {
                    $row = $code1_result->fetch_assoc();
                    $code1 = $row['code'];
                } else {
                    echo "Error fetching code";
                    exit();
                }

                $business_enterprise1 = "SELECT * FROM cash_order WHERE business_enterprise='Rice Production'";
                $business_enterprise1_result = $conn->query($business_enterprise1);

                if ($business_enterprise1_result->num_rows > 0) {
                    $row = $business_enterprise1_result->fetch_assoc();
                    $business_enterprise = $row['business_enterprise'];
                } else {
                    echo "Error fetching totalAmount";
                    exit();
                }


                // Establish a connection to the database using PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Query to fetch 'amount' column from 'cash_order' table
                $cashOrderQuery = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Rice Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Rice Production'";

                $expensesQuery = "SELECT expenses FROM expenses_data WHERE business_enterprise='Rice Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt = $conn->prepare($cashOrderQuery);
                $cashOrderStmt->execute();

                $creditOrderStmt = $conn->prepare($creditOrderQuery);
                $creditOrderStmt->execute();

                $expensesStmt = $conn->prepare($expensesQuery);
                $expensesStmt->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts = $cashOrderStmt->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts = $creditOrderStmt->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts = $expensesStmt->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount = array_sum($cashAmounts);
                $totalCreditAmount = array_sum($creditAmounts);
                $totalSales= $totalCashAmount + $totalCreditAmount;
                $totalExpensesAmount = array_sum($expensesAmounts);

                $totalProfit = $totalSales - $totalExpensesAmount;


                // Display results in an HTML table
                // echo "<table border='1'>";
                // echo "<tr><th>Amount of cash_order</th><th>Amount of credit_order</th><th>Total Amount</th></tr>";
                // echo "<tr><td>$totalCashAmount</td><td>$totalCreditAmount</td><td>$totalAmount</td></tr>";
                // echo "</table>";

                // query2

                
                ?>


                <tr>
                    <td>

                        <?php echo $code1; ?>

                    </td>
                    <td>

                        <?php echo $business_enterprise; ?>

                    </td>
                    <td>

                        <?php echo $totalCreditAmount; ?>

                    </td>
                    <td>
                        <?php echo $totalCashAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalSales; ?>
                    </td>
                    <td>
                        <?php echo $totalExpensesAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalProfit; ?>
                    </td>

                </tr>

                <!-- 2 -->
                <!-- <tr>
                    <td>

                        <?php echo $code1; ?>

                    </td>
                    <td>

                        <?php echo $business_enterprise; ?>

                    </td>
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
                        <?php echo $totalExpensesAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalProfit; ?>
                    </td>

                </tr> -->
                <?php

            } catch (PDOException $e) {
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

        function filterData() {
            var selectedMonth = document.getElementById("selectMonth").value;

            $.ajax({
                type: "POST",
                url: "fetch_monthly_data.php", // Replace with the actual filename where you put the PHP code
                data: { selectedMonth: selectedMonth },
                success: function (response) {
                    $("#monthlyData").html(response);
                }
            });
        }


    </script>

    <script src="../../script.js"></script>
</body>

</html>