<?php
include 'db_config.php';
class Db_function
{
	public $db;
	public function __constructor()
	{
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if(mysqli_connect_errno()) {
		    echo "Error: Could not connect to database.";
		    exit;
		}
	}
	public function login($username,$password)
	{
		$password = md5($_POST['password']);
		$username = $_POST['username'];
		$sql 	  = "SELECT * FROM users WHERE email = ".$username."AND password = ".$password;
		$result	  = mysqli_query($sql,$this->db);
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION[ "user" ] 		= mysqli_fetch_assoc($result);
			$_SESSION[ 'login_time' ] 	= time();
			$_SESSION[ 'logged_in' ] 	= 1;
			return true;
		} else {
			return false;
		}	
	}
	public function signup($email,$firstname,$lastname,$password,$dob)
	{
        $email     = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $password  = md5($_POST['password']);
        $dob       = $_POST['dob'];
        $sql 	   = "INSERT INTO users (email,firstname,lastname,password,dob) VALUES ($email,$firstname,$lastname,$password,$dob)";
		$result	   = mysqli_query($sql,$this->db);
		if($result!=''){
			$_SESSION[ "user" ] 		= $email;
			$_SESSION[ 'login_time' ] 	= time();
			$_SESSION[ 'logged_in' ] 	= 1;
			return true;		
		} else {
			return false;
		}		
	}
}