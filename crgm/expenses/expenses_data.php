<?php


// session_start();

// require("../../database.php");

// require_once('../../crgmclass.php');
// $users = $crgm->getUsers();


// $userdetails = $crgm->get_userdata();

// if (isset($userdetails)) {

//     if ($userdetails['access'] != "crgm") {

//         header("Location: ../../login.php");

//     }

// } else {

//     header("Location: ../../login.php");
// }



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

$query = "SELECT * FROM expenses_data WHERE business_enterprise LIKE :search";
$stmt = $conn->prepare($query);
$stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>

<head>
    <title>Expenses Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../public/sys.css">


    <!-- Bootstrap JS (jQuery is required) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->



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

        </nav>

        <div class="navbar__signout">
            <a href="../logout.php">
                <span class="glyphicon glyphicon-user"></span> Sign Out
            </a>
        </div>
    </header>

    <center>
        <h1><strong>EXPENSES</strong></h1>
    </center>






<!-- search -->



<h2>Search Data</h2>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" value="Search">
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




    <!-- 1 -->


    





    <script src="../script.js"></script>
</body>

</html>