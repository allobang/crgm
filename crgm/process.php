<?php
include("../database.php");
if(isset($_POST["create"])){
    $Activities = mysqli_real_escape_string($conn, $_POST["Activities"]);
    $land_preparation = mysqli_real_escape_string($conn, $_POST["land_preparation"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sql = "INSERT INTO rice_production_activities (Activities, land_preparation, type, description) VALUES ('$Activities','$land_preparation','$type','$description')";
    if(mysqli_query($conn,$sql)){
        session_start();
        $_SESSION["create"] = "Book Added Successfully";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
    
}

if(isset($_POST["edit"])){

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


    $fullname = $_POST["fullname"];
    $created_at = $_POST["created_at"];
    $product_name = $_POST["product_name"];
    // $code = $_POST["code"];
    $business_enterprise = $_POST["business_enterprise"];

    $quantity = $_POST["quantity"];
    $amount = $_POST["amount"];
    $ornumber = $_POST["ornumber"];


    // $Activities = mysqli_real_escape_string($conn, $_POST["Activities"]);
    // $land_preparation = mysqli_real_escape_string($conn, $_POST["land_preparation"]);
    
    // $description = mysqli_real_escape_string($conn, $_POST["description"]);
    // $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sql = "UPDATE credit_order SET Activities = '$fullname', created_at = '$created_at', product_name = '$product_name', business_enterprise = '$business_enterprise', quantity = '$quantity', amount = '$amount', ornumber = '$ornumber' WHERE id = $id ";
    if(mysqli_query($conn,$sql)){
        session_start();
        $_SESSION["update"] = "Book Updated Successfully";
        header("Location:account_receivable.php");
    }else{
        die("Something went wrong");
    }
    
}

?>