<?php
class DB_Connect {
 
    // constructor
    function __construct() {
         
    }
 
    // destructor
    function __destruct() {
    }
 
    // Connecting to database
    public function connect() {
        
        // connecting to mysql
        $con = mysqli_connect("localhost","root","");
        // selecting database
        mysqli_select_db($con,"cars");
 
        // return database handler
        return $con;
    }
 
    // Closing database connection
    public function close() {
        mysqli_close();
    }
 
}
?>