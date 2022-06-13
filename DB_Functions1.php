<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

class DB_Functions {
	private $db;
	private $helper;
	//put your code here
	// constructor
	function __construct() {
		$path = dirname(__DIR__);
		require_once $path.'/DBAccess/DB_Connect.php';
		// connecting to database
		$this -> db = new DB_Connect();
		$this -> db -> connect();	
		
	}
	
	public function Add_Two_Numbers($a,$b){
		
		$c = $a+$b;
		
		
		return $c;
		
	}

	// destructor
	function __destruct() {

	}

	/**
	 * Get priority values
	 */
	public function getPriorities() {
		$result = mysql_query("SELECT Id, Name, PriorityValue FROM oc_expense_priority") or die(mysql_error());

		// check for result
		$no_of_rows = mysql_num_rows($result);
		if ($no_of_rows > 0) {
			$pList = '';
			$i = 0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

				$tList = array("Id" => $row["Id"], "Name" => $row["Name"], "PriorityValue" => $row["PriorityValue"]);

				$pList[$i] = $tList;
				$i = $i + 1;
			}
			return $pList;
		}
	}

	/**
	 * Get Statuses
	 */
	public function getStatuses() {
		$result = mysql_query("SELECT Id, Name, Description FROM oc_expense_status") or die(mysql_error());
		// check for result
		$no_of_rows = mysql_num_rows($result);
		if ($no_of_rows > 0) {
			$sList = '';
			$i = 0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

				$tList = array("Id" => $row["Id"], "Name" => $row["Name"], "Description" => $row["Description"]);

				$sList[$i] = $tList;
				$i = $i + 1;
			}
			return $sList;
		}
	}

	/**
	 * Get Ticket types
	 */
	public function getExpenseTypes() {
		$result = mysql_query("SELECT Id, Name, Description FROM oc_expense_type") or die(mysql_error());

		// check for result
		$no_of_rows = mysql_num_rows($result);
		if ($no_of_rows > 0) {
			$ttList = '';
			$i = 0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

				$tList = array("Id" => $row["Id"], "Name" => $row["Name"], "Description" => $row["Description"]);

				$ttList[$i] = $tList;
				$i = $i + 1;
			}
			return $ttList;
		}
	}

	
}
?>