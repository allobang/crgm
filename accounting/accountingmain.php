<?php

session_start();

require("../database.php");

require_once('../crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if (isset($userdetails)) {

    if ($userdetails['access'] != "crgm") {

        header("Location: ../login.php");

    }

} else {

    header("Location: ../login.php");
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="public/sys.css">


    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        /* Reset some default styles for better consistency */
        body, ul, li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Main navigation styles */
        .menu__dropdown {
            position: relative;
            display: inline-block;
            margin-right: 20px; /* Adjust as needed */
        }

        .menu__dropdown a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            /* background-color: #eee; */
        }

        .dropdown__list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            /* background-color: #fff; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .submenu-parent:hover .dropdown__list {
            display: block;
        }

        /* Submenu styles */
        .submenu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            /* background-color: #fff; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .submenu-parent:hover .submenu {
            display: block;
        }

        .submenu a {
            color: #333;
            display: block;
            padding: 100px;
            text-decoration: none;
        }

        .submenu a:hover {
            background-color: black;
        }
    </style>

</head>



<body>

    <header class="navbar">
        <div class="navbar__logo">
            <a href="crgmmain.php"><img src="../images/logo.png" alt="ISU Logo"></a>
            <h3><a href="crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <!-- <li><a href="crgmmain.php">Home</a></li> -->

                <li class="menu__dropdown">
            <a href="#">Expenses</a>
            <ul class="dropdown__list">
                <li class="submenu-parent">
                    <a href="expenses/expenses.php">Expenses</a>
                    <!-- Sub-menu under Expenses -->
                    <!-- <ul class="submenu">
                        <li><a href="expenses/expenses_data.php">Data</a></li>
                        <li><a href="#">Submenu Item 2</a></li>
                        
                    </ul> -->
                </li>
                <li class="menu__dropdown submenu-parent">
                    <a href="purchase_request.php" class="submenu-trigger">Purchase Request</a>
                    <!-- Sub-menu under Purchase Request -->
                    <ul class="submenu">
                        <li><a href="#">Data</a></li>
                        <!-- <li><a href="#">Submenu Item 2</a></li> -->
                        <!-- Add more submenu items as needed -->
                    </ul>
                </li>
            </ul>
        </li>

                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="sales/sales.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="ar_collections/account_receivables.php" class="submenu-trigger">Account Receivables</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
                        <li><a href="reports/creditors_rice_production.php">Creditors</a></li>
                        <li><a href="reports/monthly.php">Monthly</a></li>
                        <li><a href="reports/quarterly.php">Quarterly</a></li>
                        <li><a href="reports/annually.php">Annually</a></li>
                    </ul>
                </li>

                


                <!-- <li class="menu__dropdown">
                    <a href="#">Account Receivables</a>
                    <ul class="dropdown__list">
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
                </li> -->
            </ul>
        </nav>

        <div class="navbar__signout">
            <a href="../logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>

    <center><h1><strong>TRANSACTIONS</strong></h1></center>





    <table class="table table-bordered table-striped table-hover">
    <div class="row">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['error'] . "
                </div>
                ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
                <div class='alert alert-success text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['success'] . "
                </div>
                ";
                    unset($_SESSION['success']);
                }
                ?>
            </div>
        <thead class="table ">
            <tr>
                <th>Customer Name</th>
                <th>Particulars</th>
                <th>Business Enterprise</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>OR#</th>
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <form action="code.php" method="POST">
                <tr>
                    <td><input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name"></td>
                    <td><input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Particulars"></td>
                    <td>
                        <div class="form-input">
                            <select id="mySelect" class="form-select form-control form-control-lg"
                                name="business_enterprise" required>
                                <option selected>Please select</option>
                                <option value="Rice Production">Rice Production</option>
                                <option value="Farm Machineries- Harvester">Farm Machineries - Harvester</option>
                                <option value="Farm Machineries- Rotovator">Farm Machineries - Rotovator</option>
                                <option value="Turmeric Egg">Turmeric Egg</option>
                                <option value="Fishpond Production">Fishpond Production</option>
                                <option value="Hatchery">Hatchery</option>
                                <option value="Swine Production">Swine Production</option>
                                <option value="Poultry Production-small ruminants">Poultry Production-small ruminants
                                </option>
                                <option value="Mango Production">Mango Production</option>
                                <option value="Vegetable Production">Vegetable Production</option>

                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="1" />
                    </td>
                    <td><input type="number" class="form-control" id="exampleFormControlInput1" name="amount"
                            placeholder="Enter Amount"></td>
                    <td>
                        
                        <input type="text" class="form-control" id="ornumber" name="ornumber" checked>


                        <!-- <div class="form-check">
                            <input type="radio" class="form-check-input" id="cash" name="payment_type" value="cash"
                                checked>
                            <label class="form-check-label" for="payment_type">
                                Cash
                            </label>

                            <input class="form-check-input" type="radio" id="Credit" name="payment_type" value="credit">
                            <label class="form-check-label" for="payment_type">
                                Credit
                            </label>
                        </div> -->

                    </td>
                    <td><button type="submit" name="confirm_data" value="" class="btn btn-success ">Confirm</button>
                    </td>

                </tr>
            </form>

    </table>



    <div class="row row-side ">
        <div class="col-custom">

            <div class="row">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['error'] . "
                </div>
                ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
                <div class='alert alert-success text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['success'] . "
                </div>
                ";
                    unset($_SESSION['success']);
                }
                ?>
            </div>

            <div class="height10"></div>

            <div class="row">
                <div class="table-container">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <strong><center><h2><strong>Recent Activities</strong></h2></center><br></strong>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Business Enterprise</th>
                                <th>Code</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Amount</th>
                                <th>OR NO#</th>
                                
                               
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            // include_once('../../database.php');
                            $sql = "SELECT * FROM cash_order ORDER BY created_at DESC  LIMIT 5";

                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while ($data = $query->fetch_assoc()) {
                                echo
                                    "<tr>
			<td>" . $data['fullname'] . "</td>
			<td>" . $data['created_at'] . "</td>
			<td>" . $data['product_name'] . "</td>
			<td>" . $data['business_enterprise'] . "</td>
			<td>" . $data['code'] . "</td>
			<td>" . $data['quantity'] . "</td>
            <td>" . number_format($data['amount'], 2, '.', ',') . "</td>
            <td>" . number_format($data['totalAmount'], 2, '.', ',') . "</td>
			<td>" . $data['ornumber'] . "</td>   
            
		</tr>";
                             
                            }

                            echo "<tr></tr>";

                            $sql2 = "SELECT * FROM credit_order ORDER BY created_at DESC  LIMIT 5";

                            //use for MySQLi-OOP
                            $query2 = $conn->query($sql2);
                            while ($data2 = $query2->fetch_assoc()) {
                                echo
                                    "<tr>
			<td>" . $data2['fullname'] . "</td>
			<td>" . $data2['created_at'] . "</td>
			<td>" . $data2['product_name'] . "</td>
			<td>" . $data2['business_enterprise'] . "</td>
			<td>" . $data2['code'] . "</td>
			<td>" . $data2['quantity'] . "</td>
            <td>" . number_format($data['amount'], 2, '.', ',') . "</td>
            <td>" . number_format($data['totalAmount'], 2, '.', ',') . "</td>
            <td></td>
			 
		</tr>";}


                            ?>

                        </tbody>


                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    










    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="../script.js"></script>
</body>

</html>