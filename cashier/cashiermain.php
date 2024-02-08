<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Account Receivable</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <!-- <link rel="stylesheet" href="../public/sys.css"> -->


    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <link rel="stylesheet" href="cashier.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <link rel="stylesheet" href="public/sys.css">

    <!-- <style>
        .tables-container {
            display: none;
        }
    </style> -->

    <style>
        .hidden {
            display: none;
        }

        .visible {
            display: block;
        }
    </style>




</head>

<body>

    <header class="navbar">
        <div class="navbar__logo">
            <a href="#"><img src="../images/logo.png" alt="ISU Logo"></a>
            <h3><a href="#">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <!-- <li><a href="crgmmain.php">Home</a></li> -->

                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="agri_based_enterprise.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="#" class="submenu-trigger">Account Receivables</a>
                            <ul class="dropdown__list submenu" id="non-agri-submenu">
                                <li><a href="#">Rentals</a></li>
                                <li><a href="#">Item B</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
                        <li><a href="reports/monthly.php">Monthly</a></li>
                        <li><a href="#">Quarterly</a></li>
                        <li><a href="#">Annually</a></li>
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
                                    <th rowspan="3">Date</th>
                                    <th rowspan="3">O.R No.</th>
                                    <th rowspan="3">Name</th>
                                    <th rowspan="2">A. Crop Enterprises</th>
                                    <th colspan="3">B. Animal Enterprises</th>
                                    <th colspan="3" rowspan="2">C. Merchandising Enterprises</th>
                                    <th colspan="4" rowspan="2">D. Rentals</th>
                                    <th colspan="3" rowspan="2">E. Others</th>
                                    <th rowspan="3">Total</th>
                                </tr>
                                <tr>
                                    <th>Poultry</th>
                                    <th>Large Ruminants</th>
                                    <th>Aqua Culture</th>
                                </tr>

                                <tr>
                                    <th>Rice</th>
                                    <th>Cattle</th>
                                    <th>Swine</th>
                                    <th>Tilapia</th>
                                    <th>ID Fee</th>
                                    <th>ID Lace</th>
                                    <th>Hard Bound</th>
                                    <th>Cottage/Dorm</th>
                                    <th>Sablay</th>
                                    <th>Cap & Gown</th>
                                    <th>Deposit</th>
                                    <th>Disallowance</th>
                                    <th>Financial Assistance</th>
                                    <th>Internet Subsc</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include_once('../database.php');
                                $sql = "SELECT * FROM cashier_data";

                                //use for MySQLi-OOP
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo
                                        "<tr>
			<td>" . $row['date'] . "</td>
			<td>" . $row['ornumber'] . "</td>
			<td>" . $row['fullname'] . "</td>
			<td>" . $row['rice'] . "</td>
			<td>" . $row['poultry'] . "</td>
			<td>" . $row['large_ruminants'] . "</td>
			<td>" . $row['aqua_culture'] . "</td>
			<td>" . $row['id_fee'] . "</td>
			<td>" . $row['id_lace'] . "</td>
			<td>" . $row['hard_bound'] . "</td>
			<td>" . $row['cottage_dorm'] . "</td>
			<td>" . $row['sablay'] . "</td>
			<td>" . $row['cap_gown'] . "</td>
			<td>" . $row['deposit'] . "</td>
			<td>" . $row['disallowance'] . "</td>
			<td>" . $row['fin_assistance'] . "</td>
			<td>" . $row['internet_subsc'] . "</td>
			<td></td>
			
            <td>
            <a href='#edit_" . $row['id'] . "' class='btn btn-sm custom-btn btn-success' data-toggle='modal'>
                <span class='glyphicon glyphicon-edit'></span> Update
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