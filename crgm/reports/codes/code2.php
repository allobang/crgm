<?php


            try {
                // "SELECT * FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'"   
            
                $code_query2 = "SELECT * FROM cash_order WHERE code='Agri-02'";
                $code_result2 = $conn->query($code_query2);

                if ($code_result2->num_rows > 0) {
                    $row2 = $code_result2->fetch_assoc();
                    $code2 = $row['code'];
                } else {
                    echo "Error fetching code";
                    exit();
                }

                $business_enterprise2 = "SELECT * FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'";
                $business_enterprise_result2 = $conn->query($business_enterprise2);

                if ($business_enterprise_result2->num_rows > 0) {
                    $row = $business_enterprise_result2->fetch_assoc();
                    $business_enterprise_2 = $row2['business_enterprise'];
                } else {
                    echo "Error fetching totalAmount";
                    exit();
                }


                // Establish a connection to the database using PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Query to fetch 'amount' column from 'cash_order' table
                $cashOrderQuery = "SELECT totalAmount FROM cash_order WHERE business_enterprise='Farm Machineries- Harvester'";

                // Query to fetch 'amount' column from 'credit_order' table
                $creditOrderQuery = "SELECT totalAmount FROM credit_order WHERE business_enterprise='Farm Machineries- Harvester'";

                $expensesQuery = "SELECT expenses FROM expenses_data WHERE business_enterprise='Farm Machineries- Harvester'";

                // Prepare and execute the queries for 'cash_order' and 'credit_order' tables
                $cashOrderStmt = $conn->prepare($cashOrderQuery);
                $cashOrderStmt->execute();

                $creditOrderStmt = $conn->prepare($creditOrderQuery);
                $creditOrderStmt->execute();

                $expensesStmt = $conn->prepare($expensesQuery);
                $expensesStmt->execute();

                // Fetch 'amount' columns from 'cash_order' and 'credit_order' tables
                $cashAmounts = $cashOrderStmt->fetchAll(PDO::FETCH_COLUMN);
                $creditAmounts = $creditOrderStmt->fetchAll(PDO::FETCH_COLUMN);
                $expensesAmounts = $expensesStmt->fetchAll(PDO::FETCH_COLUMN);

                // Calculate the sum of 'amount' columns from both tables
                $totalCashAmount = array_sum($cashAmounts);
                $totalCreditAmount = array_sum($creditAmounts);
                $totalAmount = $totalCashAmount + $totalCreditAmount;
                $totalExpensesAmount = array_sum($expensesAmounts);

                $totalProfit = $totalAmount - $totalExpensesAmount;


                // Display results in an HTML table
                // echo "<table border='1'>";
                // echo "<tr><th>Amount of cash_order</th><th>Amount of credit_order</th><th>Total Amount</th></tr>";
                // echo "<tr><td>$totalCashAmount</td><td>$totalCreditAmount</td><td>$totalAmount</td></tr>";
                // echo "</table>";

                // query2

                
                ?>


                <!-- <tr> -->
                    <td>

                        <?php echo $code; ?>

                    </td>
                    <td>

                        <?php echo $business_enterprise_2; ?>

                    </td>
                    <td>

                        <?php echo $totalCreditAmount; ?>

                    </td>
                    <td>
                        <?php echo $totalCashAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalExpensesAmount; ?>
                    </td>
                    <td>
                        <?php echo $totalProfit; ?>
                    </td>

                <!-- </tr> -->

                
                <?php

            } catch (PDOException $e) {
                // Display an error message if connection or query fails
                echo "Connection failed: " . $e->getMessage();
            }

            // Close the database connection
            $conn = null;



            ?>


        </tbody>
    </table>

    <script>
        $(".js-example-tags").select2({
            tags: true
        });


        document.getElementById("mySelect").options[0].disabled = true;

        function filterData() {
            var selectedMonth = document.getElementById("selectMonth").value;

            $.ajax({
                type: "POST",
                url: "fetch_monthly_data.php", // Replace with the actual filename where you put the PHP code
                data: { selectedMonth: selectedMonth },
                success: function (response) {
                    $("#monthlyData").html(response);
                }
            });
        }


    </script>

    <script src="../../script.js"></script>
</body>

</html>