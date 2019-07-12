<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'test');
	$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if(mysqli_connect_errno()) {
	    echo "Error: Could not connect to database.";
	    exit;
	}
	else{
		// echo "connected";		
	}

// used to get mysql database connection
// class Db_config{
 
//     // specify your own database credentials
//     private $host = "localhost";
//     private $db_name = "test";
//     private $username = "root";
//     private $password = "";
//     public $conn;
 
//     // get the database connection
//     public function getConnection(){
 
//         $this->conn = null;
 
//         try{
//             $this->conn = new mysqli($host, $username, $password, $db_name);
//         }catch(PDOException $exception){
//             echo "Connection error: " . $exception->getMessage();
//         }
 
//         return $this->conn;
//     }
// }
?>
