<?php

if ($business_enterprise == "Rice Production") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code1', '$quantity', '$amount')";
} elseif ($business_enterprise == "Farm Machineries- Harvester") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code2', '$quantity', '$amount')";
} elseif ($business_enterprise == "Farm Machineries- Rotovator") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code3', '$quantity', '$amount')";
} elseif ($business_enterprise == "Turmeric Egg") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code4', '$quantity', '$amount')";
} elseif ($business_enterprise == "Fishpond Production") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code5', '$quantity', '$amount')";
} elseif ($business_enterprise == "Hatchery") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code6', '$quantity', '$amount')";
} elseif ($business_enterprise == "Swine Production") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code7', '$quantity', '$amount')";
} elseif ($business_enterprise == "Poultry Production-small ruminants") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code8', '$quantity', '$amount')";
} elseif ($business_enterprise == "Mango Production") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code9', '$quantity', '$amount')";
} elseif ($business_enterprise == "Vegetable Production") {
    $query = "INSERT INTO cash_order (fullname, created_at, product_name, business_enterprise, code, quantity, amount) VALUES ('$fullname', NOW(), '$product_name', '$business_enterprise', '$code10', '$quantity', '$amount')";
} else {
    echo "Error input";
}


?>