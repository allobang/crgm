<?php
session_start();
require("database.php");

require_once('crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if (isset($userdetails)) {

    if ($userdetails['access'] != "administrator") {

        header("Location: login.php");
    }
} else {

    header("Location: login.php");
}
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
                <li id="indvlmenu"><a href="main.php">Home</a></li>
                <li class="has-submenu" id="indvlmenu"><a href="#">Income Generating Enterprise</a>
                    <ul class="submenu">
                        <li  id="indvlmenu2"><a href="agri_based.php">Agri-Based Enterprise</a></li>
                        <li  id="indvlmenu2"><a href="#">Non Agri-Based Enterprise</a>
                            <!-- <ul class="submenu">
                                <li><a href="#">Rentals</a></li>
                                <li class="last-submenu"><a href="#"></a></li>
                            </ul> -->
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
                <!-- <li id="indvlmenu"><a href="create_new_menu_bar.php">Add</a></li>
                <li id="indvlmenu"><a href="">Update</a></li>
                <li id="indvlmenu"><a href="">Delete</a></li> -->
            </ul>
        </nav>

        <a href="main.php"><img src="images/logo.png" alt="ISU Logo"></a>
        <h3><a href="main.php">CRGM Project-Based Monitoring and Management System</a></h3>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li>
                    <a href="addnewuser.php">
                        <span class="glyphicon glyphicon-user"></span> Add User
                    </a>
                </li>
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


    





    <script src="script.js"></script>
</body>

</html>