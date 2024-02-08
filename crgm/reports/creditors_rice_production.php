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
            <a href="../crgmmain.php"><img src="../../images/logo.png" alt="ISU Logo"></a>
            <h3><a href="../crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <li><a href="../crgmmain.php">Home</a></li>

                <li class="menu__dropdown">
                    <a href="../expenses.php">Expenses</a>

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
        <h1><strong>MONTHLY CREDITORS</strong></h1>
    </center>

    <br>

    <div class="row">


        <a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span>
            PDF</a>
        <a href="export_excel.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span>
            Excel</a>
    </div>

    <br>

    <select id="selectHatcheryMonth" class="form-select form-control" onchange="filterDataHatchery()">
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



                <th>Date</th>
                <th>Name of Creditor</th>
                <th>Particulars</th>
                <th>Purpose</th>
                <th>QTY/kg</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody id="monthlyDataHatchery">
            <?php
            // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
            
            $query = "SELECT * FROM cash_order WHERE business_enterprise='Rice Production'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $data) {

                    ?>
                    <tr>
                        <td>
                            <?= $data['created_at']; ?>
                        </td>

                        <td>
                            <?= $data['fullname']; ?>
                        </td>

                        <td>
                            <?= $data['product_name']; ?>
                        </td>
                        <td>
                            <!-- <?= $data['business_enterprise']; ?> -->
                        </td>
                        
                        <td>
                            <?= $data['quantity']; ?>
                        </td>
                       
                        <td>
                            <?= number_format($data['totalAmount'], 2, '.', ','); ?>
                        </td>
                      
                    </tr>
                    <?php
                }
            } else {
                // echo "<h5> No Record Found </h5>";
            }
            ?>

        </tbody>
    </table>
    <script>
        function filterDataHatchery() {
            var selectedHatcheryMonth = document.getElementById("selectHatcheryMonth").value;

            $.ajax({
                type: "POST",
                url: "fetch_monthly_creditors_data.php", // Replace with the actual filename where you put the PHP code
                data: { selectedHatcheryMonth: selectedHatcheryMonth },
                success: function (response) {
                    $("#monthlyDataHatchery").html(response);
                }
            });
        }


    </script>

    <script src="../../script.js"></script>
</body>

</html>