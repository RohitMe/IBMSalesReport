
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
		FROM (SELECT s.Submittedfor, sum(p.SalesCount) as Total
				FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s,tUserReportingHierarchy t
				WHERE s.ID = p.submitionID 
				and s.ID = t.MembersUserID
				and t.LeadsUserID = '$UID'
				and s.SubmittedDate between '$from' and '$to'
				GROUP BY s.Submittedfor)a";
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
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['ProductCode', 'Total'],
 <?php 

		
 $query = "SELECT s.Submittedfor, sum(p.SalesCount) as Total
FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s,tUserReportingHierarchy t
WHERE s.ID = p.submitionID 
and s.ID = t.MembersUserID
and t.LeadsUserID = '$UID'
and s.SubmittedDate between '$from' and '$to'
GROUP BY s.Submittedfor";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Submittedfor']."',".$row['Total']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Team',
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
</head>
<body>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
<?php


		}
?>
