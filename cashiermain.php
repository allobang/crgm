<?php

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
    <title>CRGM</title>
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




	<div class="container" id="container" style="">
		<h1 class="page-header text-center">Cashier</h1>

		<div class="row">
			<div class="col-sm-12 col-sm-offset-0">

				<div class="row">
					<?php
					if (isset($_SESSION['error'])) {
						echo
							"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['error'] . "
					</div>
					";
						unset($_SESSION['error']);
					}
					if (isset($_SESSION['success'])) {
						echo
							"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['success'] . "
					</div>
					";
						unset($_SESSION['success']);
					}
					?>
				</div>

				<div class="row">
					
					<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span
							class="glyphicon glyphicon-plus"></span> Add</a>
					<a href="print_pdf.php" class="btn btn-success pull-right"><span
							class="glyphicon glyphicon-print"></span> PDF</a>
				</div>

				<div class="height10"></div>

				<div class="row">
					<table id="myTable" class="table table-bordered table-striped">
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
							include_once('database.php');
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
				<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
				<a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
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

	<!-- generate datatable on our table -->
	<script>
		$(document).ready(function () {
			//inialize datatable
			$('#myTable').DataTable();

			//hide alert
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
	</script>

	<script src="script.js"></script>

</body>

<!-- <footer><div class="PP"><p>By:<a href="https://www.jdmah.com/">Jimdel-Edu</a></p></div></footer> -->

<!-- <style>
.PP{
	text-align: center;
}
</style> -->



</html>