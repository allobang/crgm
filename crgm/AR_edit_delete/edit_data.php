<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <!-- css bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        

        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            include("../database.php");
            $sql = "SELECT * FROM credit_order WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        }
        ?>

        <!-- main -->
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Business Enterprise</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>OR#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name" value="<?php echo $row["fullname"]; ?>">
                    </td>
                    <td>
                        <input type="date" class="form-control" id="date" name="created_at"
                            value="<?php echo $row["created_at"]; ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name" value="<?php echo $row["product_name"]; ?>">
                    </td>
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
                                <!-- ... options ... -->
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="1"
                                value="<?php echo $row["quantity"]; ?>">
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="amount"
                            placeholder="Enter Amount" value="<?php echo $row["amount"]; ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="ornumber" name="ornumber"
                            value="<?php echo $row["ornumber"]; ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </td>
                    <td>
                        <!-- ... radio buttons ... -->
                        <div class="form-element">
                            <button type="submit" name="edit" class="btn btn-success">Confirm</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html>
