<?php

session_start();

// require("../database.php");

// require_once('../crgmclass.php');
// $users = $crgm->getUsers();


// $userdetails = $crgm->get_userdata();

// if (isset($userdetails)) {

//     if ($userdetails['access'] != "crgm") {

//         header("Location: ../login.php");

//     }

// } else {

//     header("Location: ../login.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

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
                        <li id="indvlmenu2"><a href="agri_based_enterprise.php">Agri-Based Enterprise</a>

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
                        <li><a href="reports/monthly.php">Monthly</a></li>
                        <li><a href="#">Quarterly</a></li>
                        <li><a href="#">Annually</a></li>
                    </ul>
                </li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Account Receivables</a>
                    <ul class="submenu" id="indvlmenu2">
                        <li><a href="account_receivable/january_account_receivable.php">January</a></li>
                        <li><a href="account_receivable/february_account_receivable.php">February</a></li>
                        <li><a href="account_receivable/march_account_receivable.php">March</a></li>
                        <li><a href="account_receivable/april_account_receivable.php">April</a></li>
                        <li><a href="account_receivable/may_account_receivable.php">May</a></li>
                        <li><a href="account_receivable/june_account_receivable.php">June</a></li>
                        <li><a href="account_receivable/july_account_receivable.php">July</a></li>
                        <li><a href="account_receivable/august_account_receivable.php">August</a></li>
                        <li><a href="account_receivable/september_account_receivable.php">September</a></li>
                        <li><a href="account_receivable/october_account_receivable.php">October</a></li>
                        <li><a href="account_receivable/november_account_receivable.php">November</a></li>
                        <li><a href="account_receivable/december_account_receivable.php">December</a></li>
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
                    <a href="../logout.php">
                        <span class="glyphicon glyphicon-user"></span> Sign Out
                    </a>
                </li>
                <!-- Add Sign Out option -->
            </ul>
        </div>


    </header>



    <br>

   








    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="script.js"></script>
</body>

</html>