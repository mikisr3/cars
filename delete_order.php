<html>
	
	<head>
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
			
			$x = "SELECT * FROM order_table";
			
			$query = mysqli_query($connect,$x);
			
			
			
			
			
			
			
			
			
			
			
			
			
			if(isset($_GET['Delete_Order'])){
				
				
				
				$id = $_GET['Delete_Order'];
				
				echo $id;
				echo "mikiiiiiiiiiiiiiiiiiiiiiiiiiii";
				
				$sql = "DELETE FROM order_table WHERE order_table.FK_id = $id ";
				
				if(mysqli_query($connect,$sql)==TRUE){ 
					
					
					echo "<script>
					
					window.alert('Order Deleted Successfully')
					window.location = 'view_order_table.php';
					
					</script>";
					
					
				}
				
				else{echo"error";}
				
			}
			
			if(isset($_POST['Delete_Orders'])){
				
				//echo "mikiiiiiiiiiiii";
				
				// echo "<script>
				
				// window.alert('Uspeh')
				// window.location = 'view_order_table.php';
				
				// </script>";
				$checkbox = array();
				$FK_id = array();
				
				if(isset($_POST['Check_Row'])){
				$checkbox =  $_POST['Check_Row'];
				}else{
				
				echo "<script>
				
				window.alert('Empty Checkboxes!')
				window.location = 'view_order_table.php';
				
				</script>";
				
				
				
				
				
				
				}
				WHILE($rows = mysqli_fetch_array($query)):
				
				
				array_push($FK_id,$rows['FK_id']);
				
				
				endwhile;
				
				for ($x = 0; $x < count($checkbox); $x++){
					
					for($y = 0; $y < count($FK_id); $y++){
						if($checkbox[$x] == $FK_id[$y]){
							
							$id = $FK_id[$y];
							
							//echo "ok ",$pk_id[$y],"</br>";
							
							$sql = "DELETE FROM order_table WHERE order_table.FK_id = $id ";
							
							if(mysqli_query($connect,$sql)==TRUE){ 
								
								
								echo "<script>
								
								window.alert('Orders Deleted Successfully')
								window.location = 'view_order_table.php';
								
								</script>";
								
								
							}
							
						}
					}
					
				}
				
			}
			
		?>
		
		
		
	</head>
</body>