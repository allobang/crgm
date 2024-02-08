<?php
// Include your connection file
include 'connection.php';

// SQL query for monthly totals
$sqlMonthly = "
SELECT 
  month,
  SUM(totalAmount) AS monthlyTotal
FROM (
  SELECT 
    MONTH(created_at) AS month, 
    totalAmount
  FROM 
    cash_order
  WHERE 
    YEAR(created_at) = 2023

  UNION ALL

  SELECT 
    MONTH(created_at) AS month, 
    totalAmount
  FROM 
    credit_order
  WHERE 
    YEAR(created_at) = 2023
) AS combined
GROUP BY 
  month
ORDER BY 
  month;
";

// SQL query for yearly totals grouped by business_enterprise
$sqlYearly = "
SELECT 
  business_enterprise,
  SUM(totalAmount) AS yearlyTotal
FROM (
  SELECT 
    business_enterprise, 
    totalAmount
  FROM 
    cash_order
  WHERE 
    YEAR(created_at) = 2023

  UNION ALL

  SELECT 
    business_enterprise, 
    totalAmount
  FROM 
    credit_order
  WHERE 
    YEAR(created_at) = 2023
) AS combined
GROUP BY 
  business_enterprise
ORDER BY 
  yearlyTotal DESC;
";

// Execute monthly totals query
$resultMonthly = $conn->query($sqlMonthly);

$monthlyTotals = array_fill(0, 12, 0); // Initialize an array to hold totals for each month

// Check if the monthly query was successful and there are results
if ($resultMonthly && $resultMonthly->num_rows > 0) {
  while ($row = $resultMonthly->fetch_assoc()) {
    $monthlyTotals[$row["month"] - 1] = $row["monthlyTotal"];
  }
} else {
  echo "0 results for monthly totals.<br>";
}

// Execute yearly totals query
$resultYearly = $conn->query($sqlYearly);

// Initialize two arrays to hold business enterprises and their yearly totals separately
$businessEnterprises = [];
$yearlyAmounts = [];

// Check if the yearly query was successful and there are results
if ($resultYearly && $resultYearly->num_rows > 0) {
  while ($row = $resultYearly->fetch_assoc()) {
    // Append business enterprise to the businessEnterprises array
    $businessEnterprises[] = $row["business_enterprise"];
    // Append total amount to the yearlyAmounts array
    $yearlyAmounts[] = $row["yearlyTotal"];
  }
} else {
  echo "0 results for yearly totals.<br>";
}

$totalYearlyAmount = array_sum($yearlyAmounts);

// Calculate percentages for each business enterprise
$percentages = [];
foreach ($yearlyAmounts as $amount) {
  $percentages[] = $totalYearlyAmount > 0 ? ($amount / $totalYearlyAmount * 100) : 0;
}
// Pass $percentages to JavaScript
echo "<script>var percentages = " . json_encode($percentages) . ";</script>";
// Create label strings with percentages in PHP
$percentageLabels = [];
foreach ($businessEnterprises as $index => $enterprise) {
  $percentageLabels[] = ' - ' . round($percentages[$index], 2) . '%' . $enterprise;
}

// Pass $percentageLabels to JavaScript
echo "<script>var percentageLabels = " . json_encode($percentageLabels) . ";</script>";

// Initialize arrays to hold monthly totals for cash and credit
$totalAmountCash = array_fill(0, 12, 0);
$totalAmountCredit = array_fill(0, 12, 0);

// SQL query for total sales from cash_order by month
$sqlCash = "
SELECT 
  MONTH(created_at) AS month, 
  SUM(totalAmount) AS total
FROM 
  cash_order
WHERE 
  YEAR(created_at) = 2023
GROUP BY 
  MONTH(created_at)
ORDER BY 
  MONTH(created_at);
";

// SQL query for total sales from credit_order by month
$sqlCredit = "
SELECT 
  MONTH(created_at) AS month, 
  SUM(totalAmount) AS total
FROM 
  credit_order
WHERE 
  YEAR(created_at) = 2023
GROUP BY 
  MONTH(created_at)
ORDER BY 
  MONTH(created_at);
";

// Execute query for cash_order
$resultCash = $conn->query($sqlCash);
if ($resultCash && $resultCash->num_rows > 0) {
  while ($row = $resultCash->fetch_assoc()) {
    $totalAmountCash[$row["month"] - 1] = $row["total"];
  }
}

// Execute query for credit_order
$resultCredit = $conn->query($sqlCredit);
if ($resultCredit && $resultCredit->num_rows > 0) {
  while ($row = $resultCredit->fetch_assoc()) {
    $totalAmountCredit[$row["month"] - 1] = $row["total"];
  }
}


// SQL query
$sql = "
SELECT 
  product_name,
  SUM(totalAmount) AS totalAmount
FROM (
  SELECT 
    product_name, 
    CAST(totalAmount AS DECIMAL(10,2)) AS totalAmount
  FROM 
    cash_order
  UNION ALL
  SELECT 
    product_name, 
    CAST(totalAmount AS DECIMAL(10,2)) AS totalAmount
  FROM 
    credit_order
) AS combined
GROUP BY 
  product_name
ORDER BY 
  totalAmount DESC;
";

$result = $conn->query($sql);

$productSales = [];
$productNames = [];
$totalAmounts = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $productNames[] = $row["product_name"];
    $totalAmounts[] = $row["totalAmount"];
    // For debugging
  }
} else {
  echo "0 results found";
}

// Close the connection
$conn->close();

// Pass data to JavaScript for Chart.js visualization
echo "<script>";
echo "var productNames = " . json_encode($productNames) . ";";
echo "var totalAmounts = " . json_encode($totalAmounts) . ";";
echo "</script>";

?>



<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRGM Data Visualization</title>
  <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <!-- end of sidebar component -->
    <div id="body" class="active">
      <!-- navbar navigation component -->
      <div class="content">
        <div class="container">
          <div class="page-title">
            <h3>CRGM Data Visualization</h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Monthly Total Sales</div>
                <div class="card-body">
                  <p class="card-title"></p>
                  <div class="canvas-wrapper">
                    <canvas class="chart" id="linechart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Cash Credit Montly Total Difference</div>
                <div class="card-body">
                  <p class="card-title"></p>
                  <div class="canvas-wrapper">
                    <canvas class="chart" id="barchart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Projects Percentage of Sales </div>
                <div class="card-body">
                  <p class="card-title"></p>
                  <div class="canvas-wrapper">
                    <canvas class="chart" id="doughnutchart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Product Performance</div>
                <div class="card-body">
                  <p class="card-title"></p>
                  <div class="canvas-wrapper">
                    <canvas class="chart" id="piechart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var monthlyTotals = <?php echo json_encode($monthlyTotals); ?>;
    var businessEnterprises = <?php echo json_encode($businessEnterprises); ?>;
    var yearlyAmounts = <?php echo json_encode($yearlyAmounts); ?>;
    var totalAmountCash = <?php echo json_encode($totalAmountCash); ?>;
    var totalAmountCredit = <?php echo json_encode($totalAmountCredit); ?>;
  </script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chartsjs/Chart.min.js"></script>
  <script src="assets/js/charts.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>