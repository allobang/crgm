<?php

require_once('crgmclass.php');
$users = $crgm->getUsers();


$userdetails = $crgm->get_userdata();

if(isset($userdetails)){

    if($userdetails['access'] != "crgm"){

        header("Location: login.php");

    } 
        
}else{
        
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
        
      </ul>
    </nav>

    <a href="crgmmain.php"><img src="images/logo.png" alt="ISU Logo"></a>
    <h3><a href="crgmmain.php">CRGM Project-Based Monitoring and Management System</a></h3>
    <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
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

  <table class="table table-bordered table-striped table-hover">
        <thead class="table ">
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <!-- <th>Date</th> -->
                <th>Product Name</th>
                <th>Business Enterprise</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Payment</th>
                <!-- <th>Herbicide</th> -->

                <!-- <th><a href="add-data.php" class="btn btn-primary float-end">Add Data</a></th> -->
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <form action="code.php" method="POST">
                <tr>
                    <td><input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name"></td>
                    <!-- <td><input type="date" id="created_at" name="created_at"></td> -->
                    <!-- <td>////</td> -->
                    <td><input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name"></td>

                    <!-- <td><select class="form-control form-control-lg js-example-tags " name="product_name">
                            <option selected="selected">Sample1</option>
                            <option>Sample2</option>
                            <option>Sample3</option>
                            <option>Sample4</option>
                            <option>Sample5</option>
                        </select></td> -->
                    <td>
                        <div class="form-input">
                            <!-- <label class="access-label" align="center">Select Access</label> -->
                            <select id="mySelect" class="form-select form-control form-control-lg" name="business_enterprise" required>
                                <option selected>Please select</option>
                                <option value="Rice Production" >Rice Production</option>
                                <option value="Farm Machineries- Harvester ">Farm Machineries - Harvester</option>
                                <option value="Farm Machineries- Rotovator3">Farm Machineries - Rotovator</option>
                                <option value="Turmeric Egg">Turmeric Egg</option>
                                <option value="Fishpond Production">Fishpond Production</option>
                                <option value="Hatchery">Hatchery</option>
                                <option value="Swine Production">Swine Production</option>
                                <option value="Poultry Production-small ruminants">Poultry Production-small ruminants</option>
                                <option value="Mango Production">Mango Production</option>
                                <option value="Vegetable Production">Vegetable Production</option>

                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="1" />
                    </td>
                    <td><input type="text" class="form-control" id="exampleFormControlInput1" name="amount"
                            placeholder="Enter Amount"></td>
                    <td>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="cash" name="payment_type" value="cash" checked>
                            <label class="form-check-label" for="payment_type">
                            Cash
                            </label>
                        
                            <input class="form-check-input" type="radio" id="Credit"name="payment_type" value="credit">
                            <label class="form-check-label" for="payment_type">
                            Credit
                            </label>
                        </div>

                        <!-- <div class="form-check">
                            <input type="radio" class="form-check-input" id="defaultCheck1 cash" name="payment"
                                value="Cash">
                            <label for="cash">Cash</label><br>
                            <input type="radio" class="form-check-input" id="defaultCheck1 credit" name="payment"
                                value="Credit">
                            <label for="credit">Credit</label><br>
                        </div> -->

                    </td>
                    <td><button type="submit" name="confirm_data" value=""
                            class="btn btn-success ">Confirm</button>
                        </td>
                            <!-- <td><input type="submit" value="Confirm"></td> -->

                    
                </tr>
            </form>

    </table>

    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        document.getElementById("mySelect").options[0].disabled = true;
    </script>

 

  <script src="script.js"></script>
</body>
</html>
