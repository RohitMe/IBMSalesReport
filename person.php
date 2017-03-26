<?php 	 
	require("DBConfig.php");
//While linking please remove these comments 
//	if(isset($_GET['submit'])){
//		$from = $_GET['From'];
//		$to = $_GET['To'];
//		$Fname = $_GET["name"];
//		$UID = 2;
		$from = '2017/02/19';
		$to = '2017/03/02';
		$Fname = 'Rohit';
		$sql = "SELECT t.ID
				FROM tuserinfromations t
				WHERE t.FullName = '$Fname' ";
				$result  = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($result);
		if($count == 0 )
		{
			echo "USER NOT EXIST";
		}
		else
		{
				$row=mysqli_fetch_array($result);
				$UID=$row['ID'];
		
		
		
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
//Calculating total, which will be used in calculate percentage 
$sql = "SELECT sum(a.Total) as T 
		FROM (SELECT p.ProductCode ,sum(p.SalesCount) as Total
				FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s
				WHERE p.submitionID = s.ID and s.Submittedfor = '$UID'
				and s.SubmittedDate between '$from' and '$to'
				GROUP BY p.ProductCode)a";
		$result  = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$total = $row['T'];	
		//echo $total;
		
//To get total sales of each product by specific member	
$sql = "SELECT p.ProductCode ,sum(p.SalesCount) as Total
		FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s
		WHERE p.submitionID = s.ID and s.Submittedfor = '$UID'
		and s.SubmittedDate between '$from' and '$to'
		GROUP BY p.ProductCode";
		$result  = mysqli_query($conn,$sql);	
		$count = mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result)){			
?>						
							<tr>
								
									<td><?php echo $row['ProductCode'];?></td>
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
