<?php
include 'db_config.php';
class Db_function
{
	public $db;
	public $error = array();
	public function __constructor()
	{
		session_strart();
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
 		if(mysqli_connect_errno()) {
		    echo "Error: Could not connect to database.";
		    exit;
		}
	}
	public function login($username,$password)
	{
		$password = md5(mysqli_real_escape_string($this->db,trim($_POST['password'])));
		$username = mysqli_real_escape_string($this->db,trim($_POST['username']));
		if(empty($username))
		{
			array_push($error,"Email is required");
		}
		if(empty($password))
		{
			array_push($error,"password is required");
		}
		if(count($error)==0){		
			$sql 	  = "SELECT * FROM users WHERE email = ".$username."AND password = ".$password;
			$result	  = mysqli_query($this->db,$sql);
			if(mysqli_num_rows($this->db,$result) == 1)
			{
				$_SESSION[ "user" ] 		= mysqli_fetch_assoc($result);
				$_SESSION[ 'login_time' ] 	= time();
				$_SESSION[ 'logged_in' ] 	= 1;
				return true;
			} else {
				return false;
			}
		}	
	}
	public function signup($email,$firstname,$lastname,$password,$dob)
	{
        $email     = mysqli_real_escape_string($this->db,$_POST['email']);
        $firstname = mysqli_real_escape_string($this->db,$_POST['firstname']);
        $lastname  = mysqli_real_escape_string($this->db,$_POST['lastname']);
        $password  = md5(mysqli_real_escape_string($this->db,$_POST['password']));
        $dob       = mysqli_real_escape_string($this->db,$_POST['dob']);
        if(empty($email))
        {
        	array_push($error,"Email is required");
        }
        if(empty($firstname))
        {
        	array_push($error,"Firstname is required");
        }
        if(empty($lastname))
        {
        	array_push($error,"Lastname is required");
        }
        if(empty($password))
        {
        	array_push($error,"Password is required");
        }
        if(empty($dob))
        {
        	array_push($error,"Date of birth is required");
        }
        if(count($error)==0){
	        $sql 	   = "INSERT INTO users (email,firstname,lastname,password,dob) VALUES ('$email','$firstname','$lastname','$password','$dob' )";
			$result	   = mysqli_query($this->db,$sql);
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
}