<html>
	<head>
		
		
		<link rel = "stylesheet" type = "text/css" href = "index1.css">
		
		
		
		<?php 
			
			include dirname(__DIR__).'/cars/api/DB_Connect.php';
			
			include dirname(__DIR__).'/cars/api/DB_Functions.php';
			
			$obj = new DB_Connect;
			
			$obj->connect();
			$obj1 = new DB_Functions;
			
			// $t = $_GET['checkColor'];
			
			// echo $t;
			
			$q =$_GET['q'];
			
			//echo $q;
			
			// echo "mite";
			
			// $r = $_GET['r'];
			// echo $r;
			
			
			
			$connect = mysqli_connect("localhost","root","");
			
			
			
			mysqli_select_db($connect,"cars");
			
			$x = "SELECT * FROM order_table
			
			
			WHERE order_table.Customer LIKE '$q%' OR order_table.OrderNumber LIKE '$q%' OR order_table.PK_id LIKE '$q%' OR order_table.Date='$q'
			
			";
			
			$query2 = mysqli_query($connect,$x);
			
			$f = array('PK_id','Quantity','Customer','Order Number','Date','','');
			$f1 = array('PK_id','Quantity','Customer','OrderNumber','Date');
			
			$obj1->Draw_Table_Order($f,$query2,$f1);
			
		?>
	</head>
</html>		