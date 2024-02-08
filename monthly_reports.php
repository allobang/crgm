!<?php

session_start();

require("database.php");

require_once('crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if (isset($userdetails)) {

    if ($userdetails['access'] != "cashier") {

        header("Location: login.php");

    }

} else {

    header("Location: login.php");
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Cashier</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">

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
                <li id="indvlmenu"><a href="cashiermain.php">Home</a></li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Income Generating Enterprise</a>
                    <ul class="submenu">
                        <li id="indvlmenu2"><a href="#">Agri-Based Enterprise</a>

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
                        <li><a href="#">Monthly</a></li>
                        <li><a href="#">Quarterly</a></li>
                        <li><a href="#">Annually</a></li>
                    </ul>
                </li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Account Receivables</a>
                    <ul class="submenu" id="indvlmenu2">
                        <li><a href="#">January</a></li>
                        <li><a href="#">February</a></li>
                        <li><a href="#">March</a></li>
                        <li><a href="#">April</a></li>
                        <li><a href="#">May</a></li>
                        <li><a href="#">June</a></li>
                        <li><a href="#">July</a></li>
                        <li><a href="#">August</a></li>
                        <li><a href="#">September</a></li>
                        <li><a href="#">October</a></li>
                        <li><a href="#">November</a></li>
                        <li><a href="#">December</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        <a href="cashiermain.php"><img src="images/logo.png" alt="ISU Logo"></a>
        <h3><a href="cashiermain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <!-- Add Sign In and Sign Out options -->
                <li>
                    <a href="logout.php">
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
                
                <th>Name</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Business Enterprise</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Amount</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;

            $query = "SELECT * FROM november_reports_cash WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $data) {

            ?>
                    <tr>
                        
                        <td><?= $data['fullname']; ?></td>
                        <td><?= $data['created_at']; ?></td>
                        <td><?= $data['product_name']; ?></td>
                        <td><?= $data['business_enterprise']; ?></td>
                        <td><?= $data['code']; ?></td>
                        <td><?= $data['quantity']; ?></td>
                        <td><?= $data['amount']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
            ?>

        </tbody>
    </table>


    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="script.js"></script>
</body>

</html>