<?php

session_start();

require("../../database.php");

// require_once('../crgmclass.php');
// $users = $crgm->getUsers();


// $userdetails = $crgm->get_userdata();

// if (isset($userdetails)) {

//     if ($userdetails['access'] != "cashier") {

//         header("Location: ../login.php");

//     }

// } else {

//     header("Location: ../login.php");
// }
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
            <a href="crgmmain.php"><img src="../../images/logo.png" alt="ISU Logo"></a>
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

            </ul>
        </nav>

        <div class="navbar__signout">
            <a href="../logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>
    <hr>

    <center>
        <h1><strong>ACCOUNT RECEIVABLES</strong></h1>
    </center>



    <label for="selectCategory">Select Category:</label>
    <select id="selectCategory" class="form-select form-control form-control-lg" onchange="showHideTable()">
        <option value="all">All Categories</option>
        <option value="riceProduction">Rice Production</option>
        <option value="machineriesHarvester">Farm Machineries - Harvester</option>
        <option value="machineriesRotovator">Farm Machineries - Rotovator</option>
        <option value="turmericEgg">Turmeric Egg</option>
        <option value="fishpondProduction">Fishpond Production</option>
        <option value="hatchery">Hatchery</option>
        <option value="swineProduction">Swine Production</option>
        <option value="poultryProduction">Poultry Production-small ruminants</option>
        <option value="mangoProduction">Mango Production</option>
        <option value="vegetableProduction">Vegetable Production</option>


        <!-- Add more options as needed -->
    </select>

    <div class="container">




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
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Business Enterprise</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                    <th>
                                        <center>Actions</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include_once('../../database.php');
                                $sql = "SELECT * FROM credit_order ORDER BY created_at DESC";



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
                                        <td>" . $row['totalAmount'] . "</td>
			                            
			
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
        <!-- <?php include('add_modal.php') ?> -->

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






        <script>


            function filterData() {
                var selectedMonth = document.getElementById("selectMonth").value;

                $.ajax({
                    type: "POST",
                    url: "collectionsAR/fetch_monthly_data.php", // Replace with the actual filename where you put the PHP code
                    data: { selectedMonth: selectedMonth },
                    success: function (response) {
                        $("#monthlyData").html(response);
                    }
                });
            }


        </script>




        <!-- Add a search bar -->


        <script>
            function filterNames() {
                var input, filter, table, tbody, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("monthlyData");
                tbody = table.getElementsByTagName("tbody")[0];
                tr = tbody.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0]; // Index 0 corresponds to the Name column
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>


        <div id="riceProduction" class="hidden table-container">


            <!-- Your table code here -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>
                        <th>Name</th>
                        <th>Date
                            <select id="selectMonth" class="form-select form-control" onchange="filterData()">
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
                        </th>
                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="monthlyData">
                    <?php

                    $query = "SELECT *, (quantity * amount) AS totalAmount FROM credit_order WHERE business_enterprise='Rice Production'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {
                            ?>
                            <tr>
                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
                                </td>
                                <td>
                                    <?= $data['totalAmount']; ?>
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


                function filterData() {
                    var selectedMonth = document.getElementById("selectMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedMonth: selectedMonth },
                        success: function (response) {
                            $("#monthlyData").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="machineriesHarvester" class="hidden table-container">


            <!-- Your table code here -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectHarvesterMonth" class="form-select form-control"
                                onchange="filterDataHarvester()">
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
                        </th>
                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataHarvester">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Farm Machineries- Harvester'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
                                </td>
                                <td></td>
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


                function filterDataHarvester() {
                    var selectedHarvesterMonth = document.getElementById("selectHarvesterMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_harvester_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedHarvesterMonth: selectedHarvesterMonth },
                        success: function (response) {
                            $("#monthlyDataHarvester").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="machineriesRotovator" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">



                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectRotovatorMonth" class="form-select form-control"
                                onchange="filterDataRotovator()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataRotovator">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Farm Machineries- Rotovator'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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


                function filterDataRotovator() {
                    var selectedRotovatorMonth = document.getElementById("selectRotovatorMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_rotovator_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedRotovatorMonth: selectedRotovatorMonth },
                        success: function (response) {
                            $("#monthlyDataRotovator").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="turmericEgg" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectTurmericEggMonth" class="form-select form-control"
                                onchange="filterDataTurmericEgg()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataTurmericEgg">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Turmeric Egg'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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


                function filterDataTurmericEgg() {
                    var selectedTurmericEggMonth = document.getElementById("selectTurmericEggMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_TurmericEgg_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedTurmericEggMonth: selectedTurmericEggMonth },
                        success: function (response) {
                            $("#monthlyDataTurmericEgg").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="fishpondProduction" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectFishpondProductionMonth" class="form-select form-control"
                                onchange="filterDataFishpondProduction()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataFishpondProduction">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Fishpond Production'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                function filterDataFishpondProduction() {
                    var selectedFishpondProductionMonth = document.getElementById("selectFishpondProductionMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_FishpondProduction_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedFishpondProductionMonth: selectedFishpondProductionMonth },
                        success: function (response) {
                            $("#monthlyDataFishpondProduction").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="hatchery" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectHatcheryMonth" class="form-select form-control"
                                onchange="filterDataHatchery()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataHatchery">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Hatchery'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                        url: "collectionsAR/fetch_Hatchery_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedHatcheryMonth: selectedHatcheryMonth },
                        success: function (response) {
                            $("#monthlyDataHatchery").html(response);
                        }
                    });
                }


            </script>
        </div>


        <div id="swineProduction" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectSwineProductionMonth" class="form-select form-control"
                                onchange="filterDataSwineProduction()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataSwineProduction">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Swine Production'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                function filterDataSwineProduction() {
                    var selectedSwineProductionMonth = document.getElementById("selectSwineProductionMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_SwineProduction_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedSwineProductionMonth: selectedSwineProductionMonth },
                        success: function (response) {
                            $("#monthlyDataSwineProduction").html(response);
                        }
                    });
                }


            </script>
        </div>


        <div id="poultryProduction" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectPoultryProductionMonth" class="form-select form-control"
                                onchange="filterDataPoultryProduction()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataPoultryProduction">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Poultry Production-small ruminants'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                function filterDataPoultryProduction() {
                    var selectedPoultryProductionMonth = document.getElementById("selectPoultryProductionMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_PoultryProduction_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedPoultryProductionMonth: selectedPoultryProductionMonth },
                        success: function (response) {
                            $("#monthlyDataPoultryProduction").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="mangoProduction" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectMangoProductionMonth" class="form-select form-control"
                                onchange="filterDataMangoProduction()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataMangoProduction">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Mango Production'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                function filterDataMangoProduction() {
                    var selectedMangoProductionMonth = document.getElementById("selectMangoProductionMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_MangoProduction_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedMangoProductionMonth: selectedMangoProductionMonth },
                        success: function (response) {
                            $("#monthlyDataMangoProduction").html(response);
                        }
                    });
                }


            </script>
        </div>

        <div id="vegetableProduction" class="hidden table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table ">
                    <tr>

                        <th>Name</th>
                        <th>Date
                            <select id="selectVegetableProductionMonth" class="form-select form-control"
                                onchange="filterDataVegetableProduction()">
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
                        </th>

                        <th>Product Name</th>
                        <th>Business Enterprise</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody id="monthlyDataVegetableProduction">
                    <?php
                    // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
                    
                    $query = "SELECT * FROM credit_order WHERE business_enterprise='Vegetable Production'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {

                            ?>
                            <tr>

                                <td>
                                    <?= $data['fullname']; ?>
                                </td>
                                <td>
                                    <?= $data['created_at']; ?>
                                </td>
                                <td>
                                    <?= $data['product_name']; ?>
                                </td>
                                <td>
                                    <?= $data['business_enterprise']; ?>
                                </td>
                                <td>
                                    <?= $data['code']; ?>
                                </td>
                                <td>
                                    <?= $data['quantity']; ?>
                                </td>
                                <td>
                                    <?= $data['amount']; ?>
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
                function filterDataVegetableProduction() {
                    var selectedVegetableProductionMonth = document.getElementById("selectVegetableProductionMonth").value;

                    $.ajax({
                        type: "POST",
                        url: "collectionsAR/fetch_VegetableProduction_monthly_data.php", // Replace with the actual filename where you put the PHP code
                        data: { selectedVegetableProductionMonth: selectedVegetableProductionMonth },
                        success: function (response) {
                            $("#monthlyDataVegetableProduction").html(response);
                        }
                    });
                }


            </script>
        </div>





        <!-- Add more div elements for other categories -->

        <script>
            function showHideTable() {
                var selectElement = document.getElementById('selectCategory');
                var selectedDivId = selectElement.value;

                // Hide all divs initially
                var allDivs = document.querySelectorAll('.table-container');
                allDivs.forEach(function (div) {
                    div.classList.add('hidden');
                });

                // Show the selected div
                if (selectedDivId !== 'all') {
                    var selectedDiv = document.getElementById(selectedDivId);
                    if (selectedDiv) {
                        selectedDiv.classList.remove('hidden');
                    }
                } else {
                    // allCategory.classList.remove('hidden');
                    // allCategory.style.display = "block";
                    setTimeout(function () {
                        location.reload()
                    }, 1)
                }
            }
        </script>


        <script src="../script.js"></script>
</body>

</html>