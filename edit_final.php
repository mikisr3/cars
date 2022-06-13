
<?php 
	
	session_start();
	
	if(isset($_GET['Edit_Row'])){
		
		
		//echo "kolreeeeeeee";
		
		$_SESSION['pic']="";
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
?>








<!DOCTYPE html>

<html>
	<head>
		
		<link rel = "stylesheet" type = "text/css" href = "index1.css">
		
	</head>
	
	<?PHP
		
		//connect to the server
		
		$connect = mysqli_connect("localhost","root","");
		
		//connect to the database
		
		mysqli_select_db($connect,"cars");
		
		$n = "SELECT * FROM _color_id";
		$m = "SELECT * FROM _doortype";
		$x1 = "SELECT _color_id.ColorName FROM _color_id";
		$y = "SELECT _doortype.DoorName FROM _doortype";
		$query = mysqli_query($connect,$x1);
		$query1 = mysqli_query($connect,$y);
		$query3 = mysqli_query($connect,$n);
		$query4 = mysqli_query($connect,$m);
		
		
		//query the database
		$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image,cars.comment
		
		FROM cars
		
		JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
		
		JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
		
		ORDER BY cars.PK_id ASC";
		
		$query2 = mysqli_query($connect,$x);
		
		if(isset($_GET['Edit_Row'])){$p = $_GET['Edit_Row'];}
		
		if(isset($p)){ 
			
			
			
			WHILE($rows = mysqli_fetch_array($query2)):
			
			if($rows['PK_id'] == $p){
				
				$carname = $rows['CarName'];
				$colorname = $rows['ColorName'];
				$doortype = $rows['DoorName'];
				$imagename = $rows['image'];
				$_SESSION['pic'] = $rows['image'];
				$comment = $rows['comment'];
				
			}
			
			
			
			endwhile;
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$car = $_POST['imekola'];
			$color = $_POST['dropdown'];
			$door = $_POST['dropdown1'];
			// $img = $_POST['image_name'];
			// $comm = $_POST['comment_cars'];
			
		}
		
		// echo $imagename;
		// echo $comment;
	?>
	
	
	
	
	
	<body>
		
		
		<div class = "create_edit">
			<form action = "edit_final.php" method = "post" enctype="multipart/form-data" style = "float:left;padding:10px;">
				
				
				<?php
					
					
					
					echo "Select car color : <select name = 'dropdown'>";
					
					if(isset($color)){echo '<option value = "'.$color.'" selected>' .$color. '</option>';}
					
					WHILE($rows = mysqli_fetch_array($query)):
					
					
					if($colorname == $rows['ColorName']){
						
						echo '<option value = "'.$rows['ColorName'].'" selected>'.$rows['ColorName'].'</option>';
						
						}else{
						
						if($color != $rows['ColorName']){              
							
						echo '<option value = "'.$rows['ColorName'].'">' .$rows['ColorName']. '</option>';}}
						
						endwhile;
						
						echo "</select>";
						
				?>
				
				<br>
				<br>
				
				<?php
					
					echo "Select door type : <select name = 'dropdown1'>";
					
					if(isset($door)){echo '<option value = "'.$door.'" selected>' .$door. '</option>';}
					
					WHILE($rows = mysqli_fetch_array($query1)):
					
					if($doortype == $rows['DoorName']){
						
					echo '<option value = "'.$rows['DoorName'].'" selected>' .$rows['DoorName']. '</option>';}
					
					else {
						
						if($door != $rows['DoorName']){
							
						echo '<option value = "'.$rows['DoorName'].'">' .$rows['DoorName']. '</option>';}}
						
						endwhile;
						
						echo "</select>";
						
				?>
				<?php //if(isset($imagename)){echo "image/car.PNG";}else{echo $img;}?>
				<br>
				<br>
				Type car model: <input type = "text" name = "imekola" value = "<?php if(isset($carname)){echo $carname;}else{echo $car;}?>">
				
				<input type = "hidden" name = "id_variable" value = "<?php if(isset($p)){echo $p;}?>">
				<input type = "hidden" name = "counter_variable" value = "<?php if(isset($c)){echo $c;}?>">
				<br><br>
				<div style="white-space:nowrap">
					<label for="id1">Current Image: </label>
					<img id="id1" src="<?php if(isset($imagename)){echo "image/".$imagename;}else{ echo "image/".$_SESSION['pic'];}  ?>" style="width:200px;height:100px;vertical-align:top;">
				</div>
				<br>
				
				<div style="white-space:nowrap">
					<label for="id1">Select Image: </label>
					<input type="file" id="id1" name="image_name" value="">
				</div>
				<br>
				<div style = "white-space:nowrap" >
					<label for="w3review">Comment: 
						<textarea  style = "vertical-align:top;text-align:left" id="w3review" name="comment_cars" rows="4" cols="35" autofocus>
							<?php if(isset($comment)){echo $comment;}?>
						</textarea>
					</label>
					
					
				</div>
				<br>
				<br>
				<input type = "submit" name = "formsubmit" value = "UPDATE" class = "edit_submit_2">
				
				
			</form>
			<form action = "index.php" method = "post">
				<input type = "submit" name = "back_submit" value = "BACK" class = "edit_submit_2_back_edit">
			</form>
		</div>
		<?php
			if(isset($_POST['formsubmit'])){
				
				if(empty($_POST['imekola'])){echo "Enter car model name!";}
				
				else { 
					
					$post_color = $_POST['dropdown'];
					$post_door = $_POST['dropdown1'];
					$post_car = $_POST['imekola'];
					$id_number = $_POST['id_variable'];
					$commentCar = $_POST['comment_cars'];
					$filename = $_FILES['image_name']['name'];
					$tempname = $_FILES['image_name']['tmp_name']; 
					$folder = "image/".$filename;
					
					
					WHILE($rows = mysqli_fetch_array($query3)):
					
					$q = $rows['PK_id'];
					if($rows['ColorName']==$post_color){
						
						WHILE($rows = mysqli_fetch_array($query4)):
						
						$w = $rows['PK_id'];
						if($rows['DoorName']==$post_door){
							
							if(!empty($_FILES['image_name']['name'])){
								
								$r = "UPDATE cars SET FK_color_id = '$q',FK_doorType = '$w',CarName = '$post_car',image = '$filename',comment = '$commentCar' WHERE PK_id = '$id_number'";
								}else{
								
								$r = "UPDATE cars SET FK_color_id = '$q',FK_doorType = '$w',CarName = '$post_car',comment = '$commentCar' WHERE PK_id = '$id_number'";
								
								
								
							}
							
							if(isset($r)){ 
								
								if(mysqli_query($connect,$r)==TRUE){
									
									
									if (move_uploaded_file($tempname, $folder))  {
										echo '<p class = "pmsg">New image uploaded successfully</p>';
										}else{
										echo '<p class = "pmsg">Failed to upload new image</p>';
									}
									
									
									
									
									echo'<div class = "create1_result1">New Update Created Successfully
									<form action = "index.php" method = "post"><br>
									
									<button type = "submit" name = "ok" value = "" class = "edit_submit">OK</button>
									</form></div>';
									
									
									
									
								}}
								else {echo"error updating!";}
								
						}
						endwhile;
					}
					
					endwhile;
					
					
				}
				
				
				
			}
			
		?>
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>
	</html>										