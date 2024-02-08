<?php
session_start();
require("database.php");

// require_once('crgmclass.php');
// $users = $crgm->getUsers();


// $userdetails = $crgm->get_userdata();

// if (isset($userdetails)) {

//     if ($userdetails['access'] != "administrator") {

//         header("Location: login.php");
//     }
// } else {

//     header("Location: login.php");
// }
?>


<!DOCTYPE html>
<html>

<head>
    <title>CRGM</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">

    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- <style>
        .tables-container {
            display: none;
        }
    </style> -->



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
                <li id="indvlmenu"><a href="crgmmain.php">Home</a></li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Income Generating Enterprise</a>
                    <ul class="submenu">
                        <li id="indvlmenu2"><a href="crgm_agri_based_enterprise.php">Agri-Based Enterprise</a>

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
                        <li><a href="reports/crgm_monthly.php">Monthly</a></li>
                        <li><a href="#">Quarterly</a></li>
                        <li><a href="#">Annually</a></li>
                    </ul>
                </li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Account Receivables</a>
                    <ul class="submenu" id="indvlmenu2">
                    <li><a href="crgm_account_receivable/january_account_receivable.php">January</a></li>
                    <li><a href="crgm_account_receivable/february_account_receivable.php">February</a></li>
                    <li><a href="crgm_account_receivable/march_account_receivable.php">March</a></li>
                    <li><a href="crgm_account_receivable/april_account_receivable.php">April</a></li>
                    <li><a href="crgm_account_receivable/may_account_receivable.php">May</a></li>
                    <li><a href="crgm_account_receivable/june_account_receivable.php">June</a></li>
                    <li><a href="crgm_account_receivable/july_account_receivable.php">July</a></li>
                    <li><a href="crgm_account_receivable/august_account_receivable.php">August</a></li>
                    <li><a href="crgm_account_receivable/september_account_receivable.php">September</a></li>
                    <li><a href="crgm_account_receivable/october_account_receivable.php">October</a></li>
                    <li><a href="crgm_account_receivable/november_account_receivable.php">November</a></li>
                    <li><a href="crgm_account_receivable/december_account_receivable.php">December</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        <a href="crgmmain.php"><img src="images/logo.png" alt="ISU Logo"></a>
        <h3><a href="crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
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

    <hr>

    <!-- 1 -->

    <?php

    include('agri_based_enterprise/rice_production.php');

    // echo '<hr>';
    echo '<hr>';

    include('agri_based_enterprise/farm_machineries_harvester.php');
    echo '<hr>';
    include('agri_based_enterprise/farm_machineries_rotovator.php');
    echo '<hr>';
    include('agri_based_enterprise/turmeric_egg.php');
    echo '<hr>';
    include('agri_based_enterprise/fishpond_production.php');
    echo '<hr>';
    include('agri_based_enterprise/hatchery.php');
    echo '<hr>';
    include('agri_based_enterprise/swine_production.php');
    echo '<hr>';
    include('agri_based_enterprise/poultry_production_small_ruminants.php');
    echo '<hr>';
    include('agri_based_enterprise/mango_production.php');
    echo '<hr>';
    include('agri_based_enterprise/vegetable_production.php');
    

    ?>

    <!-- 2 -->
    <br>
    <br>
    

   











    <script src="script.js"></script>
</body>

</html>