<?php

session_start();

require("../../database.php");

require_once('../../crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if (isset($userdetails)) {

    if ($userdetails['access'] != "crgm") {

        header("Location: ../login.php");

    }

} else {

    header("Location: ../login.php");


}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crgm_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM expenses_data WHERE business_enterprise LIKE :search OR expenses_description LIKE :search OR code LIKE :search";
$stmt = $conn->prepare($query);
$stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Expenses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../public/sys.css">


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
            <a href="../crgmmain.php"><img src="../../images/logo.png" alt="ISU Logo"></a>
            <h3><a href="../crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
        </div>

        <nav class="navbar__menu">
            <ul class="menu__list">
                <li><a href="../crgmmain.php">Home</a></li>

                <li class="menu__dropdown">
                    <a href="#">Expenses</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="../expenses.php">Expenses</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="../purchase_request.php" class="submenu-trigger">Purchase Request</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Collections</a>
                    <ul class="dropdown__list">
                        <li class="submenu-parent">
                            <a href="../sales.php">Sales</a>
                        </li>
                        <li class="menu__dropdown submenu-parent">
                            <a href="../account_receivables.php" class="submenu-trigger">Account Receivables</a>
                        </li>
                    </ul>
                </li>


                <li class="menu__dropdown">
                    <a href="#">Reports</a>
                    <ul class="dropdown__list">
                        <li><a href="../reports/monthly.php">Monthly</a></li>
                        <li><a href="../reports/quarterly.php">Quarterly</a></li>
                        <li><a href="../reports/annually.php">Annually</a></li>
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
            <a href="../../logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>

    <center><h1><strong>EXPENSES</strong></h1></center>

    



    <table class="table table-bordered table-striped table-hover">
        <thead class="table ">
            <tr>
                <th>Date</th>
                <th>Name of Project</th>
                <th>Expenses</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <form action="../code.php" method="POST">
                <tr>

                    <td><input type="date" name="created_at"></td>

                    <td>
                        <div class="form-input">
                            <select id="mySelect" class="form-select form-control form-control-lg"
                                name="business_enterprise" required>
                                <option selected>Please select</option>
                                <option value="Rice Production">Rice Production - Agri-01</option>
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
                    <td><input type="text" class="form-control" id="expenses" name="expenses" placeholder="Enter Amount"></td>
                    <td>

                        <input type="text" name="expenses_description" id="expenses_description" class="form-control" />
                    </td>
                    <td><button type="submit" name="confirm_expenses" value="" class="btn btn-success ">Confirm</button>
                    </td>

                </tr>
            </form>

    </table>

    <br>

    
<!-- <h2>Search Data</h2> -->
    <form action="" method="get">
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" value="Search" class="btn btn-success ">
    </form>

    <table class="table table-bordered table-striped table-hover">
            <thead class="table ">
                <tr>

                <!-- <th>Name</th> -->
                    <th>Date</th>
                    <th>Name of Project</th>
                    <th>Code</th>
                    <th>Expenses</th>
                    <th>Description</th>
                    <th>
                        <center>Actions</center>
                    </th>

                </tr>
            </thead>
            <tbody >
            <?php foreach ($result as $data) : ?>
                <tr>
                    <!-- <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['business_enterprise']; ?></td>
                    <td><?php echo $row['code']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['totalAmount']; ?></td>
                    <td><?php echo $row['ornumber']; ?></td> -->
                    <?PHP echo
                        "
                                <td>" . $data['created_at'] . "</td>
                                <td>" . $data['business_enterprise'] . "</td>
                                <td>" . $data['code'] . "</td>
                                <td>" . $data['expenses'] . "</td>
                                <td>" . $data['expenses_description'] . "</td>




                                <td>
                                <a href='#edit_" . $data['id'] . "' class='btn btn-sm custom-btn btn-success' data-toggle='modal'>
                                    <span class='glyphicon glyphicon-edit'></span> Edit
                                </a>
                                <a href='#delete_" . $data['id'] . "' class='btn btn-sm custom-btn btn-danger' data-toggle='modal'>
                                    <span class='glyphicon glyphicon-trash'></span> Delete
                                </a>
                                </td>

                                

                        ";
                    include('edit_delete_modal.php');
                    ?>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>










    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>



    <script src="../script.js"></script>
</body>

</html>