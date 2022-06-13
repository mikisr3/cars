<?php 
	
	session_start();
	
	if(isset($_GET['Edit_Order'])){
		
		
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
		
		include dirname(__DIR__).'/cars/api/DB_Connect.php';
		
		include dirname(__DIR__).'/cars/api/DB_Functions.php';
		
		$obj = new DB_Connect;
		
		$obj->connect();
		$obj1 = new DB_Functions;
		
		$connect = mysqli_connect("localhost","root","");
		
		//connect to the database
		
		mysqli_select_db($connect,"cars");
		
		$n = "SELECT * FROM _color_id";
		$m = "SELECT * FROM _doortype";
		$x1 = "SELECT _color_id.ColorName FROM _color_id";
		$y = "SELECT _doortype.DoorName FROM _doortype";
		
		$n1 = "SELECT * FROM order_table";
		
		
		$query = mysqli_query($connect,$x1);
		$query1 = mysqli_query($connect,$y);
		$query3 = mysqli_query($connect,$n);
		$query4 = mysqli_query($connect,$m);
		$query5 = mysqli_query($connect,$n1);
		
		
		//query the database
		$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image,cars.comment
		
		FROM cars
		
		JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
		
		JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
		
		ORDER BY cars.PK_id ASC";
		
		$query2 = mysqli_query($connect,$x);
		
		if(isset($_GET['Edit_Order'])){$p = $_GET['Edit_Order'];}
		
		//echo $p;
		if(isset($p)){
			WHILE($rows = mysqli_fetch_array($query5)):
			
			if($rows['FK_id'] == $p){
				
				
				$_SESSION['PK_id'] = $rows['PK_id'];
				$_SESSION['Quantity'] = $rows['Quantity'];
				$_SESSION['Customer'] = $rows['Customer'];
				
				// echo $rows['PK_id'];
				
				// $_SESSION['PK_id']=$rows['PK_id'];
				
				// echo $_SESSION['PK_id'];
				$_SESSION['OrderNumber'] = $rows['OrderNumber'];
				// $imagename = $rows['image'];
				// $_SESSION['pic'] = $rows['image'];
				// $comment = $rows['comment'];
				
			}
			
			
			
			endwhile;
			
			
			WHILE($rows = mysqli_fetch_array($query2)):
			
			if($rows['PK_id'] == $_SESSION['PK_id']){
				
				$_SESSION['DoorName'] = $rows['DoorName'];
				$_SESSION['CarName'] = $rows['CarName'];
				
				// echo $rows['PK_id'];
				
				// $_SESSION['PK_id']=$rows['PK_id'];
				
				// echo $_SESSION['PK_id'];
				$_SESSION['ColorName'] = $rows['ColorName'];
				$imagename = $rows['image'];
				
				
				// $imagename = $rows['image'];
				 $_SESSION['pic'] = $rows['image'];
				// $comment = $rows['comment'];
				
			}
			
			
			
			endwhile;
		}
		
	?>
	
	
	
	
	
	<body>
		
		
		<div class = "create_edit">
			<form action = "edit_order.php" method = "post" enctype="multipart/form-data" style = "float:left;padding:10px;">
				
				
				<?php
					
					
					
					echo "Car color: ",$_SESSION['ColorName'];
					
					//echo $_SESSION['PK_id'];
					
					
					
					
					
					
					
					
					
				?>
				
				<br>
				<br>
				
				<?php
					
					echo "Door type: ",$_SESSION['DoorName'];
					
					
					
				?>
				<?php //if(isset($imagename)){echo "image/car.PNG";}else{echo $img;}?>
				<br>
				<br>
				Car model: <?php echo $_SESSION['CarName']; ?>
				<br>
				
				<input type = "hidden" name = "id_variable" value = "<?php if(isset($p)){echo $p;}?>">
				<input type = "hidden" name = "counter_variable" value = "<?php if(isset($c)){echo $c;}?>">
				<br><br>
				<div style="white-space:nowrap">
					<label for="id1">Car Image: </label>
					<img id="id1" src="<?php if(isset($imagename)){echo "image/".$imagename;}else{ echo "image/".$_SESSION['pic'];}  ?>" style="width:200px;height:100px;vertical-align:top;">
				</div>
				<br>
				
				Quantity: 
				
				<select name="cars" id="cars">
					
					<?php 
						if(isset($_SESSION['Quantity'])){echo '<option value = "'.$_SESSION['Quantity'].'" selected>' .$_SESSION['Quantity']. '</option>';}
						
					?>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				
				
				<br>
				<br>
				
				Customer: 
				<?php
					
					echo '<input type = "text" name = "Customer_name"  value = "'.$_SESSION['Customer'].'" >';
					
				?>
				<br>
				<br>
				
				Order Number: 
				
				<?php
					
					echo'<input type = "text" name = "Order_Number_Name" value = "'.$_SESSION['OrderNumber'].'">';
					
				?>
				<br>
				<br>
				<!--- <div style = "white-space:nowrap" >
					<label for="w3review">Comment: 
					<textarea  style = "vertical-align:top;text-align:left" id="w3review" name="comment_cars" rows="4" cols="35" autofocus>
					<?php //if(isset($comment)){echo $comment;}?>
					</textarea>
					</label>
					
					
				</div> --->
				<br>
				<br>
				
				
				
				
				
				<input type = "submit" name = "formsubmit" value = "UPDATE" class = "edit_submit_purchase">
				
				
				
				
				
				
			</form>
			<form action = "view_order_table.php" method = "post">
				<input type = "submit" name = "back_submit" value = "BACK" class = "edit_submit_purchase_back">
			</form>
		</div>
		<?php
			if(isset($_POST['formsubmit'])){
				
				
				
				
				
				
				$post_quantity = $_POST['cars'];
				
				
				
				$post_customer = $_POST['Customer_name'];
				
				
				
				$id_number = $_POST['id_variable'];
				
				
				$post_order_number = $_POST['Order_Number_Name'];
				
				
				
				$datum=date('Y-m-d H:i:s');
				
				//if($post_quantity && $post_customer && $id_number && $post_order_number  )
				
				//$r = "UPDATE cars SET FK_color_id = '$q',FK_doorType = '$w',CarName = '$post_car',image = '$filename',comment = '$commentCar' WHERE PK_id = '$id_number'";
				
				$r = "UPDATE order_table SET Quantity = '$post_quantity',Customer = '$post_customer',OrderNumber = '$post_order_number',Date = '$datum'  WHERE FK_id = '$id_number'";
				
				//$r =  "INSERT INTO order_table (PK_id,Quantity,Customer,OrderNumber,Date) VALUES ('$id_number','$post_quantity','$post_customer','$post_order_number','$datum') ";
				if(mysqli_query($connect,$r)==TRUE){
					
					
					
					
					echo'<div class = "create1_addCar">New UPDATE Created Successfully<br><br>
					
					
					<table>
					<tr><td>Key Updated: '.$id_number.'</td></tr>
					
					<tr><td>Quantity: '.$post_quantity .'</td></tr>
					
					<tr><td>Customer: '.$post_customer.'</td></tr>
					
					<tr><td>Order Number: '.$post_order_number.'</td></tr>
					</table><br>
					
					<form action = "view_order_table.php" method = "post">
					<button type = "submit" name = "ok" class = "edit_submit_view_orders">VIEW ORDERS</button>
					
					</form></div>';
					
					
				}else echo "Error: " . $r . "<br>" . $connect->error;
				
				
				
				
				
				
				
				
				
				
				
				
				// WHILE($rows = mysqli_fetch_array($query3)):
				
				// $q = $rows['PK_id'];
				// if($rows['ColorName']==$post_color){
				
				// WHILE($rows = mysqli_fetch_array($query4)):
				
				// $w = $rows['PK_id'];
				// if($rows['DoorName']==$post_door){
				
				// if(!empty($_FILES['image_name']['name'])){
				
				// $r = "UPDATE cars SET FK_color_id = '$q',FK_doorType = '$w',CarName = '$post_car',image = '$filename',comment = '$commentCar' WHERE PK_id = '$id_number'";
				// }else{
				
				// $r = "UPDATE cars SET FK_color_id = '$q',FK_doorType = '$w',CarName = '$post_car',comment = '$commentCar' WHERE PK_id = '$id_number'";
				
			
			
			// }
			
			// if(isset($r)){ 
			
			// if(mysqli_query($connect,$r)==TRUE){
			
			
			// if (move_uploaded_file($tempname, $folder))  {
			// echo '<p class = "pmsg">New image uploaded successfully</p>';
			// }else{
			// echo '<p class = "pmsg">Failed to upload new image</p>';
			// }
			
			
			
			
			// echo'<div class = "create1_result1">New Update Created Successfully
			// <form action = "index.php" method = "post"><br>
			
			// <button type = "submit" name = "ok" value = "" class = "edit_submit">OK</button>
			// </form></div>';
			
			
			
			
			// }}
			// else {echo"error updating!";}
			
			// }
			// endwhile;
			// }
			
			// endwhile;
			
			
			
			
			
			
			}
			
			
			
			?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</body>
			</html>																									