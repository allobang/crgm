<?php
include_once('../../database.php');

if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];

    // Fetch the data for the specified ID
    $query = "SELECT * FROM cash_order WHERE id = '$editId'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Return the data as JSON
        echo json_encode($data);
    } else {
        echo "Error fetching data";
    }
} else {
    echo "Invalid request";
}
?>

