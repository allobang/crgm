<?php
include_once('../../database.php');

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Perform the delete operation
    $query = "DELETE FROM cash_order WHERE id = '$deleteId'";
    if ($conn->query($query)) {
        echo "Delete successful";
    } else {
        echo "Error deleting data";
    }
} else {
    echo "Invalid request";
}
?>

