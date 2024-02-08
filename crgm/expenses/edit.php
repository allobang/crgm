<?php
session_start();
include_once('../../database.php');


if (isset($_POST['edit_expenses'])) {

    $code1 = "Agri-01";
    $code2 = "Agri-02";
    $code3 = "Agri-03";
    $code4 = "Agri-04";
    $code5 = "Agri-05";
    $code6 = "Agri-06";
    $code7 = "Agri-07";
    $code8 = "Agri-08";
    $code9 = "Agri-09";
    $code10 = "Agri-10";



    // $totalAmount = $amount * $quantity;



    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    // $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $business_enterprise = mysqli_real_escape_string($conn, $_POST['business_enterprise']);
    $expenses = ($_POST['expenses']);
    $expenses_description = ($_POST['expenses_description']);

    if (isset($_POST["expenses_description"]) && !empty($_POST["expenses_description"])){
        if ($business_enterprise == "Rice Production") {

            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code1', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";






            // $query = "UPDATE cash_order SET fullname='$fullname', created_at='$created_at', product_name='$product_name', business_enterprise='$business_enterprise', code='$code1', quantity='$quantity', amount='$amount', ornumber='$ornumber', totalAmount='$totals' WHERE id='$id'";


            // $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount, ornumber, totalAmount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code1', '$quantity', '$amount', '$ornumber', '$toPay')";
        } elseif ($business_enterprise == "Farm Machineries- Harvester") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code2', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }

        } elseif ($business_enterprise == "Farm Machineries- Rotovator") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code3', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Turmeric Egg") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code4', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Fishpond Production") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code5', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Hatchery") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code6', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Swine Production") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code7', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Poultry Production-small ruminants") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code8', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Mango Production") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code9', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } elseif ($business_enterprise == "Vegetable Production") {
            $query = "UPDATE expenses_data SET created_at='$created_at', business_enterprise='$business_enterprise', code='$code10', expenses='$expenses', expenses_description='$expenses_description' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($conn->query($query)) {
                $_SESSION['success'] = 'Changes saved successfully';
            } else {
                $_SESSION['error'] = 'Something went wrong in editing data';
            }
        } else {
            $_SESSION['error'] = 'Something went wrong in editing expenses';
        }
    }



    
        
    


        if ($conn->query($query) === TRUE ) {
		
            // echo "Payment confirmation saved successfully.";
            // Additional logic for successful payment confirmation saving
    
            
            
            header('Location: account_receivable.php');
    
            
    
    
        } else {
            echo "Error: " . $query . "or" . $query2 . "<br>" . $conn->error;
        }




}






header('Location: expenses_data.php');
?>