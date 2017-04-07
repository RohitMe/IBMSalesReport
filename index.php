
<!DOCTYPE html>

<html lang="en">

<head>

  <title>Bootstrap Example</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


</head>

<body>
<div class="bootstrap-iso">
	<div class="container-fluid">
		<h1></h1>
		<form class="form-horizontal" action="navigation.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-1" for="date1"></label>
					<div class="col-sm-3">
						<input class="form-control" id="date1" name="date1" placeholder="FROM : YYYY/MM/DD" type="text"/>
					</div>
					<label class="control-label col-sm-1" for="date2"></label>
					<div class="col-sm-3">
						<input class="form-control" id="date2" name="date2" placeholder="To : YYYY/MM/DD" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-1" for="name1"></label>
					<div class="col-sm-7">
						<select name="name1" id="name1" class="form-control">
							<option></option>
							<option>user</option>
							<option>team</option>
						</select>
					</div>
				</div>
				<div class="form-group" id="userNameForm">
						<label class="control-label col-sm-1" for="text"></label>
						<div class="col-sm-7">
							<input type="text" name="userName" class="form-control" placeholder="User Name">
						</div>
				</div>
				<div class="form-group" id="TeamNameForm">
						<label class="control-label col-sm-1" for="text"></label>
						<div class="col-sm-7">
							<input type="text" name="TeamName" class="form-control" placeholder="Team Name">
						</div>
				</div>
				<div class="form-group" id="TeamNameDetails">
					<label class="control-label col-sm-1" for="TeamOptions"></label>
					<div class="col-sm-7">
						<select name="TeamOptions" id="TeamOptions"  class="form-control">
							<option></option>
							<option>Team details</option>
							<option>Product details</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="ProductNameDetails">
					<label class="control-label col-sm-1" for="name1"></label>
					<div class="col-sm-7">
						<select name="ProductOptions" id="ProductOptions" class="form-control">
							<option></option>
							<option>Single product details</option>
							<option>Multiple product details</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="SPNameForm">
						<label class="control-label col-sm-1" for="text"></label>
						<div class="col-sm-7">
							<input type="text" name="SPeamName" class="form-control" placeholder="Product Name">
						</div>
				</div>
				
				<div class="form-group" id="submit1">
					<div class="col-sm-offset-1 col-sm-10">
						<button type="submit" name="submit" class="btn btn-success">Submit</button>
					</div>
				</div>
				
		</form>
	</div>
</div>
<script>
//$("#userName").hide();



 $(document).ready(function(){ 
 
	$("#userNameForm").hide();
	$("#submit1").hide();
	$("#TeamNameForm").hide();
	$("#TeamNameDetails").hide();
	$("#ProductNameDetails").hide();
	$("#SPNameForm").hide();
      var date_input=$('input[name="date1"]'); //our date input has the name "date"
      var options={
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  
	  var date_input2=$('input[name="date2"]');
	  date_input2.datepicker(options);
	  
	  
	  
    });
	
	
	$('#name1').on('change',function(){
        if( $(this).val()==="user"){
			$("#userNameForm").show();
			$("#TeamNameForm").hide();
			$("#TeamNameDetails").hide();
			$("#ProductNameDetails").hide();
			$("#SPNameForm").hide();
			$("#submit1").show();
		}
		else if ($(this).val()==="team"){
			$("#userNameForm").hide();
			$("#TeamNameForm").show();
			$("#TeamNameDetails").show();
			$("#ProductNameDetails").hide();
			$("#SPNameForm").hide();
			$("#submit1").hide();
			
		}
        else{
			$("#userNameForm").hide();
			$("#TeamNameForm").hide();
			$("#TeamNameDetails").hide();
			$("#ProductNameDetails").hide();
			$("#SPNameForm").hide();
			$("#submit1").hide();
        }
    });
	
	$('#TeamOptions').on('change',function(){
		//$("#ProductNameDetails").show();
        if( $(this).val()==="Product details"){
			$("#ProductNameDetails").show();
			$("#SPNameForm").hide();
			$("#submit1").hide();
		}
		else if($(this).val()==="Team details"){
			$("#SPNameForm").hide();
			$("#submit1").show();
		}
		else{
			$("#ProductNameDetails").hide();
			$("#SPNameForm").hide();
			$("#submit1").hide();
        }
    });
	
	$('#ProductOptions').on('change',function(){
		
        if( $(this).val()==="Single product details"){
			$("#SPNameForm").show();
			$("#submit1").show();
		}
		else if($(this).val()==="Multiple product details"){
			$("#submit1").show();
			$("#SPNameForm").hide();
		}
		else{
			$("#SPNameForm").hide();
			$("#submit1").hide();
        }
    });
	
	
	

</script>
</body>

</html>

​

