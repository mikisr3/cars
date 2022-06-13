







<?php
	
	
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL | E_STRICT);
	
	class DB_Functions {
		
        public $x;
		public $db;
		private $helper;
		
		function __construct() {
			
			require_once 'DB_Connect.php';
			// connecting to database
			$this -> db = new DB_Connect;
			$this -> db -> connect();	
			
		}
		
		// destructor
		function __destruct() {
			
		}
		
		public function Add_Two_Numbers($a,$b){
			
			$c = $a+$b;
			
			
			return $c;
			
		}
		
		
		
		public function Draw_Table($counter_list,$l,$array,$q,$array_Data){
			
			$i = 0;
			
			if($counter_list>=5){
				
				
				
				
				
				$j = $counter_list+1;
			}else{$j=1;}
			
			
			// $j = $counter_list;
			// $counter_list=$counter_list+5;
			
			
			
			
			
			
			//$j=1;
			$j1=0;
			//$next_inc = -5;
			
			echo "<form action = 'index.php' method = 'post'><table border = 3>
			<caption class = 'caption_font'>CARS</caption>";
			echo "<tr >";
			WHILE($i <= count($array)-1 ):
			
			echo "<th>".$array[$i]."</th>";
			$i++;
			endwhile;
			
			
			echo "<th>
			<button type = 'submit' name = 'Delete_Rows'  class = 'edit_submit_Delete_Rows'>Delete Rows</button>
			</th>";
			echo "</tr>";
			echo "<tr>
			<form action = 'edit_final.php' method = 'get' >
			
			<button type = 'submit' name = 'Edit_Row' class = 'edit_submit' hidden>Edit</button>
			
			</form>
			
			</tr>";
			
			WHILE($rows = mysqli_fetch_array($q)):
			
			
			
			$e = $rows['PK_id'];
			//echo $e,"<br>";
			
			echo "<tr id = '$e' onclick = 'proba($e)'>";
			echo "<td>".$j."</td>";
			
			
			
			foreach ($array_Data as $val) {
				echo "<td>" .$rows[$val]. "</td>";
				if($val == 'image'){
					echo "<td><div id=''>";
					echo "<img src='image/".$rows[$val]."'; width = '150px';height = '120px' >";
					//echo "<p>".$rows[$val]."</p>";
					echo "</div></td>";
					
					
					
				}
			}
			
			
			
			
			echo "<td><form action = 'edit_final.php' method = 'get'>
			
			<button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			</form></td>";
			echo "<td>
			
			
			<button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			
			</td>";
			echo "<td>
			
			<input type = 'checkbox' name = 'Check_Row[]' value = '$e' >
			
			</td>";
			
			echo "</tr>";
			$j++;
			endwhile;
			
			
			
			
			echo "</table></form>";
			
			if($l){
				
				
				
				$next_inc=$_SESSION['next_inc'];
				
				
				$back_inc = $_SESSION['back_inc'];
				
				
				echo "<table>";
				echo "<tr><br></tr>";
				echo "<tr>
				
				
				
				
				
				
				<button type = 'submit' name = 'BACK' value = '$back_inc'  class = 'BACK_submit'>BACK</button>
				&nbsp
				
				<button type = 'submit' name = 'NEXT'   value = '$next_inc' class = 'NEXT_submit'>NEXT</button>
				
				</tr>";
				
				echo "</table>";
			}
			
			
			
			
			
			
			
			
			
			
		}
		
		public function Draw_Table_Customer($counter_list,$l,$array,$q,$array_Data){
			
			$i = 0;
			
			if($counter_list>=5){
				
				
				
				
				
				$j = $counter_list+1;
			}else{$j=1;}
			
			
			// $j = $counter_list;
			// $counter_list=$counter_list+5;
			
			
			
			
			
			
			//$j=1;
			$j1=0;
			//$next_inc = -5;
			
			echo "<form action = 'index.php' method = 'post'><table border = 3>
			<caption class = 'caption_font'>CARS</caption>";
			echo "<tr >";
			WHILE($i <= count($array)-1 ):
			
			echo "<th>".$array[$i]."</th>";
			$i++;
			endwhile;
			
			
			echo "<th>
			<button type = 'submit' name = 'Delete_Rows'  class = 'edit_submit_Delete_Rows'>Delete Rows</button>
			</th>";
			echo "</tr>";
			echo "<tr>
			<form action = 'edit_final.php' method = 'get' >
			
			<button type = 'submit' name = 'Edit_Row' class = 'edit_submit' hidden>Edit</button>
			
			</form>
			
			</tr>";
			
			WHILE($rows = mysqli_fetch_array($q)):
			
			
			
			$e = $rows['PK_id'];
			//echo $e,"<br>";
			
			echo "<tr id = '$e' onclick = 'proba($e)'>";
			echo "<td>".$j."</td>";
			
			
			
			foreach ($array_Data as $val) {
				echo "<td>" .$rows[$val]. "</td>";
				if($val == 'image'){
					echo "<td><div id=''>";
					echo "<img src='image/".$rows[$val]."'; width = '150px';height = '120px' >";
					//echo "<p>".$rows[$val]."</p>";
					echo "</div></td>";
					
					
					
				}
			}
			
			
			
			
			echo "<td><form action = 'edit_final.php' method = 'get'>
			
			<button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			</form></td>";
			echo "<td>
			
			
			<button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			
			</td>";
			
			echo "<td><form action = 'order_car.php' method = 'get'>
			
			
			<button type = 'submit' name = 'Order_Row' value = '$e' class = 'edit_submit'>Order</button>
			
			</form></td>";
			
			
			
			
			
			
			
			
			echo "<td>
			
			<input type = 'checkbox' name = 'Check_Row[]' value = '$e' >
			
			</td>";
			
			echo "</tr>";
			$j++;
			endwhile;
			
			
			
			
			echo "</table></form>";
			
			if($l){
				
				
				
				$next_inc=$_SESSION['next_inc'];
				
				
				$back_inc = $_SESSION['back_inc'];
				
				
				echo "<table>";
				echo "<tr><br></tr>";
				echo "<tr>
				
				
				
				
				
				
				<button type = 'submit' name = 'BACK' value = '$back_inc'  class = 'BACK_submit'>BACK</button>
				&nbsp
				
				<button type = 'submit' name = 'NEXT'   value = '$next_inc' class = 'NEXT_submit'>NEXT</button>
				
				</tr>";
				
				echo "</table>";
			}
			
			
			
			
			
			
			
			
			
			
		}
		
		public function Draw_Table_Order($array,$q,$array_Data){
			
			$i = 0;
			
			// if($counter_list>=5){
			
			
			
			
			
			// $j = $counter_list+1;
			// }else{$j=1;}
			
			
			// $j = $counter_list;
			// $counter_list=$counter_list+5;
			
			
			
			
			
			
			//$j=1;
			$j1=0;
			//$next_inc = -5;
			
			echo "<form action = 'delete_order.php' method = 'post'><table border = 3>
			<caption class = 'caption_font'>ORDERS</caption>";
			echo "<tr >";
			WHILE($i <= count($array)-1 ):
			
			echo "<th>".$array[$i]."</th>";
			$i++;
			endwhile;
			
			
			echo "<th>
			
			
			<button type = 'submit' name = 'Delete_Orders'  class = 'edit_submit_Delete_Rows'>Delete Rows</button>
			</th>
			
			";
			
			echo "</tr>";
			echo "<tr>
			<form action = 'edit_final.php' method = 'get' >
			
			<button type = 'submit' name = 'Edit_Row' class = 'edit_submit' hidden>Edit</button>
			
			</form>
			
			</tr>";
			
			WHILE($rows = mysqli_fetch_array($q)):
			
			
			
			$e = $rows['PK_id'];
			$e1 = $rows['FK_id'];
			//echo $e,"<br>";
			
			echo "<tr id = '$e1' onClick = 'prikaz($e,$e1)'>";
			//echo "<td>".$j."</td>";
			
			
			
			foreach ($array_Data as $val) {
				echo "<td>" .$rows[$val]. "</td>";
				if($val == 'image'){
					echo "<td><div id=''>";
					echo "<img src='image/".$rows[$val]."'; width = '150px';height = '120px' >";
					//echo "<p>".$rows[$val]."</p>";
					echo "</div></td>";
					
					
					
				}
			}
			
			
			
			
			echo "<td><form action = 'edit_order.php' method = 'get'>
			
			<button type = 'submit' name = 'Edit_Order' value = '$e1' class = 'edit_submit'>Edit</button>
			</form></td>";
			echo "<td><form action = 'delete_order.php' method = 'get'>
			
			
			<button type = 'submit' name = 'Delete_Order' value = '$e1' class = 'edit_submit'>Delete</button>
			
			</form></td>";
			echo "<td>
			
			<input type = 'checkbox' name = 'Check_Row[]' value = '$e1' >
			
			</td>";
			
			echo "</tr>";
			//$j++;
			endwhile;
			
			
			
			
			echo "</table></form>";
			
			echo "<br>";
			
			echo "
			<form action = 'index.php' method = 'get'>
			
			
			<button type = 'submit' name = 'Edit_Row' value = '' class = 'edit_submit_view_order_back'>HOME</button>
			
			
			</form>
			
			";
			
			
			// if($l){
			
			
			
			// $next_inc=$_SESSION['next_inc'];
			
			
			// $back_inc = $_SESSION['back_inc'];
			
			
			// echo "<table>";
			// echo "<tr><br></tr>";
			// echo "<tr>
			
			
			
			
			
			
			// <button type = 'submit' name = 'BACK' value = '$back_inc'  class = 'BACK_submit'>BACK</button>
			// &nbsp
			
			// <button type = 'submit' name = 'NEXT'   value = '$next_inc' class = 'NEXT_submit'>NEXT</button>
			
			// </tr>";
			
			// echo "</table>";
			// }
			
			
			
			
			
			
			
			
			
			
		}
		
		public function Draw_Table_Search_Order($counter_list,$l,$array,$q,$array_Data){
			
			$i = 0;
			
			if($counter_list>=5){
				
			
			
			
			
			$j = $counter_list+1;
			}else{$j=1;}
			
			
			// $j = $counter_list;
			// $counter_list=$counter_list+5;
			
			
			
			
			
			
			//$j=1;
			$j1=0;
			//$next_inc = -5;
			
			echo "<form action = 'index.php' method = 'post'><table border = 3>
			<caption class = 'caption_font'>CARS</caption>";
			echo "<tr >";
			WHILE($i <= count($array)-1 ):
			
			echo "<th>".$array[$i]."</th>";
			$i++;
			endwhile;
			
			
			// echo "<th>
			// <button type = 'submit' name = 'Delete_Rows'  class = 'edit_submit_Delete_Rows'>Delete Rows</button>
			// </th>";
			echo "</tr>";
			echo "<tr>
			<form action = 'edit_final.php' method = 'get' >
			
			<button type = 'submit' name = 'Edit_Row' class = 'edit_submit' hidden>Edit</button>
			
			</form>
			
			</tr>";
			
			WHILE($rows = mysqli_fetch_array($q)):
			
			
			
			$e = $rows['PK_id'];
			//echo $e,"<br>";
			
			echo "<tr id = '$e' onclick = 'proba($e)'>";
			//echo "<td>".$j."</td>";
			
			
			
			foreach ($array_Data as $val) {
			echo "<td>" .$rows[$val]. "</td>";
			if($val == 'image'){
			echo "<td><div id=''>";
			echo "<img src='image/".$rows[$val]."'; width = '150px';height = '120px' >";
			//echo "<p>".$rows[$val]."</p>";
			echo "</div></td>";
			
			
			
			}
			}
			
			
			
			
			// echo "<td><form action = 'edit_final.php' method = 'get'>
			
			// <button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			// </form></td>";
			// echo "<td>
			
			
			// <button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			
			// </td>";
			// echo "<td>
			
			// <input type = 'checkbox' name = 'Check_Row[]' value = '$e' >
			
			// </td>";
			
			echo "</tr>";
			$j++;
			endwhile;
			
			
			
			
			echo "</table></form>";
			
			if($l){
			
			
			
			$next_inc=$_SESSION['next_inc'];
			
			
			$back_inc = $_SESSION['back_inc'];
			
			
			echo "<table>";
			echo "<tr><br></tr>";
			echo "<tr>
			
			
			
			
			
			
			<button type = 'submit' name = 'BACK' value = '$back_inc'  class = 'BACK_submit'>BACK</button>
			&nbsp
			
			<button type = 'submit' name = 'NEXT'   value = '$next_inc' class = 'NEXT_submit'>NEXT</button>
			
			</tr>";
			
			echo "</table>";
			}
			
			
			
			
			
			
			
			
			
			
			}
			
			// public function Drop_Down_color(){
			
			// $array = array();
			
			// $result = mysql_query("SELECT * FROM _color_id");
			// $result1 = mysql_query("SELECT * FROM _color_id");
			
			// while ($rows = mysql_fetch_assoc($result)){
			
			// $array[$rows['PK_id']]=$rows['ColorName'];
			
			// }
			// if ($_SERVER["REQUEST_METHOD"] == "GET"){
			
			// if(isset($_GET['dropdown'])){$color = $_GET['dropdown'];}
			
			// }
			
			
			// echo "<select name = 'dropdown'>";
			
			// if(isset($color)){echo '<option value = "'.$color.'" selected>' .$array[$color]. '</option>';}
			
			// WHILE($rows = mysql_fetch_array($result1)):
			
			// if($color!=$rows['PK_id']){
			
			// echo '<option value = "'.$rows['PK_id'].'">' .$rows['ColorName']. '</option>';}
			
			// endwhile;
			
			// echo "</select>";
			
			
			}
			// public function table(){
			
			// global $query;
			
			
			// $i = 0;
			
			
			// echo "<table border = 3>
			// <caption class = 'caption_font'>CARS</caption>
			// <tr>
			// <th>Counter</th>
			// <th>color_id</th>
			// <th>door_type</th>
			// <th>
			
			// <form action = 'index.php' method = 'get'>
			// <input  type = 'image' name = 'up' src = 'up.GIF' value = 'submit' style = 'width:15px;height:15px;float:left;padding:2px;'/>
			
			// <input type = 'image' name = 'down' src = 'down.GIF' value = 'submit' style = 'width:15px;height:15px;float:left;padding:2px;'/>
			
			// </form>
			
			// CarName</th>
			// <th>ColorName</th>
			// <th>DoorName</th>
			// <th></th>
			// <th></th>
			// </tr>";
			
			
			
			// WHILE($rows = mysql_fetch_array($query)):
			// $i++;
			
			// $e = $rows['PK_id'];
			
			// echo "<tr>";
			// echo "<td>".$i."</td>";
			// echo "<td>" .$rows['FK_color_id']. "</td>";
			// echo "<td>" .$rows['FK_doorType']. "</td>";
			// echo "<td>" .$rows['CarName']. "</td>";
			// echo "<td>" .$rows['ColorName']. "</td>";
			// echo "<td>" .$rows['DoorName']. "</td>";
			// echo "<td><form action = 'edit_final.php' method = 'get'>
			
			// <button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			// </form></td>";
			// echo "<td><form action = 'index.php' method = 'post'>
			// <button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			// </form></td>";
			
			// echo "</tr>";
			
			
			// endwhile;
			
			// echo "</table>";
			
			
			// }
			
			// public function table_1($count){
			
			
			
			// $i = 0;
			
			// echo "<table border = 3>
			// <caption class = 'caption_font'>CARS</caption>
			// <tr>
			// <th>Counter</th>
			// <th>color_id</th>
			// <th>door_type</th>
			// <th><form action = 'index.php' method = 'get'>
			// <input  type = 'image' name = 'up' src = 'up.GIF' value = 'submit' style = 'width:18px;height:18px;float:left;padding:2px;'/>
			
			// <input type = 'image' name = 'down' src = 'down.GIF' value = 'submit' style = 'width:18px;height:18px;float:left;padding:2px;'/>
			
			// </form>
			
			// CarName</th>
			// <th>ColorName</th>
			// <th>DoorName</th>
			// <th></th>
			// <th></th>
			// </tr>";
			
			
			
			// WHILE($rows = mysql_fetch_array($_SESSION['query'])):
			// $i++;
			
			// $e = $rows['PK_id'];
			
			// echo "<tr>";
			// echo "<td>".$i."</td>";
			// echo "<td>" .$rows['FK_color_id']. "</td>";
			// echo "<td>" .$rows['FK_doorType']. "</td>";
			// echo "<td>" .$rows['CarName']. "</td>";
			// echo "<td>" .$rows['ColorName']. "</td>";
			// echo "<td>" .$rows['DoorName']. "</td>";
			// echo "<td><form action = 'edit_final.php' method = 'get'>
			
			// <button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			// </form></td>";
			// echo "<td><form action = 'index.php' method = 'post'>
			// <button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			// </form></td>";
			
			// echo "</tr>";
			
			// if($i==$count){break;}
			// endwhile;
			
			// echo "</table>";
			
			
			// }         public function table_2($count){
			
			
			
			// $i = 0;
			
			// echo "<table border = 3>
			// <caption class = 'caption_font'>CARS</caption>
			// <tr>
			// <th>Counter</th>
			// <th>color_id</th>
			// <th>door_type</th>
			// <th>CarName</th>
			// <th>ColorName</th>
			// <th>DoorName</th>
			// <th></th>
			// <th></th>
			// </tr>";
			
			
			
			// WHILE($rows = mysql_fetch_array($_SESSION['query'])):
			// $i++;
			
			// $e = $rows['PK_id'];
			
			// echo "<tr>";
			// echo "<td>".$i."</td>";
			// echo "<td>" .$rows['FK_color_id']. "</td>";
			// echo "<td>" .$rows['FK_doorType']. "</td>";
			// echo "<td>" .$rows['CarName']. "</td>";
			// echo "<td>" .$rows['ColorName']. "</td>";
			// echo "<td>" .$rows['DoorName']. "</td>";
			// echo "<td><form action = 'edit_final.php' method = 'get'>
			
			// <button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			// </form></td>";
			// echo "<td><form action = 'index.php' method = 'post'>
			// <button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			// </form></td>";
			
			// echo "</tr>";
			
			// if($i==$count){break;}
			// endwhile;
			
			// echo "</table>";
			
			
			// }
			
			// public function delete(){
			
			
			// if(isset($_POST['Delete_Row'])){
			
			// $id = $_POST['Delete_Row'];
			
			
			// $sql = "DELETE FROM cars WHERE cars.PK_id = $id ";
			
			// if(mysql_query($sql)==TRUE){ 
			
			
			// echo "<script>
			
			// window.alert('Record Deleted Successfully')
			// window.location = 'index.php';
			
			// </script>";
			
			
			// }
			
			// else{echo"error";}
			
			// }
			
			
			
			// }
			
			
			// public function Drop_Down_doortype(){
			
			// $array = array();
			
			// $result = mysql_query("SELECT * FROM _doortype");
			// $result1 = mysql_query("SELECT * FROM _doortype");
			
			// while ($rows = mysql_fetch_assoc($result)){
			
			// $array[$rows['PK_id']]=$rows['DoorName'];
			
			// }
			
			// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// if(isset($_POST['dropdown1'])){$door = $_POST['dropdown1'];}
			
			// }
			
			
			// echo "<select name = 'dropdown1'>";
			
			// if(isset($door)){echo '<option value = "'.$door.'" selected>' .$array[$door]. '</option>';}
			
			// WHILE($rows = mysql_fetch_array($result1)):
			
			// if($door != $rows['PK_id']){
			
			// echo '<option value = "'.$rows['PK_id'].'">' .$rows['DoorName']. '</option>';}
			
			// endwhile;
			
			// echo "</select>";
			
			
			
			
			// }
			
			// public function input_car(){
			
			// global $car;
			
			// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// if(isset($_POST['imekola'])){$car = $_POST['imekola'];}
			// }
			// if(isset($car)){
			// echo '<input type = "text" name = "imekola" value = "'.$car.'" placeholder = "Enter car name" >';}
			// else{echo'<input type = "text" name = "imekola" value = "" placeholder = "Enter car name" autofocus>';}
			
			// }
			
			
			// public function input_car1($h){
			
			// global $car;
			
			// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// if(isset($_POST['imekola_update'])){$car = $_POST['imekola_update'];}
			// }
			// if(isset($car)){
			// echo '<input type = "text" name = "imekola_update" value = "'.$car.'" placeholder = "Enter car name" >';}
			// else{
			
			// if(isset($h)){echo'<input type = "text" name = "imekola_update" value = "'.$h.'" placeholder = "Enter car name">';}
			
			// else{echo'<input type = "text" name = "imekola_update" value = "" placeholder = "Enter car name" autofocus>';}
			
			
			
			
			// }
			
			// }
			
			
			
			// public function select(){
			// $_SESSION['up']=false;
			// $_SESSION['down']=false;
			
			
			// if(isset($_GET['up_x'],$_GET['up_y'])){ $_SESSION['up']=true;$_SESSION['down']=false;
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName ASC");
			
			// }else{ if(isset($_GET['down_x'],$_GET['down_y'])){$_SESSION['down']=true;$_SESSION['up']=false;
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName DESC");
			
			// }else{ if($_SESSION['up']==false or $_SESSION['down']==false){
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.PK_id ASC");
			
			// }}}
			// return ($_SESSION['query']);
			
			
			// }
			// public function insert_car($color_id,$door_type,$car_name){
			
			// global $r;
			
			
			// $r =  "INSERT INTO cars (FK_color_id,FK_doorType,CarName) VALUES ('$color_id','$door_type','$car_name') ";
			
			// if(mysql_query($r)==TRUE){ echo"New Record Created Successfully<br>";
			
			// echo '<form action = "index.php" method = "post">
			// <input type = "submit" name = "ok" value = "OK" class = "edit_submit">
			
			// </form>';
			
			
			// }
			
			
			// }               
			
			// public function func(){
			
			
			// if($_SESSION['up']==true){
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName ASC");
			
			
			// }else{if($_SESSION['down']==true){
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName DESC");
			
			
			
			// }else{
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.PK_id ASC");
			
			
			
			
			
			
			
			
			// }}
			
			// }
			
			
			
			
			// public function select_filter($filter){
			
			// global $query;
			
			// $query = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			// WHERE _color_id.PK_id = '$filter'
			
			
			// ORDER BY cars.PK_id ASC");
			
			// return ($query);
			
			
			
			
			
			
			
			
			
			// }         
			
			
			
			// public function select_filter1($filter){
			
			// global $query;
			
			// $query = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			// WHERE _color_id.PK_id = '$filter'
			
			
			// ORDER BY cars.CarName ASC");
			
			// return ($query);
			
			// }         
			
			// public function select_filter2($filter){
			
			// global $query;
			
			// $query = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			// WHERE _color_id.PK_id = '$filter'
			
			
			// ORDER BY cars.CarName DESC");
			
			// return ($query);
			
			
			// }         
			
			
			
			
			
			
			// public function update($y,$y1,$y2,$y3){
			
			// global $r;
			
			
			// $r = "UPDATE cars SET FK_color_id = '$y',FK_doorType = '$y1',CarName = '$y2' WHERE PK_id = '$y3'";
			
			// if(isset($r)){ 
			
			// if(mysql_query($r)==TRUE){echo"New Update Created Successfully";
			// echo'<form action = "index.php" method = "post">
			
			// <button type = "submit" name = "ok" value = "" class = "edit_submit">OK</button>
			// </form>';
			
			
			// }}
			// else {echo"error updating!";}
			
			
			
			// }            
			// public function Drop_Down_color1($h){
			
			// $array = array();
			
			// $result = mysql_query("SELECT * FROM _color_id");
			// $result1 = mysql_query("SELECT * FROM _color_id");
			
			// while ($rows = mysql_fetch_assoc($result)){
			
			// $array[$rows['PK_id']]=$rows['ColorName'];
			
			// }
			
			
			// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// if(isset($_POST['dropdown_update'])){$color = $_POST['dropdown_update'];}
			
			// }
			
			// echo "<select name = 'dropdown_update'>";
			
			// if(isset($color)){echo '<option value = "'.$color.'" selected>' .$array[$color]. '</option>';}
			
			// WHILE($rows = mysql_fetch_array($result1)):
			
			
			// if($h == $rows['PK_id']){
			
			// echo '<option value = "'.$rows['PK_id'].'" selected>'.$rows['ColorName'].'</option>';
			
			// }else{
			
			// if($color != $rows['PK_id']){              
			
			// echo '<option value = "'.$rows['PK_id'].'">' .$rows['ColorName']. '</option>';}}
			
			// endwhile;
			
			// echo "</select>";
			
			
			
			// }
			// public function Drop_Down_doortype1($h){
			
			// $array = array();
			
			// $result = mysql_query("SELECT * FROM _doortype");
			// $result1 = mysql_query("SELECT * FROM _doortype");
			
			// while ($rows = mysql_fetch_assoc($result)){
			
			// $array[$rows['PK_id']]=$rows['DoorName'];
			
			// }
			
			// if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// if(isset($_POST['dropdown1_update'])){$door = $_POST['dropdown1_update'];}
			
			// }
			
			// echo "<select name = 'dropdown1_update'>";
			
			// if(isset($door)){echo '<option value = "'.$door.'" selected>' .$array[$door]. '</option>';}
			
			// WHILE($rows = mysql_fetch_array($result1)):
			
			
			// if($h == $rows['PK_id']){
			
			// echo '<option value = "'.$rows['PK_id'].'" selected>'.$rows['DoorName'].'</option>';
			
			// }else{
			
			// if($door != $rows['PK_id']){              
			
			// echo '<option value = "'.$rows['PK_id'].'">' .$rows['DoorName']. '</option>';}}
			
			// endwhile;
			
			// echo "</select>";
			
			
			// }
			
			
			
			// public function get_pages(){
			
			// if ($_SERVER["REQUEST_METHOD"] == "GET"){
			
			
			
			// if(isset($_GET['rows_number'])){
			
			
			// $y = $_GET['rows_number'];
			// if($y == 0 or $y<0){echo "<script>
			
			// window.alert('Invalid Number!')
			// window.location = 'index.php';
			
			// </script>";
			// }else{
			
			// $w = mysql_query("SELECT * FROM cars ORDER BY cars.PK_id ASC");
			// $x = mysql_num_rows($w);
			// $z = (int)($x/$y);
			// $z1 = $x%$y;
			
			// if($y>$x){echo "<script>
			
			// window.alert('Invalid Number!')
			// window.location = 'index.php';
			
			// </script>";
			// }else{
			
			// if($z1!=0){$pages = $z+1;}else{$pages = $z;}
			
			// $i = 0;
			
			// while($i<$pages){
			
			// echo'<div style = "display:inline-block;padding:4px;">
			
			// <button type = "submit" name = "show_pages" value = "'.$i.'" class = "edit_submit" style = "">page:'.$i.'</button>
			// </div>';
			// $i++;
			
			
			
			// }
			// }
			// }
			// }
			// }
			
			
			
			// }                      public function select_page(){
			
			
			// global $y,$z;
			
			// if ($_SERVER["REQUEST_METHOD"] == "GET"){
			
			// if(isset($_GET['show_pages'])){
			
			// if(isset($_GET['list'])){
			
			
			// $x = $_GET['show_pages'];
			
			// $y = $_GET['list'];
			
			// $z = $x*$y;
			
			// return $y;
			
			// return $z;
			
			
			// }
			// }
			// }
			// }                          
			
			
			// public function list_page($l,$l1){
			
			
			
			// if($_SESSION['up'] == true){
			
			
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName ASC LIMIT $l,$l1 ");
			
			// return ($_SESSION['query']);
			
			
			// }else{if($_SESSION['down']==true){
			
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.CarName DESC LIMIT $l,$l1 ");
			
			// return ($_SESSION['query']);
			
			
			// }else{
			
			// $_SESSION['query'] = mysql_query("SELECT cars.PK_id, cars.FK_color_id, cars.FK_doorType, cars.CarName, _color_id.ColorName, _doortype.DoorName
			
			// FROM cars
			
			// JOIN _color_id  ON cars.FK_color_id = _color_id.PK_id
			
			// JOIN _doortype ON cars.FK_doorType = _doortype.PK_id
			
			
			// ORDER BY cars.PK_id ASC LIMIT $l,$l1 ");
			
			// return ($_SESSION['query']);}}
			
			
			// }   
			
			
			
			
			// public function page_table($j){
			
			// global $query;
			
			
			// $i = $j;
			
			
			// echo "<table border = 3>
			// <caption class = 'caption_font'>CARS</caption>
			// <tr>
			// <th>Counter</th>
			// <th>color_id</th>
			// <th>door_type</th>
			// <th>CarName</th>
			// <th>ColorName</th>
			// <th>DoorName</th>
			// <th></th>
			// <th></th>
			// </tr>";
			
			
			
			// WHILE($rows = mysql_fetch_array($_SESSION['query'])):
			// $i++;
			
			// $e = $rows['PK_id'];
			
			// echo "<tr>";
			// echo "<td>".$i."</td>";
			// echo "<td>" .$rows['FK_color_id']. "</td>";
			// echo "<td>" .$rows['FK_doorType']. "</td>";
			// echo "<td>" .$rows['CarName']. "</td>";
			// echo "<td>" .$rows['ColorName']. "</td>";
			// echo "<td>" .$rows['DoorName']. "</td>";
			// echo "<td><form action = 'edit_final.php' method = 'get'>
			
			// <button type = 'submit' name = 'Edit_Row' value = '$e' class = 'edit_submit'>Edit</button>
			// </form></td>";
			// echo "<td><form action = 'index.php' method = 'post'>
			// <button type = 'submit' name = 'Delete_Row' value = '$e' class = 'edit_submit'>Delete</button>
			// </form></td>";
			
			// echo "</tr>";
			
			
			// endwhile;
			
			// echo "</table>";
			
			
			// }                       public function list_pages(){
			
			
			// echo'<form action = "index.php" method = "get">
			
			// SET Rows : <select name = "list" onchange = "this.form.submit()">';
			
			// echo'<option></option>';
			
			// if(isset($_GET['list'])){echo'<option value = "'.$_GET['list'].'" selected>'.$_GET['list'].'</option>';}
			
			
			
			// if($_GET['list']!= 5){
			// echo'<option value = "5">5</option>';}
			
			// if($_GET['list']!= 10){
			// echo'<option value = "10">10</option>';}
			
			// if($_GET['list']!= 15){
			// echo'<option value = "15">15</option>';}
			
			
			// echo'</select>';
			
			// echo"<br>";
			// echo"<br>";
			// if(isset($_GET['list'])){$y = $_GET['list'];
			
			// $w = mysql_query("SELECT * FROM cars ORDER BY cars.PK_id ASC");
			// $x = mysql_num_rows($w);
			// $z = (int)($x/$y);
			// $z1 = $x%$y;
			
			// if($z1!=0){$pages = $z+1;}else{$pages = $z;}
			
			// $i = 0;
			
			// while($i<$pages){
			// if($i==0){
			// echo'<div style = "display:inline-block;padding:1px;">
			
			// <button type = "submit" name = "show_pages" value = "'.$i.'" class = "edit_submit" style = "">First</button>
			// </div>';}
			
			// else {if($i == $pages-1){
			
			// echo'<div style = "display:inline-block;padding:1px;">
			
			// <button type = "submit" name = "show_pages" value = "'.$i.'" class = "edit_submit" style = "">Last</button>
			
			// </div>';}
			
			// else
			
			// {echo'<div style = "display:inline-block;padding:1px;">
			
			// <button type = "submit" name = "show_pages" value = "'.$i.'" class = "edit_submit_5" style = "">'.$i.'</button>
			// </div>';}}
			
			
			
			
			// $i++;
			// }
			
			
			
			
			// } 
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			// }
			
			
			
			
			
			
			
			
			
			
			// }	
			
			
			
			
			
			
			
			
			
			
			
			?>
			
			<html>
			<head>
			
			<script type="text/javascript">
			
			function proba (m){
			
			
			if(document.getElementById(m).style.backgroundColor==""){
			document.getElementById(m).style.backgroundColor="#A6808A";
			
			}else{
			
			document.getElementById(m).style.backgroundColor="";
			
			}
			
			}
			
			function prikaz (m,n){
			
			
			if(document.getElementById(n).style.backgroundColor==""){
			document.getElementById(n).style.backgroundColor="#A6808A";
			
			}else{
			
			document.getElementById(n).style.backgroundColor="";
			
			}
			
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("carHere1").innerHTML = this.responseText;
			}
			};
			xmlhttp.open("GET","getuser11.php?q=" + m,true);
			xmlhttp.send();
			
			
			
			}
			
			
			
			</script>
			</head>
			</html>
			
						