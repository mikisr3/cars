
<?php
	// Start the session
	session_start();
	
	
	
	
	
	
	if(isset($_POST['Submit_radio'])){
		
		$_SESSION['check_box']=array();
		$_SESSION['check_box_header']=array();
		
		
		
		
	}
	
	if(isset($_POST['gender'])){
		
		$_SESSION['next_inc']=5;
		$_SESSION['back_inc']=5;
		$_SESSION['init']=0;
		
		
		
	}
	if(isset($_POST['NEXT']) ){
		$_SESSION['next_inc'] = $_SESSION['next_inc']+5;
		$_SESSION['back_inc'] = $_SESSION['next_inc'];
		//$_SESSION['back_inc'] = 0;
	}
	if(isset($_POST['BACK']) ){
		$_SESSION['back_inc'] = $_SESSION['back_inc']-5;
		$_SESSION['next_inc']=$_SESSION['back_inc'];
	}  
	
	
	
	
	
	
	
?>



<!DOCTYPE html>
<html>
	<head>
		
		<script type="text/javascript">
			var clicked=true;
			function onOff1(){
				
				
				
				if(clicked){
					
					clicked = false;
					document.getElementById("onOff").style.cssFloat="left";
					document.getElementById("onOff").innerHTML="ON";
					document.getElementById("onOff").value=0;
					
					
					}else {
					
					clicked = true;
					
					document.getElementById("onOff").style.cssFloat="right";
					document.getElementById("onOff").innerHTML="OFF";
					document.getElementById("onOff").value=1;
				}
				
				
				
				
			}
			
		</script>
		
		<link rel = "stylesheet" type = "text/css" href = "index1.css">
		
		
	</head>
	
	<body>
		<br>
		<?PHP
			
			include dirname(__DIR__).'/cars/api/DB_Connect.php';
			
			include dirname(__DIR__).'/cars/api/DB_Functions.php';
			
			$obj = new DB_Connect;
			
			$obj->connect();
			$obj1 = new DB_Functions;
			
			
			//echo $obj1->Add_Two_Numbers(3,5);
			
			
			
			
			//global $carname;
			
			//global $color_id;
			
			//global $doortype_id;
			//connect to the server
			
			$connect = mysqli_connect("localhost","root","");
			
			//connect to the database
			
			mysqli_select_db($connect,"cars");
			
			$z = "SELECT _color_id.ColorName FROM _color_id";
			
			$query2 = mysqli_query($connect,$z);
		?>
		
		
		
		
		
		<div class = "create" style = "height:100px;width:25%;">
			
			<form action = "index.php" method = "post" style = "float:left;padding:10px;">
				
				<?php
					
					
					
					echo "Select color <b>filter</b> : <select name = 'dropdown5'>";
					
					WHILE($rows = mysqli_fetch_array($query2)):
					
					echo '<option value = "'.$rows['ColorName'].'">' .$rows['ColorName']. '</option>';
					
					endwhile;
					
					echo "</select>";
					
				?>
				<input type = "submit" name = "formsubmit1" value = "Back to CARS" class = "edit_submit_21">
				<br>
				<br>
				<input type = "submit" name = "formsubmit" value = "View Table Cars Filtered by COLOR" class = "edit_submit_1">
				
			</form>
			
		</div>
		<form action = "createcar_final.php" method = "get" class = "addcar">
			<input type = "submit" name = "addsubmit" value = "Add CAR" class = "addcar1">
			
			
		</form>
		
		<form action = "search_car.php" method = "get" class = "addcar_search">
			<input type = "submit" name = "addsubmit" value = "Search CAR" class = "addcar1">
			
			
		</form>
		
		<form action = "view_order_table.php" method = "get" class = "order_search">
			<input type = "submit" name = "addsubmit" value = "Search ORDER" class = "addcar1_search">
			
			
		</form>
		<!--<form action = "index.php" method = "post">
			<div class = "block">
			<div class="b" id = "onOff" onclick = "onOff1()">
			
			
			</div>
			</div>
		</form> -->
		
		
		
		<form action = "index.php" method = "post">
			<div style="float:right;margin-right:200px;margin-top:-110px;border-style:ridge;padding:5px;background-color:#eee;">
				<strong>List Table:</strong>          Yes
				<input type="checkbox" name="gender" value="Yes"
				
				
				<?php
					
					
					if(isset($_POST['gender']) || isset($_POST['NEXT']) || isset($_POST['BACK'])  ){
						
						
						echo "checked";
						
						$Check = true;
						
						} else {
						
						
						$Check = false;
						
						
					}
					
					
					
					
					?>
					
					
					
					
					
					
					
					>
					<strong>Show Image:</strong> <input type="checkbox" name="Show[]" value="image" <?php 
						if(isset($_POST['Show'])){
							
							foreach($_POST['Show'] as $value)
							
							
							if($value == 'image'){
								
								echo "checked";
								
							}
							
						}
						
						
						//}?>>
						<strong>Show Comment:</strong> <input type="checkbox" name="Show[]" value="comment" <?php 
							if(isset($_POST['Show'])){
								
								foreach($_POST['Show'] as $value)
								
								
								if($value == 'comment'){
									
									echo "checked";
									
								}
								
							}
							
							
							//}?>>
							<strong>Show Date:</strong> <input type="checkbox" name="Show[]" value="date" <?php 
								if(isset($_POST['Show'])){
									
									foreach($_POST['Show'] as $value)
									
									
									if($value == 'date'){
										
										echo "checked";
										
									}
									
								}
								
								//} ?>>
								
								
								
								
								<input type="submit" name="Submit_radio" class = "addcar1">
							</div>
						</form>
						<br>
						
						<div id = "demo"></div>
						<br>
						
						
						<?php
							
							if(isset($_POST['formsubmit'])){
								
								$q = $_POST['dropdown5'];
								
								$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image,cars.comment,cars.date
								
								FROM cars
								
								JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
								
								JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
								
								
								WHERE _color_id.ColorName = '$q'
								
								
								ORDER BY cars.PK_id ASC";
								}else{
								$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image,cars.comment,cars.date
								
								FROM cars
								
								JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
								
								JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
								
								
								
								
								
								ORDER BY cars.PK_id ASC"
								
								;
								
							}
							
							
							
							if(isset($_POST['Submit_radio'])){
								
								
								if(isset($_POST['Show'])){
									
									
									
									if (is_array($_POST['Show'])) {
										foreach($_POST['Show'] as $value){
											
											
											array_push($_SESSION['check_box'],$value);
											
											switch($value){
												
												case 'image' : array_push($_SESSION['check_box_header'],'Image Name','Image');
												
												break;
												
												case 'comment' : array_push($_SESSION['check_box_header'],'Comment');
												
												break;
												case 'date' : array_push($_SESSION['check_box_header'],'Date');
												
												break;
												
											}
										}
									} 
									
									
								}
								
								$b = 0;
								
							}
							
							
							
							if((isset($_POST['Submit_radio'])&& $Check == true) || isset($_POST['NEXT']) || isset($_POST['BACK']) ) {
								
								if(isset($_POST['NEXT'])){
									
									
									
									
									$b = $_POST['NEXT'];
									
									
									
									//echo "post_next",$b;
									
									$_SESSION['init']=$_SESSION['init']+5;
									
									$inc = $_SESSION['init'];
									
									//echo $inc,"delta_inc";
									
								}else{$inc = 0;}
								
								if(isset($_POST['BACK'])) {
									
									
									
									$b = $_POST['BACK']-10;
									$_SESSION['init']=$_SESSION['init']-5;
									$inc = $_SESSION['init'];
									
									if($_POST['BACK']<=5){
										
										$b = 0;
										$_SESSION['next_inc']=5;
										$_SESSION['back_inc']=5;
										$inc = 0;
										$_SESSION['init']=0;
										
									}
									
								}
								
								
								
								$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image,cars.comment,cars.date
								
								FROM cars
								
								JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
								
								JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
								
								
								
								
								
								ORDER BY cars.PK_id ASC
								
								LIMIT 5 OFFSET $b
								";
								
							}
							
							$query = mysqli_query($connect,$x);
							
							$query_1 = mysqli_query($connect,$x);
							$query_2 = mysqli_query($connect,$x);
							
							
							if(!empty($_SESSION['check_box'])){
								
								$f = array('Counter','color_id','door_type','CarName','ColorName','DoorName');
								$f1 = array('FK_color_id','FK_doorType','CarName','ColorName','DoorName');
								
								if(!isset($_POST['gender']) && !isset($_POST['NEXT']) && !isset($_POST['BACK'])){
									
									$inc = 0;
									
								}
								
								$arr_new = array_merge(array_merge($f,$_SESSION['check_box_header']),array('',''));
								
								$arr_new1 = array_merge($f1,$_SESSION['check_box']);
								
								// echo "<br>";
								// print_r($arr_new);
								// echo"<br>";
								// print_r($arr_new1);
								
								$obj1->Draw_Table($inc,$Check,$arr_new,$query,$arr_new1);
								
								
								
								}else{
								
								
								
								
								
								$arr = array('Counter','color_id','door_type','CarName','ColorName','DoorName','','');
								// $a = array('','');
								// $arr_new = array_slice($arr,0,6);
								
								// print_r($arr_new);
								// echo"<br>";
								
								// array_push($arr_new,'image');
								// print_r($arr_new);
								// echo "<br>";
								// array_push($arr_new,'image');
								// print_r($arr_new);
								// echo "<br>";
								// print_r(array_merge($arr_new,$a));
								
								$arr1 = array('FK_color_id','FK_doorType','CarName','ColorName','DoorName');
								//$arr2 = array('Counter','CarName','Image Name','Image','Comment','','');
								//$arr3 = array('CarName','image','comment');
								// $arr4 = array('Counter','color_id','ColorName','','');
								// $arr5 = array('FK_color_id','ColorName');
								
								// $i=0;
								// WHILE($i < count($arr1)):
								// echo "\n","\n",$arr1[$i];
								// $i++;
								// endwhile;
								//echo count($arr);
								
								// echo mysqli_num_rows($query);
								
								// $info = mysqli_fetch_fields($query);
								
								// foreach ($info as $val) {
								// echo $val->name,"<br>";
								
								// }
								if(!isset($_POST['gender']) && !isset($_POST['NEXT']) && !isset($_POST['BACK'])){
									
									$inc = 0;
									
								}
								
							$obj1->Draw_Table($inc,$Check,$arr,$query,$arr1);}
							//$obj1->Draw_Table($inc,$Check,$arr2,$query_1,$arr3);
							// $obj1->Draw_Table($arr4,$query_2,$arr5);
							
							// $i = 0;
							
							if(isset($_POST['Delete_Rows'])){
								
								
								$checkbox = array();
								$pk_id = array();
								$checkbox =  $_POST['Check_Row'];
								
								WHILE($rows = mysqli_fetch_array($query_1)):
								
								
								array_push($pk_id,$rows['PK_id']);
								
								
								endwhile;
								
								for ($x = 0; $x < count($checkbox); $x++){
									
									for($y = 0; $y < count($pk_id); $y++){
										if($checkbox[$x] == $pk_id[$y]){
											
											$id = $pk_id[$y];
											
											//echo "ok ",$pk_id[$y],"</br>";
											
											$sql = "DELETE FROM cars WHERE cars.PK_id = $id ";
											
											if(mysqli_query($connect,$sql)==TRUE){ 
												
												
												echo "<script>
												
												window.alert('Records Deleted Successfully')
												window.location = 'index.php';
												
												</script>";
												
												
											}
											
										}
									}
									
								}
								
							}
							
							if(isset($_POST['Delete_Row'])){
								
								
								
								$id = $_POST['Delete_Row'];
								
								
								$sql = "DELETE FROM cars WHERE cars.PK_id = $id ";
								
								if(mysqli_query($connect,$sql)==TRUE){ 
									
									
									echo "<script>
									
									window.alert('Record Deleted Successfully')
									window.location = 'index.php';
									
									</script>";
									
									
								}
								
								else{echo"error";}
								
							}
							
							
							
							mysqli_close($connect);
							
						?>
					</body>
				</html>																																																																		