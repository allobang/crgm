<?php


if ($formattedDate == 'January') {
    $query = "INSERT INTO january_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'February') {
    $query = "INSERT INTO february_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'March') {
    $query = "INSERT INTO march_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'April') {
    $query = "INSERT INTO april_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'May') {
    $query = "INSERT INTO may_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'June') {
    $query = "INSERT INTO june_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'July') {
    $query = "INSERT INTO july_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'August') {
    $query = "INSERT INTO august_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'September') {
    $query = "INSERT INTO september_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'October') {
    $query = "INSERT INTO october_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'November') {
    $query = "INSERT INTO november_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($formattedDate == 'December') {
    $query = "INSERT INTO december_ar (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
}
?>