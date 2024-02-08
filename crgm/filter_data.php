<?php
// Include the database connection
include('../../database.php');

// Check if the query parameter is set
if (isset($_POST['query'])) {
    // Get the SQL query from the AJAX request
    $query = $_POST['query'];

    // Execute the query
    $query_run = mysqli_query($conn, $query);

    // Check if there are rows in the result
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $data) {
            ?>
            <tr>
                <td><?= $data['fullname']; ?></td>
                <td><?= $data['created_at']; ?></td>
                <td><?= $data['product_name']; ?></td>
                <td><?= $data['business_enterprise']; ?></td>
                <td><?= $data['code']; ?></td>
                <td><?= $data['quantity']; ?></td>
                <td><?= $data['amount']; ?></td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='7'>No Record Found</td></tr>";
    }
} else {
    // If the query parameter is not set, return an error message
    echo "Error: No query parameter set";
}
?>
