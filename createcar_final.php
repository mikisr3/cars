<!DOCTYPE html>
<html>
	<head>
		
		<link rel = "stylesheet" type = "text/css" href = "index1.css">
		<link rel = "stylesheet" type = "text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
		
	</head>
	
	<body>
		
		<?php
			
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
			
			if ($_SERVER["REQUEST_METHOD"] == "POST"){
				
				$car = $_POST['imekola'];
				$color = $_POST['dropdown'];
				$door = $_POST['dropdown1'];
				
			}
			
			
			
			mysqli_close($connect);
			
		?>
		<div class = "create1">
			<form action = "createcar_final.php" method = "post" enctype="multipart/form-data">
				
				
				<?php
					
					echo "Select car color : <select name = 'dropdown'>";
					
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
					
					echo "Select door type : <select name = 'dropdown1'>";
					
					if(isset($door)){echo '<option value = "'.$door.'" selected>' .$door. '</option>';}
					
					WHILE($rows = mysqli_fetch_array($query1)):
					
					if($door != $rows['DoorName']){
						
					echo '<option value = "'.$rows['DoorName'].'">' .$rows['DoorName']. '</option>';}
					
					endwhile;
					
					echo "</select>";
					
				?>
				
				<br>
				<br>
				Type car model: <input style="font-family: 'Poppins', sans-serif;" type = "text" name = "imekola" value = "<?php 
					
					
					
					
					
					// if(isset($car)) {echo $car;} 
					
					
					
					
					
					
				?>" placeholder = "Enter car name" autofocus><br><br>
				<div style="white-space:nowrap">
					<label for="id1">Select Image: </label>
					<input type="file" id="id1" name="image_name" value="">
				</div>
				<br>
				<div style = "white-space:nowrap" >
					<label for="w3review">Comment: <textarea style = "vertical-align:top" id="w3review" name="comment_cars" rows="4" cols="35" autofocus>
						
					</textarea></label>
					
					
				</div>
				
				<br>
				<br>
				<input type = "submit" name = "formsubmit" onclick="My()" value = "Create Car" class = "edit_submit_2"><br>
				
				
				
				
				
				
				
				
				
			</form>
			<form action = "index.php" method = "post">
				<input type = "submit" name = "back_submit" value = "BACK" class = "edit_submit_2_back">
			</form>
		</div>
		
		
		<?php
			if(isset($_POST['formsubmit'])){
				$y = $_POST['dropdown'];
				$y1 = $_POST['dropdown1'];
				$commentCar = $_POST['comment_cars'];
				$filename = $_FILES['image_name']['name'];
				$tempname = $_FILES['image_name']['tmp_name']; 
				$folder = "image/".$filename;
				
				// echo $filename,"<br>";
				// echo $tempname;
				
				$y2 = $_POST['imekola'];
				
				$connect = mysqli_connect("localhost","root","");
				
				//connect to the database
				
				mysqli_select_db($connect,"cars");
				//query the database
				$x = "SELECT * FROM _color_id";
				$m = "SELECT * FROM _doortype";
				
				$query = mysqli_query($connect,$x);
				$query1 = mysqli_query($connect,$m);
				////
				
				
				
				
				/////
				
				
				
				if(empty($y2)){

					?> 


					<div id="myModal"
										class="modal">
										<!-- Modal content -->
										<div class="modal-content">
											<span class="close">&times;</span>
											
											<p class="pmsg">Enter Car Model!</p>
											
											
										</div>
									</div>




					 <?php
				}
				else{
					
					
					//fetch the results
					
					WHILE($rows = mysqli_fetch_array($query)):
					
					$q = $rows['PK_id'];
					
					
					if($rows['ColorName']==$y){
						
						WHILE($rows = mysqli_fetch_array($query1)):
						
						$w = $rows['PK_id'];
						
						
						if($rows['DoorName']==$y1){
							
							
							
							
							$datum=date('Y-m-d H:i:s');
							
							
							
							$r =  "INSERT INTO cars (date,image,comment,FK_color_id,FK_doorType,CarName) VALUES ('$datum','$filename','$commentCar','$q','$w','$y2') ";
							if(mysqli_query($connect,$r)==TRUE){
								
								?>
								
									<div id="myModal"
										class="modal">
										<!-- Modal content -->
										<div class="modal-content">
											<span class="close">&times;</span>
											<p class = "pmsg" style="font-size: 20px;"><?php 

											if (move_uploaded_file($tempname, $folder))  {
												echo 'Image uploaded successfully';
											}else{
												echo 'Failed to upload image';
											}


											 ?></p>
											<p class="pmsg">New Record Created Successfully!</p>
											<p class="pmsg" style="font-size: 15px;">Car Entered : <?php echo $y2; ?></p>
											
										</div>
									</div>

									<?php
								
								
								
								
								
								






																	
								
								
								
								
								
								
							}else echo "Error: " . $r . "<br>" . $connect->error;
							
						}
						endwhile;
					}
					
				endwhile;}
				
				
				mysqli_close($connect);
				
				
			}
		?>
		<script>
// Get the modal
var modal = document.getElementById("myModal");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function My() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

		
		
		
		
		
		</body>
		</html>																		