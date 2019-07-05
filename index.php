<?php
include_once('db_function.php');
$db_function = new Db_function();
if(isset($_POST['login'])){
	//echo "benny";die();
	$username  	= 	$_POST['username'];  
	$password  	= 	$_POST['password'];  
	$user      	= 	$db_function->login($username, $password);  
	if($user) { 
	   header("location:home.php");  
	} else {  
	   echo "<script>alert('Emailid / Password Not Match')</script>";  
	}
}
if(isset($_POST['signup'])){
	$email  	=	$_POST['email'];  
	$firstname 	=	$_POST['firstname'];                        
	$lastname 	=	$_POST['lastname'];
	$password 	=	$_POST['password'];
	$dob 		=	$_POST['dob'];
	$user     	=	$db_function->signup($email,$firstname,$lastname,$password,$dob);  
	if($user) { 
	   header("location:home.php");  
	} else {  
	   echo "<script>alert('Unable to login')</script>";  
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Numans');

		html,body{
		background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		height: 100%;
		font-family: 'Numans', sans-serif;
		}

		.container{
		height: 100%;
		align-content: center;
		}

		.card{
		height: 370px;
		margin-top: auto;
		margin-bottom: auto;
		width: 400px;
		background-color: rgba(0,0,0,0.5) !important;
		}

		.social_icon span{
		font-size: 60px;
		margin-left: 10px;
		color: #FFC312;
		}

		.social_icon span:hover{
		color: white;
		cursor: pointer;
		}

		.card-header h3{
		color: white;
		}

		.social_icon{
		position: absolute;
		right: 20px;
		top: -45px;
		}

		.input-group-prepend span{
		width: 50px;
		background-color: #FFC312;
		color: black;
		border:0 !important;
		}

		input:focus{
		outline: 0 0 0 0  !important;
		box-shadow: 0 0 0 0 !important;

		}

		.remember{
		color: white;
		}

		.remember input
		{
		width: 20px;
		height: 20px;
		margin-left: 15px;
		margin-right: 5px;
		}

		.login_btn{
		color: black;
		background-color: #FFC312;
		width: 100px;
		}

		.login_btn:hover{
		color: black;
		background-color: white;
		}

		.links{
		color: white;
		}

		.links a{
		margin-left: 4px;
		}
		.card-sec{
		height: 500px!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card login">
				<div class="card-header">
					<h3>Sign In</h3>
				</div>
				<div class="card-body">
					<form  action="" method="post" id="login-form">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" name="username" placeholder="username" autocomplete="off" >							
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="password" placeholder="password" autocomplete="off">
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn" name="login">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="#" class="map_bttn">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
			<div class="card card-sec signup" style="display: none;">
				<div class="card-header">
					<h3>Sign UP</h3>
				</div>
				<div class="card-body">
					<form  action="" method="post" id="signup-form">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" name="firstname" placeholder="firstname">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" name="lastname" placeholder="lastname">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="text" class="form-control" name="password" placeholder="password">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-calendar"></i></span>
							</div>
							<input type="text" class="form-control" name="dob" placeholder="date of birth">
						</div>
						<div class="form-group">
							<input type="submit" value="Sign UP" class="btn float-right login_btn" name="signup">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Already have an account?<a href="#" class="map_bttn_login">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
        $('.map_bttn').click(function(){
            $('.login').css('display','none');
            $('.signup').css('display','block');
        });
        $('.map_bttn_login').click(function(){
            $('.login').css('display','block');
            $('.signup').css('display','none');
        });
	});
</script>