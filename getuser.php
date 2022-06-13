
<html>
	<head>
		
		
		<link rel = "stylesheet" type = "text/css" href = "index1.css">
		
		
		
		<?php 
			
			include dirname(__DIR__).'/cars/api/DB_Connect.php';
			
			include dirname(__DIR__).'/cars/api/DB_Functions.php';
			
			$obj = new DB_Connect;
			
			$obj->connect();
			$obj1 = new DB_Functions;
			
			
			
			$q =$_GET['q'];
			
			
			
			
			
			$connect = mysqli_connect("localhost","root","");
			
			
			
			mysqli_select_db($connect,"cars");
			
			$x = "SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName,cars.image
			
			FROM cars
			
			JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			WHERE cars.CarName LIKE '$q%' OR _color_id.ColorName = '$q' OR _doortype.DoorName = '$q'
			
			ORDER BY cars.PK_id ASC";
			
			$query2 = mysqli_query($connect,$x);
			
			$arr = array('Counter','color_id','door_type','CarName','ColorName','DoorName','Image Name','Image','','','');
			$arr1 = array('FK_color_id','FK_doorType','CarName','ColorName','DoorName','image');
			
			$obj1->Draw_Table_Customer(4,false,$arr,$query2,$arr1);
			
		?>
	</head>
</html>		