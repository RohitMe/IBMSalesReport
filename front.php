
<?php

 require("DBConfig.php");
 //	if(isset($_GET['submit'])){
//		$from = $_GET['From'];
//		$to = $_GET['To'];
//		$Fname = $_GET["name"];
//		$UID = 2;
		$from = '2017/02/19';
		$to = '2017/03/02';
		$Fname = 'A';
	//	$Pname = 'product1';
		$sql = "SELECT t.TeamLeadID
				FROM tSalesTeamInformation t
				WHERE t.TeamName = '$Fname' ";
				
				$result  = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($result);
		if($count == 0 )
		{
			echo "USER NOT EXIST";
		}
		else
		{
				$row=mysqli_fetch_array($result);
				$UID=$row['TeamLeadID'];
				
				
		$sql = "SELECT sum(a.Total) as T 
		FROM (SELECT p.ProductCode ,sum(p.SalesCount) as Total
			FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s , tUserReportingHierarchy t
			WHERE p.submitionID = s.ID 
			and s.ID = t.MembersUserID
			and t.LeadsUserID = '$UID'
			GROUP BY p.ProductCode)a";
		$result  = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$total = $row['T'];	
		
		
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
Pie chart
 </title>
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['ProductCode', 'Total'],
 <?php 

		
 $query = "SELECT p.ProductCode ,sum(p.SalesCount) as Total
FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s , tUserReportingHierarchy t
WHERE p.submitionID = s.ID 
and s.ID = t.MembersUserID
and t.LeadsUserID = '$UID'
and s.SubmittedDate between '$from' and '$to'
GROUP BY p.ProductCode";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['ProductCode']."',".$row['Total']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Product',
 colors: [<?php
 
	$total;
	$exec = mysqli_query($conn,$query);
	$count = mysqli_num_rows($exec);
	while($row = mysqli_fetch_array($exec)){
		if(($row['Total']/$total)*100  > 60)
			echo "'blue'";
		elseif(($row['Total']/$total)*100  > 40)
			echo "'green'";
		else
			echo "'red'";
		$count--;
		if($count != 0)
			echo ",";
 }
 
 
 ?>]
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],<?php 

		
 $query = "SELECT p.ProductCode ,sum(p.SalesCount) as Total
FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s , tUserReportingHierarchy t
WHERE p.submitionID = s.ID 
and s.ID = t.MembersUserID
and t.LeadsUserID = '$UID'
and s.SubmittedDate between '$from' and '$to'
GROUP BY p.ProductCode";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){
if(($row['Total']/$total)*100  > 60)
			$c = "blue";
		elseif(($row['Total']/$total)*100  > 40)
			$c =  "green";
		else
			$c =  "red";
 echo "['".$row['ProductCode']."',".$row['Total'].","."'".$c."'"."],";
 }
 ?>
 ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options = {
        title: "",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

</head>
<body>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
 <h3>Bar Chart</h3>
 <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</body>
</html>
<?php


		}
?>
