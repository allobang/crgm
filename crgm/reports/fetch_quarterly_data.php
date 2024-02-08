<?php
// fetch_quarterly_data.php

include('../../database.php');

try {
    $selectedQuarter = $_POST['selectedQuarter'];

    // Establish a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Customize your queries based on the selected quarter
    // Example: Query to fetch data for the first quarter (January to March)
    $quarter = intval($selectedQuarter); // Convert string to integer
    $startMonth = ($quarter - 1) * 3 + 1; // Calculate start month of the quarter
    $endMonth = $startMonth + 2; // Calculate end month of the quarter

    // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery1 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Rice Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery1 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Rice Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery1 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Rice Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt1 = $conn->prepare($cashOrderQuery1);
    $cashOrderStmt1->bindParam(':startMonth', $startMonth);
    $cashOrderStmt1->bindParam(':endMonth', $endMonth);
    $cashOrderStmt1->execute();

    $creditOrderStmt1 = $conn->prepare($creditOrderQuery1);
    $creditOrderStmt1->bindParam(':startMonth', $startMonth);
    $creditOrderStmt1->bindParam(':endMonth', $endMonth);
    $creditOrderStmt1->execute();

    $expensesStmt1 = $conn->prepare($expensesQuery1);
    $expensesStmt1->bindParam(':startMonth', $startMonth);
    $expensesStmt1->bindParam(':endMonth', $endMonth);
    $expensesStmt1->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData1 = $cashOrderStmt1->fetch(PDO::FETCH_ASSOC);
    $creditOrderData1 = $creditOrderStmt1->fetch(PDO::FETCH_ASSOC);
    $expensesData1 = $expensesStmt1->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount1 = $cashOrderData1['totalAmount'];
    $totalCreditAmount1 = $creditOrderData1['totalAmount'];
    $totalSales1 = $totalCashAmount1 + $totalCreditAmount1;
    $totalExpenses1 = $expensesData1['totalExpenses'];
    $totalProfit1 = $totalSales1 - $totalExpenses1;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-01</td>
            <td>Rice Production</td>
            <td>" . number_format($totalCreditAmount1, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount1, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales1, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses1, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit1, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";

        //   query 2

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery2 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery2 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery2 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Harvester' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt2 = $conn->prepare($cashOrderQuery2);
    $cashOrderStmt2->bindParam(':startMonth', $startMonth);
    $cashOrderStmt2->bindParam(':endMonth', $endMonth);
    $cashOrderStmt2->execute();

    $creditOrderStmt2 = $conn->prepare($creditOrderQuery2);
    $creditOrderStmt2->bindParam(':startMonth', $startMonth);
    $creditOrderStmt2->bindParam(':endMonth', $endMonth);
    $creditOrderStmt2->execute();

    $expensesStmt2 = $conn->prepare($expensesQuery2);
    $expensesStmt2->bindParam(':startMonth', $startMonth);
    $expensesStmt2->bindParam(':endMonth', $endMonth);
    $expensesStmt2->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData2 = $cashOrderStmt2->fetch(PDO::FETCH_ASSOC);
    $creditOrderData2 = $creditOrderStmt2->fetch(PDO::FETCH_ASSOC);
    $expensesData2 = $expensesStmt2->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount2 = $cashOrderData2['totalAmount'];
    $totalCreditAmount2 = $creditOrderData2['totalAmount'];
    $totalSales2 = $totalCashAmount2 + $totalCreditAmount2;
    $totalExpenses2 = $expensesData2['totalExpenses'];
    $totalProfit2 = $totalSales2 - $totalExpenses2;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-02</td>
            <td>Farm Machineries - Harvester</td>
            <td>" . number_format($totalCreditAmount2, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount2, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales2, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses2, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit2, 2, '.', ',') . "</td>
          </tr>";

          //   query 3

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery3 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery3 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery3 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Rotovator' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt3 = $conn->prepare($cashOrderQuery3);
    $cashOrderStmt3->bindParam(':startMonth', $startMonth);
    $cashOrderStmt3->bindParam(':endMonth', $endMonth);
    $cashOrderStmt3->execute();

    $creditOrderStmt3 = $conn->prepare($creditOrderQuery3);
    $creditOrderStmt3->bindParam(':startMonth', $startMonth);
    $creditOrderStmt3->bindParam(':endMonth', $endMonth);
    $creditOrderStmt3->execute();

    $expensesStmt3 = $conn->prepare($expensesQuery3);
    $expensesStmt3->bindParam(':startMonth', $startMonth);
    $expensesStmt3->bindParam(':endMonth', $endMonth);
    $expensesStmt3->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData3 = $cashOrderStmt3->fetch(PDO::FETCH_ASSOC);
    $creditOrderData3 = $creditOrderStmt3->fetch(PDO::FETCH_ASSOC);
    $expensesData3 = $expensesStmt3->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount3 = $cashOrderData3['totalAmount'];
    $totalCreditAmount3 = $creditOrderData3['totalAmount'];
    $totalSales3 = $totalCashAmount3 + $totalCreditAmount3;
    $totalExpenses3 = $expensesData3['totalExpenses'];
    $totalProfit3 = $totalSales3 - $totalExpenses3;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-03</td>
            <td>Farm Machineries - Rotovator</td>
            <td>" . number_format($totalCreditAmount3, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount3, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales3, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses3, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit3, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";

          //   query 4

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery4 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery4 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery4 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Turmeric Egg' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt4 = $conn->prepare($cashOrderQuery4);
    $cashOrderStmt4->bindParam(':startMonth', $startMonth);
    $cashOrderStmt4->bindParam(':endMonth', $endMonth);
    $cashOrderStmt4->execute();

    $creditOrderStmt4 = $conn->prepare($creditOrderQuery4);
    $creditOrderStmt4->bindParam(':startMonth', $startMonth);
    $creditOrderStmt4->bindParam(':endMonth', $endMonth);
    $creditOrderStmt4->execute();

    $expensesStmt4 = $conn->prepare($expensesQuery4);
    $expensesStmt4->bindParam(':startMonth', $startMonth);
    $expensesStmt4->bindParam(':endMonth', $endMonth);
    $expensesStmt4->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData4 = $cashOrderStmt4->fetch(PDO::FETCH_ASSOC);
    $creditOrderData4 = $creditOrderStmt3->fetch(PDO::FETCH_ASSOC);
    $expensesData4 = $expensesStmt4->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount4 = $cashOrderData4['totalAmount'];
    $totalCreditAmount4 = $creditOrderData4['totalAmount'];
    $totalSales4 = $totalCashAmount4 + $totalCreditAmount4;
    $totalExpenses4 = $expensesData4['totalExpenses'];
    $totalProfit4 = $totalSales4 - $totalExpenses4;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-04</td>
            <td>turmeric Egg</td>
            <td>" . number_format($totalCreditAmount4, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount4, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales4, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses4, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit4, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";
          
          //   query 5

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery5= "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery5 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery5 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Fishpond Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt5 = $conn->prepare($cashOrderQuery5);
    $cashOrderStmt5->bindParam(':startMonth', $startMonth);
    $cashOrderStmt5->bindParam(':endMonth', $endMonth);
    $cashOrderStmt5->execute();

    $creditOrderStmt5 = $conn->prepare($creditOrderQuery5);
    $creditOrderStmt5->bindParam(':startMonth', $startMonth);
    $creditOrderStmt5->bindParam(':endMonth', $endMonth);
    $creditOrderStmt5->execute();

    $expensesStmt5 = $conn->prepare($expensesQuery5);
    $expensesStmt5->bindParam(':startMonth', $startMonth);
    $expensesStmt5->bindParam(':endMonth', $endMonth);
    $expensesStmt5->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData5 = $cashOrderStmt5->fetch(PDO::FETCH_ASSOC);
    $creditOrderData5 = $creditOrderStmt5->fetch(PDO::FETCH_ASSOC);
    $expensesData5 = $expensesStmt5->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount5 = $cashOrderData5['totalAmount'];
    $totalCreditAmount5 = $creditOrderData5['totalAmount'];
    $totalSales5 = $totalCashAmount5 + $totalCreditAmount5;
    $totalExpenses5 = $expensesData5['totalExpenses'];
    $totalProfit5 = $totalSales5 - $totalExpenses5;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-05</td>
            <td>Fishpond Production</td>
            <td>" . number_format($totalCreditAmount5, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount5, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales5, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses5, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit5, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";
          
          //   query 6

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery6 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Hatchery' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery6 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Hatchery' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery6 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Hatchery' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt6 = $conn->prepare($cashOrderQuery6);
    $cashOrderStmt6->bindParam(':startMonth', $startMonth);
    $cashOrderStmt6->bindParam(':endMonth', $endMonth);
    $cashOrderStmt6->execute();

    $creditOrderStmt6 = $conn->prepare($creditOrderQuery6);
    $creditOrderStmt6->bindParam(':startMonth', $startMonth);
    $creditOrderStmt6->bindParam(':endMonth', $endMonth);
    $creditOrderStmt6->execute();

    $expensesStmt6 = $conn->prepare($expensesQuery6);
    $expensesStmt6->bindParam(':startMonth', $startMonth);
    $expensesStmt6->bindParam(':endMonth', $endMonth);
    $expensesStmt6->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData6 = $cashOrderStmt6->fetch(PDO::FETCH_ASSOC);
    $creditOrderData6 = $creditOrderStmt6->fetch(PDO::FETCH_ASSOC);
    $expensesData6 = $expensesStmt6->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount6 = $cashOrderData6['totalAmount'];
    $totalCreditAmount6 = $creditOrderData6['totalAmount'];
    $totalSales6 = $totalCashAmount6 + $totalCreditAmount6;
    $totalExpenses6 = $expensesData6['totalExpenses'];
    $totalProfit6 = $totalSales6 - $totalExpenses6;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-06</td>
            <td>Hatchery</td>
            <td>" . number_format($totalCreditAmount6, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount6, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales6, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses6, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit6, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";//   query 3

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery7 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Swine Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery7 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Swine Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery7 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Swine Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt7 = $conn->prepare($cashOrderQuery7);
    $cashOrderStmt7->bindParam(':startMonth', $startMonth);
    $cashOrderStmt7->bindParam(':endMonth', $endMonth);
    $cashOrderStmt7->execute();

    $creditOrderStmt7 = $conn->prepare($creditOrderQuery7);
    $creditOrderStmt7->bindParam(':startMonth', $startMonth);
    $creditOrderStmt7->bindParam(':endMonth', $endMonth);
    $creditOrderStmt7->execute();

    $expensesStmt7 = $conn->prepare($expensesQuery7);
    $expensesStmt7->bindParam(':startMonth', $startMonth);
    $expensesStmt7->bindParam(':endMonth', $endMonth);
    $expensesStmt7->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData7 = $cashOrderStmt7->fetch(PDO::FETCH_ASSOC);
    $creditOrderData7 = $creditOrderStmt7->fetch(PDO::FETCH_ASSOC);
    $expensesData7 = $expensesStmt7->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount7 = $cashOrderData7['totalAmount'];
    $totalCreditAmount7 = $creditOrderData7['totalAmount'];
    $totalSales7 = $totalCashAmount7 + $totalCreditAmount7;
    $totalExpenses7 = $expensesData7['totalExpenses'];
    $totalProfit7 = $totalSales7 - $totalExpenses7;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-07</td>
            <td>Swine Production</td>
            <td>" . number_format($totalCreditAmount7, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount7, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales7, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses7, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit7, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";//   query 8

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery8 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery8 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery8 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Poultry Production-small ruminants' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt8 = $conn->prepare($cashOrderQuery8);
    $cashOrderStmt8->bindParam(':startMonth', $startMonth);
    $cashOrderStmt8->bindParam(':endMonth', $endMonth);
    $cashOrderStmt8->execute();

    $creditOrderStmt8 = $conn->prepare($creditOrderQuery8);
    $creditOrderStmt8->bindParam(':startMonth', $startMonth);
    $creditOrderStmt8->bindParam(':endMonth', $endMonth);
    $creditOrderStmt8->execute();

    $expensesStmt8 = $conn->prepare($expensesQuery8);
    $expensesStmt8->bindParam(':startMonth', $startMonth);
    $expensesStmt8->bindParam(':endMonth', $endMonth);
    $expensesStmt8->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData8 = $cashOrderStmt8->fetch(PDO::FETCH_ASSOC);
    $creditOrderData8 = $creditOrderStmt8->fetch(PDO::FETCH_ASSOC);
    $expensesData8 = $expensesStmt8->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount8 = $cashOrderData8['totalAmount'];
    $totalCreditAmount8 = $creditOrderData8['totalAmount'];
    $totalSales8 = $totalCashAmount8 + $totalCreditAmount8;
    $totalExpenses8 = $expensesData8['totalExpenses'];
    $totalProfit8 = $totalSales8 - $totalExpenses8;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-08</td>
            <td>Poultry Production-small ruminants</td>
            <td>" . number_format($totalCreditAmount8, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount8, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales8, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses8, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit8, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";//   query 9

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery9 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Mango Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery9 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Mango Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery9 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Mango Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt9 = $conn->prepare($cashOrderQuery9);
    $cashOrderStmt9->bindParam(':startMonth', $startMonth);
    $cashOrderStmt9->bindParam(':endMonth', $endMonth);
    $cashOrderStmt9->execute();

    $creditOrderStmt9 = $conn->prepare($creditOrderQuery9);
    $creditOrderStmt9->bindParam(':startMonth', $startMonth);
    $creditOrderStmt9->bindParam(':endMonth', $endMonth);
    $creditOrderStmt9->execute();

    $expensesStmt9 = $conn->prepare($expensesQuery9);
    $expensesStmt9->bindParam(':startMonth', $startMonth);
    $expensesStmt9->bindParam(':endMonth', $endMonth);
    $expensesStmt9->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData9 = $cashOrderStmt9->fetch(PDO::FETCH_ASSOC);
    $creditOrderData9 = $creditOrderStmt9->fetch(PDO::FETCH_ASSOC);
    $expensesData9 = $expensesStmt9->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount9 = $cashOrderData9['totalAmount'];
    $totalCreditAmount9 = $creditOrderData9['totalAmount'];
    $totalSales9 = $totalCashAmount9 + $totalCreditAmount9;
    $totalExpenses9 = $expensesData9['totalExpenses'];
    $totalProfit9 = $totalSales9 - $totalExpenses9;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-09</td>
            <td>Mango Production</td>
            <td>" . number_format($totalCreditAmount9, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount9, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales9, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses9, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit9, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";
          
          //   query 10

          // Query to fetch quarterly data for 'cash_order' table
    $cashOrderQuery10 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'credit_order' table
    $creditOrderQuery10 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Query to fetch quarterly data for 'expenses_data' table
    $expensesQuery10 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE business_enterprise='Vegetable Production' AND YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

    // Prepare and execute the queries for quarterly data
    $cashOrderStmt10 = $conn->prepare($cashOrderQuery10);
    $cashOrderStmt10->bindParam(':startMonth', $startMonth);
    $cashOrderStmt10->bindParam(':endMonth', $endMonth);
    $cashOrderStmt10->execute();

    $creditOrderStmt10 = $conn->prepare($creditOrderQuery10);
    $creditOrderStmt10->bindParam(':startMonth', $startMonth);
    $creditOrderStmt10->bindParam(':endMonth', $endMonth);
    $creditOrderStmt10->execute();

    $expensesStmt10 = $conn->prepare($expensesQuery10);
    $expensesStmt10->bindParam(':startMonth', $startMonth);
    $expensesStmt10->bindParam(':endMonth', $endMonth);
    $expensesStmt10->execute();

    // Fetch quarterly data from the result sets
    $cashOrderData10 = $cashOrderStmt10->fetch(PDO::FETCH_ASSOC);
    $creditOrderData10 = $creditOrderStmt10->fetch(PDO::FETCH_ASSOC);
    $expensesData10 = $expensesStmt10->fetch(PDO::FETCH_ASSOC);

    // Calculate total sales, expenses, and profit for the quarter
    $totalCashAmount10 = $cashOrderData10['totalAmount'];
    $totalCreditAmount10 = $creditOrderData10['totalAmount'];
    $totalSales10 = $totalCashAmount10 + $totalCreditAmount10;
    $totalExpenses10 = $expensesData10['totalExpenses'];
    $totalProfit10 = $totalSales10 - $totalExpenses10;

    // Display the quarterly data in the table
    echo "<tr>
            <td>Agri-10</td>
            <td>Vegetable Production</td>
            <td>" . number_format($totalCreditAmount10, 2, '.', ',') . "</td>
            <td>" . number_format($totalCashAmount10, 2, '.', ',') . "</td>
            <td>" . number_format($totalSales10, 2, '.', ',') . "</td>
            <td>" . number_format($totalExpenses10, 2, '.', ',') . "</td>
            <td>" . number_format($totalProfit10, 2, '.', ',') . "</td>
            <!-- Add other columns as needed -->
          </tr>";


     //   total

          // Query to fetch quarterly data for 'cash_order' table
          $cashOrderQuery11 = "SELECT SUM(totalAmount) AS totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";

          // Query to fetch quarterly data for 'credit_order' table
          $creditOrderQuery11 = "SELECT SUM(totalAmount) AS totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";
      
          // Query to fetch quarterly data for 'expenses_data' table
          $expensesQuery11 = "SELECT SUM(expenses) AS totalExpenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) BETWEEN :startMonth AND :endMonth";
      
          // Prepare and execute the queries for quarterly data
          $cashOrderStmt11 = $conn->prepare($cashOrderQuery11);
          $cashOrderStmt11->bindParam(':startMonth', $startMonth);
          $cashOrderStmt11->bindParam(':endMonth', $endMonth);
          $cashOrderStmt11->execute();
      
          $creditOrderStmt11 = $conn->prepare($creditOrderQuery11);
          $creditOrderStmt11->bindParam(':startMonth', $startMonth);
          $creditOrderStmt11->bindParam(':endMonth', $endMonth);
          $creditOrderStmt11->execute();
      
          $expensesStmt11 = $conn->prepare($expensesQuery11);
          $expensesStmt11->bindParam(':startMonth', $startMonth);
          $expensesStmt11->bindParam(':endMonth', $endMonth);
          $expensesStmt11->execute();
      
          // Fetch quarterly data from the result sets

          $cashOrderData11 = $cashOrderStmt11->fetch(PDO::FETCH_ASSOC);
          $creditOrderData11 = $creditOrderStmt11->fetch(PDO::FETCH_ASSOC);
          $expensesData11 = $expensesStmt11->fetch(PDO::FETCH_ASSOC);



          // $cashOrderData11 = $cashOrderStmt11->fetchAll(PDO::FETCH_COLUMN);
          // $creditOrderData11 = $creditOrderStmt11->fetchAll(PDO::FETCH_COLUMN);
          // $expensesData11 = $expensesStmt11->fetchAll(PDO::FETCH_COLUMN);

          // $totalCashAmount11 = array_sum($cashOrderData11);
          // $totalCreditAmount11 = array_sum($creditOrderData11);
          // $totalSales11 = $totalCashAmount + $totalCreditAmount;
          // $totalExpenses11 = array_sum($expensesData11);
      
          // $totalProfit11 = $totalSales11 - $totalExpenses11;
      
          // Calculate total sales, expenses, and profit for the quarter
          $totalCashAmount11 = $cashOrderData11['totalAmount'];
          $totalCreditAmount11 = $creditOrderData11['totalAmount'];
          $totalSales11 = $totalCashAmount11 + $totalCreditAmount11;
          $totalExpenses11 = $expensesData11['totalExpenses'];
          $totalProfit11 = $totalSales11 - $totalExpenses11;
      
          // Display the quarterly data in the table
          echo "<tr>
          <td><center><strong>Itong Total</strong></center></td>
          <td><center><strong>Saan Ilalagay?</strong></center></td>
                <td>" . number_format($totalCreditAmount11, 2, '.', ',') . "</td>
                <td>" . number_format($totalCashAmount11, 2, '.', ',') . "</td>
                <td>" . number_format($totalSales11, 2, '.', ',') . "</td>
                <td>" . number_format($totalExpenses11, 2, '.', ',') . "</td>
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
