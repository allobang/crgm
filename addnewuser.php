<?php

require_once('crgmclass.php');
$crgm->add_user();
$userdetails = $crgm->get_userdata();

if(isset($userdetails)){

    if($userdetails['access'] != "administrator"){

        header("Location: login.php");
    }
        
}else{
        // echo "failed";
    header("Location: login.php");
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css/addnewuser.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">

    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Log In</title>

    


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
                        <li class="has-has-submenu" id="indvlmenu2"><a href="#">Agri-Based Enterprise</a>
                            <ul class="submenu">
                                <li class="has-has-submenu"><a href="#">Rice Production</a>
                                    <ul class="submenu">
                                        <li class="has-has-submenu"><a href="riceprodwet.php">Wet</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="rice_production_wet_activities.php">Activities</a></li>
                                                <li class="last-submenu"><a href="rice_production_wet_expenses.php">Expenses</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-has-submenu"><a href="#">Dry</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="#">Activities</a></li>
                                                <li class="last-submenu"><a href="#">Expenses</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Farm Machineries</a>
                                    <ul class="submenu">
                                        <li class="has-has-submenu"><a href="#">Harvester</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="#">Activities</a></li>
                                                <li class="last-submenu"><a href="#">Expenses</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-has-submenu"><a href="#">Rotovator</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="#">Activities</a></li>
                                                <li class="last-submenu"><a href="#">Expenses</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Turmeric Egg</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Fishpond Production</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Hatchery</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Swine Production</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Poultry Production</a>
                                    <ul class="submenu">
                                        <li class="has-submenu"><a href="#">Small Ruminant</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="#">Activities</a></li>
                                                <li class="last-submenu"><a href="#">Expenses</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-has-submenu"><a href="#">Large Ruminant</a>
                                            <ul class="submenu">
                                                <li class="last-submenu"><a href="#">Activities</a></li>
                                                <li class="last-submenu"><a href="#">Expenses</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Mango Production</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="has-has-submenu"><a href="#">Vegetable Production</a>
                                    <ul class="submenu">
                                        <li class="last-submenu"><a href="#">Activities</a></li>
                                        <li class="last-submenu"><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                <li id="indvlmenu"><a href="create_new_menu_bar.php">Add</a></li>
                <li id="indvlmenu"><a href="">Update</a></li>
                <li id="indvlmenu"><a href="">Delete</a></li>
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

    <br>
    <br>





    <div class="login-container">
        <div  class="login">
            <p class='fas fa-user-alt'>Sign Up</p>
        </div>
        <div class="form-container">
            <form action="" method="post">
                <div class="form-input">
                    <label>First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter First Name">
                </div>

                <div class="form-input">
                    <label>Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
                </div>

                <div class="form-input">
                    <label>Mobile</label>
                    <input  type="text" name="mobile" id="mobile" autocomplete="off" placeholder="Enter Mobile">
                </div>

                <div class="form-input">
                    <label>Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter Address">
                </div>

                <div class="form-input">
                    <label>Email</label>
                    <input  type="email" name="email" id="email" autocomplete="off" placeholder="Enter Email">
                </div>

                <div class="form-input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password">
                </div>

                <div class="form-input">
                    <label class="access-label" align = "center">Select Access</label>
                    <select class="form-select" name="access">
                        <option selected>....</option>
                        <option value="administrator">Administrator</option>
                        <option value="crgm">CRGM</option>
                        <option value="cashier">Cashier</option>
                        <option value="accounting">Accounting</option>  
                        
                    </select>
                </div>
                <button type="submit" name="add" class="add-user">Add User</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    
</body>
</html>