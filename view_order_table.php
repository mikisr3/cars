<!DOCTYPE html>

<html>
	<head>
		
		<script>
			
			function showCustomer(str) {
				if (str == "") {
					document.getElementById("carHere").innerHTML = "";
					return;
					} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("carHere").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","getCustomer.php?q=" + str,true);
					xmlhttp.send();
				}
			}
			
			
			
			
			
			
			
			
			
			
			
			
		

</script>

<link rel = "stylesheet" type = "text/css" href = "index1.css">

</head>

<?php 
	
	include dirname(__DIR__).'/cars/api/DB_Connect.php';
	
	include dirname(__DIR__).'/cars/api/DB_Functions.php';
	
	$obj = new DB_Connect;
	
	$obj->connect();
	$obj1 = new DB_Functions;
	
	$connect = mysqli_connect("localhost","root","");
	
	//connect to the database
	
	mysqli_select_db($connect,"cars");
	
	$x = "SELECT * FROM order_table
	
	ORDER BY order_table.date ASC
	
	
	
	";
	
	
	
	
	//echo date('Y-m-d H:i:s');
	
	echo'<label>Customer: </label><input type="text" onkeyUp = "showCustomer(this.value);" placeholder = "Enter Customer" autofocus>';
	echo'<label>     ID Number: </label><input type="number" onkeyUp = "showCustomer(this.value);" placeholder = "Enter ID" autofocus>';
	echo'<label>     Order Number: </label><input type="number" onkeyUp = "showCustomer(this.value);" placeholder = "Enter OrderNumber" autofocus>';
	echo'<label>     Date: </label><input type="date" onchange = "showCustomer(this.value);" placeholder = "Enter Date" autofocus>';
	
	echo '<br><br>';
	
	$query = mysqli_query($connect,$x);
	$f = array('PK_id','Quantity','Customer','Order Number','Date','FK_id','','');
	$f1 = array('PK_id','Quantity','Customer','OrderNumber','Date','FK_id');
	
	
	
	echo'<div id ="carHere1" class="create1_result" ><b></b>
	
	</div>';
	
	
	echo'<div id ="carHere" class="create1_result" ><b></b>
	
	</div>';
	
	
	
	
	
	
	
	//$obj1->Draw_Table_Order($f,$query,$f1);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>

<body>
	
	
	
	<div id="carHere"></div>
	
	
	
	
	
	
	</body>
	</html>
	
		