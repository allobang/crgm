<?php
// fetch_annual_data.php

include('../../database.php');

try {
    $selectedYear = $_POST['selectedYear'];

    // Establish a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Customize your queries based on the selected year
    // Example: Query to fetch data for the selected year
    
    // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery1 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Rice Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery1 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Rice Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery1 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Rice Production' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt1 = $conn->prepare($cashOrderQuery1);
    $cashOrderStmt1->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt1->execute();

    $creditOrderStmt1 = $conn->prepare($creditOrderQuery1);
    $creditOrderStmt1->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt1->execute();

    $expensesStmt1 = $conn->prepare($expensesQuery1);
    $expensesStmt1->bindParam(':selectedYear', $selectedYear);
    $expensesStmt1->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts1 = $cashOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts1 = $creditOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts1 = $expensesStmt1->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount1 = array_sum($cashAmounts1);
    $totalCreditAmount1 = array_sum($creditAmounts1);
    $totalSales1 = $totalCashAmount1 + $totalCreditAmount1;

    // Calculate the total expenses
    $totalExpensesAmount1 = array_sum($expensesAmounts1);

    // Calculate the total profit
    $totalProfit1 = $totalSales1 - $totalExpensesAmount1;

    // Output the annual data
    echo "<tr>
            <td>Agri-01</td>
            <td>Rice Production</td>
            <td>" . number_format($totalCreditAmount1, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount1, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales1, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount1, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit1, 2, '.', ',') . "</td>
        </tr>";

        // query 2

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery2 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery2 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery2 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt2 = $conn->prepare($cashOrderQuery2);
    $cashOrderStmt2->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt2->execute();

    $creditOrderStmt2 = $conn->prepare($creditOrderQuery2);
    $creditOrderStmt2->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt2->execute();

    $expensesStmt2 = $conn->prepare($expensesQuery2);
    $expensesStmt2->bindParam(':selectedYear', $selectedYear);
    $expensesStmt2->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts2 = $cashOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts2 = $creditOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts2 = $expensesStmt2->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount2 = array_sum($cashAmounts2);
    $totalCreditAmount2 = array_sum($creditAmounts2);
    $totalSales2 = $totalCashAmount2 + $totalCreditAmount2;

    // Calculate the total expenses
    $totalExpensesAmount2 = array_sum($expensesAmounts2);

    // Calculate the total profit
    $totalProfit2 = $totalSales2 - $totalExpensesAmount2;

    // Output the annual data
    echo "<tr>
            <td>Agri-02</td>
            <td>Farm Machineries - Harvester</td>
            <td>" . number_format($totalCreditAmount2, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount2, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales2, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount2, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit2, 2, '.', ',') . "</td>
        </tr>";

        // query 3

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery3 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery3 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery3 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt3 = $conn->prepare($cashOrderQuery3);
    $cashOrderStmt3->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt3->execute();

    $creditOrderStmt3 = $conn->prepare($creditOrderQuery3);
    $creditOrderStmt3->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt3->execute();

    $expensesStmt3 = $conn->prepare($expensesQuery3);
    $expensesStmt3->bindParam(':selectedYear', $selectedYear);
    $expensesStmt3->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts3 = $cashOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts3 = $creditOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts3 = $expensesStmt3->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount3 = array_sum($cashAmounts3);
    $totalCreditAmount3 = array_sum($creditAmounts3);
    $totalSales3 = $totalCashAmount3 + $totalCreditAmount3;

    // Calculate the total expenses
    $totalExpensesAmount3 = array_sum($expensesAmounts3);

    // Calculate the total profit
    $totalProfit3 = $totalSales3 - $totalExpensesAmount3;

    // Output the annual data
    echo "<tr>
            <td>Agri-03</td>
            <td>Farm Machineries - Rotovator</td>
            <td>" . number_format($totalCreditAmount3, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount3, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales3, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount3, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit3, 2, '.', ',') . "</td>
        </tr>";

        // query 4

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery4 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery4 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery4 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt4 = $conn->prepare($cashOrderQuery4);
    $cashOrderStmt4->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt4->execute();

    $creditOrderStmt4 = $conn->prepare($creditOrderQuery4);
    $creditOrderStmt4->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt4->execute();

    $expensesStmt4 = $conn->prepare($expensesQuery4);
    $expensesStmt4->bindParam(':selectedYear', $selectedYear);
    $expensesStmt4->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts4 = $cashOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts4 = $creditOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts4 = $expensesStmt4->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount4 = array_sum($cashAmounts4);
    $totalCreditAmount4 = array_sum($creditAmounts4);
    $totalSales4 = $totalCashAmount2 + $totalCreditAmount4;

    // Calculate the total expenses
    $totalExpensesAmount4 = array_sum($expensesAmounts4);

    // Calculate the total profit
    $totalProfit4 = $totalSales4 - $totalExpensesAmount4;

    // Output the annual data
    echo "<tr>
            <td>Agri-04</td>
            <td>Turmeric Egg</td>
            <td>" . number_format($totalCreditAmount4, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount4, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales4, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount4, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit4, 2, '.', ',') . "</td>
        </tr>";

        // query 5

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery5 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery5 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery5 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt5 = $conn->prepare($cashOrderQuery5);
    $cashOrderStmt5->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt5->execute();

    $creditOrderStmt5 = $conn->prepare($creditOrderQuery5);
    $creditOrderStmt5->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt5->execute();

    $expensesStmt5 = $conn->prepare($expensesQuery5);
    $expensesStmt5->bindParam(':selectedYear', $selectedYear);
    $expensesStmt5->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts5 = $cashOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts5 = $creditOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts5 = $expensesStmt5->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount5 = array_sum($cashAmounts5);
    $totalCreditAmount5 = array_sum($creditAmounts5);
    $totalSales5 = $totalCashAmount5 + $totalCreditAmount5;

    // Calculate the total expenses
    $totalExpensesAmount5 = array_sum($expensesAmounts5);

    // Calculate the total profit
    $totalProfit5 = $totalSales5 - $totalExpensesAmount5;

    // Output the annual data
    echo "<tr>
            <td>Agri-05</td>
            <td>Fishpond Production</td>
            <td>" . number_format($totalCreditAmount5, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount5, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales5, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount5, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit5, 2, '.', ',') . "</td>
        </tr>";

        // query 6

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery6 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Hatchery' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery6 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Hatchery' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery6 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Hatchery' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt6 = $conn->prepare($cashOrderQuery6);
    $cashOrderStmt6->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt6->execute();

    $creditOrderStmt6 = $conn->prepare($creditOrderQuery6);
    $creditOrderStmt6->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt6->execute();

    $expensesStmt6 = $conn->prepare($expensesQuery6);
    $expensesStmt6->bindParam(':selectedYear', $selectedYear);
    $expensesStmt6->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts6 = $cashOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts6 = $creditOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts6 = $expensesStmt6->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount6 = array_sum($cashAmounts6);
    $totalCreditAmount6 = array_sum($creditAmounts6);
    $totalSales6 = $totalCashAmount6 + $totalCreditAmount6;

    // Calculate the total expenses
    $totalExpensesAmount6 = array_sum($expensesAmounts6);

    // Calculate the total profit
    $totalProfit6 = $totalSales6 - $totalExpensesAmount6;

    // Output the annual data
    echo "<tr>
            <td>Agri-06</td>
            <td>Hatchery</td>
            <td>" . number_format($totalCreditAmount6, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount6, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales6, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount6, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit6, 2, '.', ',') . "</td>
        </tr>";

        // query 7

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery7 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Swine Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery7 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Swine Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery7 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Swine Production' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt7 = $conn->prepare($cashOrderQuery7);
    $cashOrderStmt7->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt7->execute();

    $creditOrderStmt7 = $conn->prepare($creditOrderQuery7);
    $creditOrderStmt7->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt7->execute();

    $expensesStmt7 = $conn->prepare($expensesQuery7);
    $expensesStmt7->bindParam(':selectedYear', $selectedYear);
    $expensesStmt7->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts7 = $cashOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts7 = $creditOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts7 = $expensesStmt7->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount7 = array_sum($cashAmounts7);
    $totalCreditAmount7 = array_sum($creditAmounts7);
    $totalSales7 = $totalCashAmount7 + $totalCreditAmount7;

    // Calculate the total expenses
    $totalExpensesAmount7 = array_sum($expensesAmounts7);

    // Calculate the total profit
    $totalProfit7 = $totalSales7 - $totalExpensesAmount7;

    // Output the annual data
    echo "<tr>
            <td>Agri-07</td>
            <td>Swine Production</td>
            <td>" . number_format($totalCreditAmount7, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount7, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales7, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount7, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit7, 2, '.', ',') . "</td>
        </tr>";

        // query 8

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery8 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery8 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery8 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt8 = $conn->prepare($cashOrderQuery8);
    $cashOrderStmt8->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt8->execute();

    $creditOrderStmt8 = $conn->prepare($creditOrderQuery8);
    $creditOrderStmt8->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt8->execute();

    $expensesStmt8 = $conn->prepare($expensesQuery8);
    $expensesStmt8->bindParam(':selectedYear', $selectedYear);
    $expensesStmt8->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts8 = $cashOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts8 = $creditOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts8 = $expensesStmt8->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount8 = array_sum($cashAmounts8);
    $totalCreditAmount8 = array_sum($creditAmounts8);
    $totalSales8 = $totalCashAmount8 + $totalCreditAmount8;

    // Calculate the total expenses
    $totalExpensesAmount8 = array_sum($expensesAmounts8);

    // Calculate the total profit
    $totalProfit8 = $totalSales8 - $totalExpensesAmount8;

    // Output the annual data
    echo "<tr>
            <td>Agri-08</td>
            <td>Total</td>
            <td>" . number_format($totalCreditAmount8, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount8, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales8, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount8, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit8, 2, '.', ',') . "</td>
        </tr>";

        // query 9

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery9 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Mango Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery9 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Mango Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery9 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Mango Production' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt9 = $conn->prepare($cashOrderQuery9);
    $cashOrderStmt9->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt9->execute();

    $creditOrderStmt9 = $conn->prepare($creditOrderQuery9);
    $creditOrderStmt9->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt9->execute();

    $expensesStmt9 = $conn->prepare($expensesQuery9);
    $expensesStmt9->bindParam(':selectedYear', $selectedYear);
    $expensesStmt9->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts9 = $cashOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts9 = $creditOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts9 = $expensesStmt9->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount9 = array_sum($cashAmounts9);
    $totalCreditAmount9 = array_sum($creditAmounts9);
    $totalSales9 = $totalCashAmount9 + $totalCreditAmount9;

    // Calculate the total expenses
    $totalExpensesAmount9 = array_sum($expensesAmounts9);

    // Calculate the total profit
    $totalProfit9 = $totalSales9 - $totalExpensesAmount9;

    // Output the annual data
    echo "<tr>
            <td>Agri-09</td>
            <td>Mango Production</td>
            <td>" . number_format($totalCreditAmount9, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount9, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales9, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount9, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit9, 2, '.', ',') . "</td>
        </tr>";

        // query 10

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery10 = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery10 = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery10 = "SELECT expenses FROM expenses_data WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt10 = $conn->prepare($cashOrderQuery10);
    $cashOrderStmt10->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt10->execute();

    $creditOrderStmt10 = $conn->prepare($creditOrderQuery10);
    $creditOrderStmt10->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt10->execute();

    $expensesStmt10 = $conn->prepare($expensesQuery10);
    $expensesStmt10->bindParam(':selectedYear', $selectedYear);
    $expensesStmt10->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts10 = $cashOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts10 = $creditOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts10 = $expensesStmt10->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount10 = array_sum($cashAmounts10);
    $totalCreditAmount10 = array_sum($creditAmounts10);
    $totalSales10 = $totalCashAmount10 + $totalCreditAmount10;

    // Calculate the total expenses
    $totalExpensesAmount10 = array_sum($expensesAmounts10);

    // Calculate the total profit
    $totalProfit10 = $totalSales10 - $totalExpensesAmount10;

    // Output the annual data
    echo "<tr>
            <td>Agri-10</td>
            <td>Vegetable Production</td>
            <td>" . number_format($totalCreditAmount10, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount10, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales10, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount10, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit10, 2, '.', ',') . "</td>
        </tr>";

         // Total

        // Query to fetch 'totalAmount' column from 'cash_order' table for the selected year
    $cashOrderQuery11 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = :selectedYear";

    // Query to fetch 'totalAmount' column from 'credit_order' table for the selected year
    $creditOrderQuery11 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = :selectedYear";

    // Query to fetch 'expenses' column from 'expenses_data' table for the selected year
    $expensesQuery11 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = :selectedYear";

    // Prepare and execute the queries for 'cash_order', 'credit_order', and 'expenses_data' tables
    $cashOrderStmt11 = $conn->prepare($cashOrderQuery11);
    $cashOrderStmt11->bindParam(':selectedYear', $selectedYear);
    $cashOrderStmt11->execute();

    $creditOrderStmt11 = $conn->prepare($creditOrderQuery11);
    $creditOrderStmt11->bindParam(':selectedYear', $selectedYear);
    $creditOrderStmt11->execute();

    $expensesStmt11 = $conn->prepare($expensesQuery11);
    $expensesStmt11->bindParam(':selectedYear', $selectedYear);
    $expensesStmt11->execute();

    // Fetch 'totalAmount' columns from 'cash_order' and 'credit_order' tables
    $cashAmounts11 = $cashOrderStmt11->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts11 = $creditOrderStmt11->fetchAll(PDO::FETCH_COLUMN);
    
    // Fetch 'expenses' column from 'expenses_data' table
    $expensesAmounts11 = $expensesStmt11->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the sum of 'totalAmount' columns from both tables
    $totalCashAmount11 = array_sum($cashAmounts11);
    $totalCreditAmount11 = array_sum($creditAmounts11);
    $totalSales11 = $totalCashAmount11 + $totalCreditAmount11;

    // Calculate the total expenses
    $totalExpensesAmount11 = array_sum($expensesAmounts11);

    // Calculate the total profit
    $totalProfit11 = $totalSales11 - $totalExpensesAmount11;

    // Output the annual data
    echo "<tr>
            <td><center><strong>Annual</strong></center></td>
            <td><center><strong>Total</strong></center></td>
            <td>" . number_format($totalCreditAmount11, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount11, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales11, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpensesAmount11, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit11, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
        </tr>";


       

       

} catch (PDOException $e) {
    // Display an error message if connection or query fails
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
