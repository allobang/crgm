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
    <title>Purchase Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="public/sys.css">


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
            <a href="crgmmain.php"><img src="images/logo.png" alt="ISU Logo"></a>
            <h3><a href="crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <li><a href="crgmmain.php">Home</a></li>

                <li class="menu__dropdown">
                    <a href="#">Expenses</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="expenses.php">Expenses</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="purchase_request.php" class="submenu-trigger">Purchase Request</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="sales.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="account_receivables.php" class="submenu-trigger">Account Receivables</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
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

<center><h1><strong>PURCHASE REUQEST</strong></h1></center>


    <table class="table table-bordered table-striped table-hover">
        <thead class="table ">
            <tr>
                <th>Date</th>
                <th>Qty</th>
                <th>Unit of Issue</th>
                <th>Item Description</th>
                <th>Estimated Unit Cost</th>
                <th>Estimated Cost</th>
                <th>Purpose</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <form action="code.php" method="POST">
                <tr>

                    <td><input type="date" name="created_at"></td>

                    <td>
                        <div class="form-outline">
                            <input type="text" name="qty" id="qty" class="form-control" placeholder="1" />
                    </td>

                    <td><input type="text" class="form-control" id="unit_of_issue" name="unit_of_issue"></td
                    >
                    <td><input type="text" class="form-control" id="item_description" name="item_description"></td>

                    <td><input type="text" class="form-control" id="estimated_unit_cost" name="estimated_unit_cost"></td>

                    <td><input type="text" class="form-control" id="estimated_cost" name="estimated_cost"></td>

                    <td><input type="text" class="form-control" id="purpose" name="purpose"></td>

                    <td><button type="submit" name="confirm_purchase_request" value="" class="btn btn-success ">Confirm</button>
                    </td>

                </tr>
            </form>

    </table>

    <br>










    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="../script.js"></script>
</body>

</html>