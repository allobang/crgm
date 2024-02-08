<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cashier</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="crgm/main.css">
    <link rel="stylesheet" href="crgm/public/sys.css">


    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <style>
        .height10 {
            height: 10px;
        }

        .mtop10 {
            margin-top: 10px;
        }

        .modal-label {
            position: relative;
            top: 7px
        }

        .custom-btn {
            width: 100%;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="navbar__logo">
            <a href="crgm/crgmmain.php"><img src="images/logo.png" alt="ISU Logo"></a>
            <h3><a href="crgm/crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <!-- <li><a href="crgmmain.php">Home</a></li> -->

                <li class="menu__dropdown">
                    <a href="#">Expenses</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="crgm/expenses.php">Expenses</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="crgm/purchase_request.php" class="submenu-trigger">Purchase Request</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="crgm/sales.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="crgm/account_receivables.php" class="submenu-trigger">Account Receivables</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
                        <li><a href="crgm/reports/monthly.php">Monthly</a></li>
                        <li><a href="crgm/reports/quarterly.php">Quarterly</a></li>
                        <li><a href="crgm/reports/annually.php">Annually</a></li>
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
            <a href="logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>



    <div class="container">
        <div class="buttonx">
            <div class="row"
                style="display: flex; justify-content: space-between; align-items: center; padding: 10px; border-radius: 15px;">
                <h1 style="margin: 0; flex: 1; font-size: 54px;"><b>Cashier</b></h1>
                <div style="display: flex;">
                    <a href="#" data-toggle="modal" class="btn btn-warning" style="margin-left: 5px;"><span
                            class="glyphicon glyphicon-search"></span> Search</a>
                    <a href="#addnew" data-toggle="modal" class="btn btn-primary" style="margin-right: 5px;"><span
                            class="glyphicon glyphicon-plus"></span> Add</a>
                    <a href="print_pdf.php" class="btn btn-success" style="margin-left: 5px;"><span
                            class="glyphicon glyphicon-print"></span> PDF</a>
                    <a href="#" id="printButton" class="btn btn-info" style="margin-left: 5px;"><span
                            class="glyphicon glyphicon-print"></span> Print</a>

                </div>
            </div>
        </div>



        <div class="row">
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
                        <table id="myTable" class="custom-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Business Enterprise</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Total</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                include_once('database.php');
                                $sql = "SELECT * FROM credit_order";

                                //use for MySQLi-OOP
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo
                                        "<tr>
			<td>" . $row['fullname'] . "</td>
			<td>" . $row['created_at'] . "</td>
			<td>" . $row['product_name'] . "</td>
			<td>" . $row['business_enterprise'] . "</td>
			<td>" . $row['code'] . "</td>
			<td>" . $row['quantity'] . "</td>
			<td>" . $row['amount'] . "</td>
			<td>" . $row['ornumber'] . "</td>
			
			<td></td>
			
            <td>
            <a href='#edit_" . $row['id'] . "' class='btn btn-sm custom-btn btn-success' data-toggle='modal'>
                <span class='glyphicon glyphicon-edit'></span> Edit
            </a>
            <a href='#delete_" . $row['id'] . "' class='btn btn-sm custom-btn btn-danger' data-toggle='modal'>
                <span class='glyphicon glyphicon-trash'></span> Delete
            </a>
        </td>
        
		</tr>";
                                    include('edit_delete_modal.php');
                                }


                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include('add_modal.php') ?>

        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="datatable/jquery.dataTables.min.js"></script>
        <script src="datatable/dataTable.bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable();

                $(document).on('click', '.close', function () {
                    $('.alert').hide();
                })
            });
        </script>

        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- removing the jquery shows the search and entries but when I added it back 
it'll hides the latter but makes the table fit on the screen viewport -jomar -->

        <script>
            $(document).ready(function () {
                $('.submenu').hide();

                $('.submenu-trigger').click(function (e) {
                    e.preventDefault();
                    var $submenu = $(this).next('.submenu');
                    $('.submenu').not($submenu).hide();
                    $submenu.toggle();
                });

                $(document).click(function (e) {
                    if (!$(e.target).closest('.submenu-parent').length) {
                        $('.submenu').hide();
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#printButton").on("click", function () {
                    printPage();
                });

                function printPage() {
                    var printWindow = window.open('', '_blank');
                    printWindow.document.write('<html><head><title>Cashier</title>');
                    printWindow.document.write('<link rel="stylesheet" href="cashier.css">');
                    printWindow.document.write('<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">');
                    printWindow.document.write('<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">');
                    printWindow.document.write('<link rel="stylesheet" href="public/sys.css">');
                    printWindow.document.write('<style>/* Add more styles for printing here -jomar*/</style>');
                    printWindow.document.write('</head><body>');

                    printWindow.document.write(document.body.innerHTML);

                    // this code will hide these classes from print page -jomar
                    printWindow.document.write('<style>@media print { .navbar__menu, .navbar__signout, .buttonx, navbar__signout, #printButton, .datatable__filter, .dataTables_info, .dataTables_paginate { display: none; }}</style>');

                    printWindow.document.write('</body></html>');
                    printWindow.document.close();

                    printWindow.print();
                }
            });
        </script>



</body>

</html>