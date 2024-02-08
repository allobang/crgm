<?php
// fetch_monthly_data.php

include('../../database.php');

try {
    $selectedMonth = $_POST['selectedMonth'];

    // Establish a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Customize your queries based on the selected month
    // Example: Query to fetch data for January
    $cashOrderQuery = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth";

    $creditOrderQuery = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth";

    $expensesQuery = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth";

    // Prepare and execute the query
    $cashOrderStmt = $conn->prepare($cashOrderQuery);
    $cashOrderStmt->bindParam(':selectedMonth', $selectedMonth);
    $cashOrderStmt->execute();

    $creditOrderStmt = $conn->prepare($creditOrderQuery);
    $creditOrderStmt->bindParam(':selectedMonth', $selectedMonth);
    $creditOrderStmt->execute();

    $expensesStmt = $conn->prepare($expensesQuery);
    $expensesStmt->bindParam(':selectedMonth', $selectedMonth);
    $expensesStmt->execute();

    
    $cashAmounts = $cashOrderStmt->fetchAll(PDO::FETCH_COLUMN);
    $creditAmounts = $creditOrderStmt->fetchAll(PDO::FETCH_COLUMN);
    $expensesAmounts = $expensesStmt->fetchAll(PDO::FETCH_COLUMN);

   
    $totalCashAmount = array_sum($cashAmounts);
    $totalCreditAmount = array_sum($creditAmounts);
    $totalAmount = $totalCashAmount + $totalCreditAmount;
    $totalExpensesAmount = array_sum($expensesAmounts);

    $totalProfit = $totalAmount - $totalExpensesAmount;
    
    // echo "<tr>";
    // echo "<td>" . $totalCashAmount . "</td>";
    // echo "<td>" . $totalCreditAmount . "</td>";
    // echo "<td>" . $totalAmount . "</td>";
    // echo "<td>" . $totalExpensesAmount . "</td>";
    // echo "<td>" . '' . "</td>";
    
    // echo "</tr>";

    echo "<tr>
    <td>Agri-10</td>
    <td>Vegetable Production</td>
    <td>{$totalCreditAmount}</td>
    <td>{$totalCashAmount}</td>
    <td>{$totalAmount}</td>
    <td>{$totalExpensesAmount}</td>
    <td>{$totalProfit}</td>
    <!-- Add other columns as needed -->
</tr>";



// try dito

$sql1 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Rice Production'";

                $query1 = $conn->query($sql1);

                $row1 = $query1->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery1 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Rice Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery1 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Rice Production'";

                $expensesQuery1 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Rice Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt1 = $conn->prepare($cashOrderQuery1);
                $cashOrderStmt1->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt1->execute();

                $creditOrderStmt1 = $conn->prepare($creditOrderQuery1);
                $creditOrderStmt1->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt1->execute();

                $expensesStmt1 = $conn->prepare($expensesQuery1);
                $expensesStmt1->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt1->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts1 = $cashOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts1 = $creditOrderStmt1->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts1 = $expensesStmt1->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount1 = array_sum($cashAmounts1);
                $totalCreditAmount1 = array_sum($creditAmounts1);
                $totalSales1 = $totalCashAmount1 + $totalCreditAmount1;
                $totalExpensesAmount1 = array_sum($expensesAmounts1);

                $totalProfit1 = $totalSales1 - $totalExpensesAmount1;


                // echo "<tr>
                //         <td>{$row1['code']}</td>
                //         <td>{$row1['business_enterprise']}</td>
                //         <td>{$totalCreditAmount1}</td>
                //         <td>{$totalCashAmount1}</td>
                //         <td>{$totalSales1}</td>
                //         <td>{$totalExpensesAmount1}</td>
                //         <td>{$totalProfit1}</td>
                //         <!-- Add other columns as needed -->
                //     </tr>";

                echo "<tr>
                        <td>Agri-01</td>
                        <td>Rice Production</td>
                        <td>{$totalCreditAmount1}</td>
                        <td>{$totalCashAmount1}</td>
                        <td>{$totalSales1}</td>
                        <td>{$totalExpensesAmount1}</td>
                        <td>{$totalProfit1}</td>
                        <!-- Add other columns as needed -->
                    </tr>";


                // query 2
            
                $sql2 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Harvester'";

                $query2 = $conn->query($sql2);

                $row2 = $query2->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery2 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Harvester'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery2 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Harvester'";

                $expensesQuery2 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Harvester'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt2 = $conn->prepare($cashOrderQuery2);
                $cashOrderStmt2->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt2->execute();

                $creditOrderStmt2 = $conn->prepare($creditOrderQuery2);
                $creditOrderStmt2->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt2->execute();

                $expensesStmt2 = $conn->prepare($expensesQuery2);
                $expensesStmt2->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt2->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts2 = $cashOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts2 = $creditOrderStmt2->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts2 = $expensesStmt2->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount2 = array_sum($cashAmounts2);
                $totalCreditAmount2 = array_sum($creditAmounts2);
                $totalSales2 = $totalCashAmount2 + $totalCreditAmount2;
                $totalExpensesAmount2 = array_sum($expensesAmounts2);

                $totalProfit2 = $totalSales2 - $totalExpensesAmount2;


                echo "<tr>
                            <td>Agri-02</td>
                            <td>Farm Machineries - Harvester</td>
                            <td>{$totalCreditAmount2}</td>
                            <td>{$totalCashAmount2}</td>
                            <td>{$totalSales2}</td>
                            <td>{$totalExpensesAmount2}</td>
                            <td>{$totalProfit2}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 3
            
                $sql3 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Rotovator'";

                $query3 = $conn->query($sql3);

                $row3 = $query3->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery3 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Rotovator'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery3 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Rotovator'";

                $expensesQuery3 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Farm Machineries- Rotovator'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt3 = $conn->prepare($cashOrderQuery3);
                $cashOrderStmt3->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt3->execute();

                $creditOrderStmt3 = $conn->prepare($creditOrderQuery3);
                $creditOrderStmt3->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt3->execute();

                $expensesStmt3 = $conn->prepare($expensesQuery3);
                $expensesStmt3->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt3->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts3 = $cashOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts3 = $creditOrderStmt3->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts3 = $expensesStmt3->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount3 = array_sum($cashAmounts3);
                $totalCreditAmount3 = array_sum($creditAmounts3);
                $totalSales3 = $totalCashAmount3 + $totalCreditAmount3;
                $totalExpensesAmount3 = array_sum($expensesAmounts3);

                $totalProfit3 = $totalSales3 - $totalExpensesAmount3;


                echo "<tr>
                            <td>Agri-03</td>
                            <td>Farm Machineries - Rotovator</td>
                            <td>{$totalCreditAmount3}</td>
                            <td>{$totalCashAmount3}</td>
                            <td>{$totalSales3}</td>
                            <td>{$totalExpensesAmount3}</td>
                            <td>{$totalProfit3}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 4
            
                
                


                $sql4 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Turmeric Egg'";

                $query4 = $conn->query($sql4);

                $row4 = $query4->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery4 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Turmeric Egg'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery4 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Turmeric Egg'";

                $expensesQuery4 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Turmeric Egg'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt4 = $conn->prepare($cashOrderQuery4);
                $cashOrderStmt4->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt4->execute();

                $creditOrderStmt4 = $conn->prepare($creditOrderQuery4);
                $creditOrderStmt4->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt4->execute();

                $expensesStmt4 = $conn->prepare($expensesQuery4);
                $expensesStmt4->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt4->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts4 = $cashOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts4 = $creditOrderStmt4->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts4 = $expensesStmt4->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount4 = array_sum($cashAmounts4);
                $totalCreditAmount4 = array_sum($creditAmounts4);
                $totalSales4 = $totalCashAmount4 + $totalCreditAmount4;
                $totalExpensesAmount4 = array_sum($expensesAmounts4);

                $totalProfit4 = $totalSales4 - $totalExpensesAmount4;


                echo "<tr>
                            <td>Agri-04</td>
                            <td>Turmeric Egg</td>
                            <td>{$totalCreditAmount4}</td>
                            <td>{$totalCashAmount4}</td>
                            <td>{$totalSales4}</td>
                            <td>{$totalExpensesAmount4}</td>
                            <td>{$totalProfit4}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 5
            
                $sql5 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Fishpond Production'";

                $query5 = $conn->query($sql5);

                $row5 = $query5->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery5 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Fishpond Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery5 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Fishpond Production'";

                $expensesQuery5 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Fishpond Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt5 = $conn->prepare($cashOrderQuery5);
                $cashOrderStmt5->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt5->execute();

                $creditOrderStmt5 = $conn->prepare($creditOrderQuery5);
                $creditOrderStmt5->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt5->execute();

                $expensesStmt5 = $conn->prepare($expensesQuery5);
                $expensesStmt5->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt5->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts5 = $cashOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts5 = $creditOrderStmt5->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts5 = $expensesStmt5->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount5 = array_sum($cashAmounts5);
                $totalCreditAmount5 = array_sum($creditAmounts5);
                $totalSales5 = $totalCashAmount5 + $totalCreditAmount5;
                $totalExpensesAmount5 = array_sum($expensesAmounts5);

                $totalProfit5 = $totalSales5 - $totalExpensesAmount5;


                echo "<tr>
                            <td>Agri-05</td>
                            <td>Fishpond Production</td>
                            <td>{$totalCreditAmount5}</td>
                            <td>{$totalCashAmount5}</td>
                            <td>{$totalSales5}</td>
                            <td>{$totalExpensesAmount5}</td>
                            <td>{$totalProfit5}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 6
            
                $sql6 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Hatchery'";

                $query6 = $conn->query($sql6);

                $row6 = $query6->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery6 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Hatchery'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery6 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Hatchery'";

                $expensesQuery6 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Hatchery'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt6 = $conn->prepare($cashOrderQuery6);
                $cashOrderStmt6->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt6->execute();

                $creditOrderStmt6 = $conn->prepare($creditOrderQuery6);
                $creditOrderStmt6->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt6->execute();

                $expensesStmt6 = $conn->prepare($expensesQuery6);
                $expensesStmt6->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt6->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts6 = $cashOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts6 = $creditOrderStmt6->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts6 = $expensesStmt6->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount6 = array_sum($cashAmounts6);
                $totalCreditAmount6 = array_sum($creditAmounts6);
                $totalSales6 = $totalCashAmount6 + $totalCreditAmount6;
                $totalExpensesAmount6 = array_sum($expensesAmounts6);

                $totalProfit6 = $totalSales6 - $totalExpensesAmount6;


                echo "<tr>
                            <td>Agri-06</td>
                            <td>Hatchery</td>
                            <td>{$totalCreditAmount6}</td>
                            <td>{$totalCashAmount6}</td>
                            <td>{$totalSales6}</td>
                            <td>{$totalExpensesAmount6}</td>
                            <td>{$totalProfit6}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 7
            
                $sql7 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Swine Production'";

                $query7 = $conn->query($sql7);

                $row7 = $query7->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery7 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Swine Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery7 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Swine Production'";

                $expensesQuery7 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Swine Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt7 = $conn->prepare($cashOrderQuery7);
                $cashOrderStmt7->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt7->execute();

                $creditOrderStmt7 = $conn->prepare($creditOrderQuery7);
                $creditOrderStmt7->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt7->execute();

                $expensesStmt7 = $conn->prepare($expensesQuery7);
                $expensesStmt7->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt7->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts7 = $cashOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts7 = $creditOrderStmt7->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts7 = $expensesStmt7->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount7 = array_sum($cashAmounts7);
                $totalCreditAmount7 = array_sum($creditAmounts7);
                $totalSales7 = $totalCashAmount7 + $totalCreditAmount7;
                $totalExpensesAmount7 = array_sum($expensesAmounts7);

                $totalProfit7 = $totalSales7 - $totalExpensesAmount7;


                echo "<tr>
                            <td>Agri-07</td>
                            <td>Swine Production</td>
                            <td>{$totalCreditAmount7}</td>
                            <td>{$totalCashAmount7}</td>
                            <td>{$totalSales7}</td>
                            <td>{$totalExpensesAmount7}</td>
                            <td>{$totalProfit7}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 8
            
                $sql8 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Poultry Production-small ruminants'";

                $query8 = $conn->query($sql8);

                $row8 = $query8->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery8 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Poultry Production-small ruminants'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery8 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Poultry Production-small ruminants'";

                $expensesQuery8 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Poultry Production-small ruminants'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt8 = $conn->prepare($cashOrderQuery8);
                $cashOrderStmt8->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt8->execute();

                $creditOrderStmt8 = $conn->prepare($creditOrderQuery8);
                $creditOrderStmt8->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt8->execute();

                $expensesStmt8 = $conn->prepare($expensesQuery8);
                $expensesStmt8->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt8->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts8 = $cashOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts8 = $creditOrderStmt8->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts8 = $expensesStmt8->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount8 = array_sum($cashAmounts8);
                $totalCreditAmount8 = array_sum($creditAmounts8);
                $totalSales8 = $totalCashAmount8 + $totalCreditAmount8;
                $totalExpensesAmount8 = array_sum($expensesAmounts8);

                $totalProfit8 = $totalSales8 - $totalExpensesAmount8;


                echo "<tr>
                            <td>Agri-08</td>
                            <td>Poultry Production-small ruminants</td>
                            <td>{$totalCreditAmount8}</td>
                            <td>{$totalCashAmount8}</td>
                            <td>{$totalSales8}</td>
                            <td>{$totalExpensesAmount8}</td>
                            <td>{$totalProfit8}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 9
            
                $sql9 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Mango Production'";

                $query9 = $conn->query($sql9);

                $row9 = $query9->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery9 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Mango Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery9 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Mango Production'";

                $expensesQuery9 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Mango Production'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt9 = $conn->prepare($cashOrderQuery9);
                $cashOrderStmt9->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt9->execute();

                $creditOrderStmt9 = $conn->prepare($creditOrderQuery9);
                $creditOrderStmt9->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt9->execute();

                $expensesStmt9 = $conn->prepare($expensesQuery9);
                $expensesStmt9->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt9->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts9 = $cashOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts9 = $creditOrderStmt9->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts9 = $expensesStmt9->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount9 = array_sum($cashAmounts9);
                $totalCreditAmount9 = array_sum($creditAmounts9);
                $totalSales9 = $totalCashAmount9 + $totalCreditAmount9;
                $totalExpensesAmount9 = array_sum($expensesAmounts9);

                $totalProfit9 = $totalSales9 - $totalExpensesAmount9;


                echo "<tr>
                            <td>Agr-09</td>
                            <td>Mango Production</td>
                            <td>{$totalCreditAmount9}</td>
                            <td>{$totalCashAmount9}</td>
                            <td>{$totalSales9}</td>
                            <td>{$totalExpensesAmount9}</td>
                            <td>{$totalProfit9}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

                // query 10

                $sql10 = "SELECT * FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Vegetable Production'";

                $query10 = $conn->query($sql10);

                $row10 = $query10->fetch(PDO::FETCH_ASSOC);

                // amounts
            
                $cashOrderQuery10 = "SELECT totalAmount FROM cash_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Vegetable Production'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery10 = "SELECT totalAmount FROM credit_order WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Vegetable Production'";

                $expensesQuery10 = "SELECT expenses FROM expenses_data WHERE YEAR(created_at) = 2024 AND MONTH(created_at) = :selectedMonth AND business_enterprise='Vegetable Production'";


                // Prepare and execute the query
               

          
                

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt10 = $conn->prepare($cashOrderQuery10);
                $cashOrderStmt10->bindParam(':selectedMonth', $selectedMonth);
                $cashOrderStmt10->execute();

                $creditOrderStmt10 = $conn->prepare($creditOrderQuery10);
                $creditOrderStmt10->bindParam(':selectedMonth', $selectedMonth);
                $creditOrderStmt10->execute();

                $expensesStmt10 = $conn->prepare($expensesQuery10);
                $expensesStmt10->bindParam(':selectedMonth', $selectedMonth);
                $expensesStmt10->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts10 = $cashOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts10 = $creditOrderStmt10->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts10 = $expensesStmt10->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount10 = array_sum($cashAmounts10);
                $totalCreditAmount10 = array_sum($creditAmounts10);
                $totalSales10 = $totalCashAmount10 + $totalCreditAmount10;
                $totalExpensesAmount10 = array_sum($expensesAmounts10);

                $totalProfit10 = $totalSales10 - $totalExpensesAmount10;


                echo "<tr>
                            <td>Agri-10</td>
                            <td>Vegetable Production</td>
                            <td>{$totalCreditAmount10}</td>
                            <td>{$totalCashAmount10}</td>
                            <td>{$totalSales10}</td>
                            <td>{$totalExpensesAmount10}</td>
                            <td>{$totalProfit10}</td>
                            <!-- Add other columns as needed -->
                        </tr>";

} catch (PDOException $e) {
    // Display an error message if connection or query fails
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>  