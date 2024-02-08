<?php
// fetch_monthly_data.php

include('../../../database.php');

try {
    $selectedVegetableProductionMonth = $_POST['selectedVegetableProductionMonth'];

    // Establish a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Customize your queries based on the selected month
    // Example: Query to fetch data for January
    $query = "SELECT * FROM cash_order WHERE business_enterprise='Vegetable Production' AND MONTH(created_at) = :selectedVegetableProductionMonth";

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':selectedVegetableProductionMonth', $selectedVegetableProductionMonth);
    $stmt->execute();

    // Fetch data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        foreach ($result as $data) {
            ?>
            <tr>
                <td><?= $data['fullname']; ?></td>
                <td><?= $data['created_at']; ?></td>
                <td><?= $data['product_name']; ?></td>
                <td><?= $data['business_enterprise']; ?></td>
                <td><?= $data['code']; ?></td>
                <td><?= $data['quantity']; ?></td>
                <td><?= number_format($data['amount'], 2, '.', ','); ?></td>
                <td><?= number_format($data['totalAmount'], 2, '.', ','); ?></td>
            </tr>
            <?php
        }
    } else {
        // echo "<h5> No Record Found </h5>";
    }
} catch (PDOException $e) {
    // Display an error message if connection or query fails
    echo "Connection failed: " . $e->getMessage();
} finally {
    // Close the database connection
    $conn = null;
}
?>
