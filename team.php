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
		if($count == 0 ){
			echo "USER NOT EXIST";
		}
		else{
				$row=mysqli_fetch_array($result);
				$UID=$row['TeamLeadID'];
?>
		
		<html>
			<head>
				
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
			
				
				

				<title>Person</title>
			</head>
			<body>
					<table class="table table-striped" >
						<thead>
							<tr>
								<th></th>	
								<th></th> 
														
							</tr>
						</thead>
						<tbody>
<?php
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
			
	$sql = "SELECT s.Submittedfor, sum(p.SalesCount) as Total
		FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s,tUserReportingHierarchy t
			WHERE s.ID = p.submitionID 	
			and s.ID = t.MembersUserID
			and t.LeadsUserID = '$UID'
			and s.SubmittedDate between '$from' and '$to'
			GROUP BY s.Submittedfor";
	$result  = mysqli_query($conn,$sql);	
	$count = mysqli_num_rows($result);
	while($row=mysqli_fetch_array($result)){			
?>						
		<tr>
			<td><?php echo $row['Submittedfor'];?></td>
			<td><?php echo $row['Total'];?></td>
		</tr> 
<?php
						}	
						//$conn->close();
?>
		</tbody>
		</table>
						
					
	</body>
		<?php
		
		
		
		
		}
//	}


?>
