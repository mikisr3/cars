<!DOCTYPE html>
<html>
	<head>
		
		<script>
			
			function showCar(str) {
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
			xmlhttp.open("GET","getuser.php?q=" + str,true);
			xmlhttp.send();
		}
	}
	
	

</script>



<link rel = "stylesheet" type = "text/css" href = "index1.css">




</head>

<body>
	
	<?php
		
		include dirname(__DIR__).'/cars/api/DB_Connect.php';
		
		include dirname(__DIR__).'/cars/api/DB_Functions.php';
		
		$obj = new DB_Connect;
		
		$obj->connect();
		$obj1 = new DB_Functions;
		
		$connect = mysqli_connect("localhost","root","");
		
		//connect to the database
		
		mysqli_select_db($connect,"cars");
		
		
		
		//query the database
		$x = "SELECT _color_id.ColorName FROM _color_id";
		$y = "SELECT _doortype.DoorName FROM _doortype";
		$query = mysqli_query($connect,$x);
		$query1 = mysqli_query($connect,$y);
		//////////////////////////
		
		///////////////////////////////////////
		
		// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// $car = $_POST['imekola'];
			// $color = $_POST['dropdown'];
			// $door = $_POST['dropdown1'];
			
		// }
		
		
		
		mysqli_close($connect);
		
	?>
	<div class = "create1_search">
		
		
		<form>
			
			
			<?php
				
				echo "Select car color : <select name = 'dropdown' onchange = 'showCar(this.value)'>";
				
				if(isset($color)){echo '<option value = "'.$color.'" selected>' .$color. '</option>';}
				
				WHILE($rows = mysqli_fetch_array($query)):
				
				if($color != $rows['ColorName']){
					
				echo '<option value = "'.$rows['ColorName'].'">' .$rows['ColorName']. '</option>';}
				
				endwhile;
				
				echo "</select>";
				
			?>
			
			
			<br>
			<br>
			
			<?php
				
				echo "Select door type : <select name = 'dropdown1' onchange = 'showCar(this.value)'>";
				
				if(isset($door)){echo '<option value = "'.$door.'" selected>' .$door. '</option>';}
				
				WHILE($rows = mysqli_fetch_array($query1)):
				
				if($door != $rows['DoorName']){
					
				echo '<option value = "'.$rows['DoorName'].'">' .$rows['DoorName']. '</option>';}
				
				endwhile;
				
				echo "</select>";
				//echo"<input type='checkbox'>";
				
			?>
			
			<br>
			<br>
			Type car model: <input type = "text" name = "imekola" value = "<?php 
				
				
				
				?>" onkeyUp = "showCar(this.value);" placeholder = "Enter car name" autofocus>
				<br>
				<br>
				<input type = "submit" name = "formsubmit" value = "Search Car" class = "edit_submit_2" hidden>
				
				
			</form>
			<form action = "index.php" method = "post">
				<input type = "submit" name = "back_submit" value = "BACK" class = "edit_submit_2_back2">
			</form>
		</div>
		
		<div id ="carHere" class="create1_result" ><b></b>
			
		</div>
		
	</body>
	</html>							