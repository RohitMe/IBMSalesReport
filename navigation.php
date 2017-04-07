<?php
	if(isset($_POST['submit'])){
		if($_POST['name1'] == "user"){
			header("Location:front.php");
		}
		else{
			$teamD = $_POST['TeamOptions'];
			if($teamD == "Team details"){
				header("Location:frontTeam.php");
			}
			else{
				if($_POST['ProductOptions'] == "Single product details"){
					header("Location:frontProduct.php");
				}
				else{
					header("Location:frontTotalProduct.php");
				}
			}
		}
	}
	else{
		header("Location:index.php");
	}


?>