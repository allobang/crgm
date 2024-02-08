<?php

include('../../database.php');
 
// $dataPoints = array(
// 	array("label"=> "January", "y"=> 254722.1),
// 	array("label"=> 1998, "y"=> 292175.1),
// 	array("label"=> 1999, "y"=> 369565),
// 	array("label"=> 2000, "y"=> 284918.9),
// 	array("label"=> 2001, "y"=> 325574.7),
// 	array("label"=> 2002, "y"=> 254689.8),
// 	array("label"=> 2003, "y"=> 303909),
// 	array("label"=> 2004, "y"=> 335092.9),
// 	array("label"=> 2005, "y"=> 408128),
// 	array("label"=> 2006, "y"=> 300992.2),
// 	array("label"=> 2007, "y"=> 401911.5),
// 	array("label"=> 2008, "y"=> 299009.2),
// 	array("label"=> 2009, "y"=> 319814.4),
// 	array("label"=> 2010, "y"=> 357303.9),
// 	array("label"=> 2011, "y"=> 353838.9),
// 	array("label"=> 2012, "y"=> 288386.5),
// 	array("label"=> 2013, "y"=> 485058.4),
// 	array("label"=> 2014, "y"=> 326794.4),
// 	array("label"=> 2015, "y"=> 483812.3),
// 	array("label"=> 2016, "y"=> 254484)
// );

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"crgm_db");

$test = array();
$count = 0;
$res = mysqli_query($link, "SELECT * FROM cash_order WHERE MONTH(created_at) = 1 AND business_enterprise = 'Rice Production'");
while($row = mysqli_fetch_array($res))
{
    $test[$count]["label"]=$row["created_at"];
    // $test[$count]["label"]=$row["product_name"];
    $test[$count]["y"]=$row["totalAmount"];
    $count = $count+1;

}









	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//theme: "light2",
	title:{
		text: "Rice Production -  2024"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "in Metric Tons",
		includeZero: true,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: false
	},
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>  