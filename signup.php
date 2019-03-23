<?php
	// CODE FOR DISPLAY ERRORS IN CONSOLE
	// ini_set('display_errors',1);
	// error_reporting(E_ALL);
	// CODE FOR DISPLAY ERRORS IN CONSOLE
// Connect to db
require 'db.php';
// Array of post method
$data = $_POST;
// echo empty($data);
if (isset($data['do_signup'])) {
	// REGISTRATION
	$errors = array();
	// Check fields
	if(trim($data['name']) == ''){
		$errors[] = 'Enter your name';
	}
	if(trim($data['surname']) == ''){
		$errors[] = 'Enter your surname';
	}
	if(trim($data['login']) == ''){
		$errors[] = 'Enter your login';
	}
	if($data['password'] == ''){
		$errors[] = 'Enter your password';
	}
	if(strlen($data['password']) < 8){
		$errors[] = 'Your password have less than eight symbols';
	} 
	if($data['confirmpassword'] != $data['password']){
		$errors[] = 'Be sure to check your passwords';
	}
	// CHECK IF THERE'S SUCH A "LOGIN" IN THE DB
	if (R::count('users', 'login = ?', array($data['login'])) > 0) {
		$errors[] = 'Login '.$data['login'].' is already in use';
	}
	if(empty($errors)){
						// IT'S OKAY AND REGISTER NOW
						// Table of users with some parametrs
						$user = R::dispense('users');
							$user->name = $data['name'];
							$user->surname = $data['surname'];
							$user->login = $data['login'];
							$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
						R::store($user);
						// Display text of success registration
						echo '<p class="text-success text-center" style="font-size: 20px;">Success registration</p>';
					} else {
						// Wrong registration
						echo '<p class="text-danger text-center" style="font-size: 20px;">'.array_shift($errors).'</p>';
					}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration</title>
	<link rel="stylesheet" href="">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		body {
			font-size: 32px;
			background-color: #eaeaea;
			padding: 10px;
		}
		label {
			font-size: 24px;
		}
		a:hover {
			text-decoration: none;
		}
		p {
			font-size: 18px;
		}
		.col-md-6 {
			border-radius: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-6 bg-light p-5">
				<h1 class="text-center">Create a new account!</h1>
				<!-- <p class="text-primary" style="font-size: 24px;">Open a new world! </p> -->
				<p class="font-weight-light text-info text-center">
					* Required field.
				</p>
				<form action="signup.php" method="POST">
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="text" class="form-control" id="name" placeholder="*Name" name="name" value="<?php echo @$data['name']; ?>">
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control" id="surname" placeholder="*Surname" name="surname"  value="<?php echo @$data['surname']; ?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" id="login" placeholder="*Login" name="login"  value="<?php echo @$data['login']; ?>">
							<p class="font-weight-light text-center">
								*You can use Latin letters, numbers, and dots.
							</p>
						</div>
					</div>
					<div class="form-row" style="height: 50px;">
						<div class="form-group col-md-6">
							<input type="password" class="form-control" id="password" placeholder="*Password" name="password">
						</div>
						<div class="form-group col-md-6">
							<input type="password" class="form-control" id="confirmpassword" placeholder="*Confirm password" name="confirmpassword">
						</div>
					</div>
					<p class="font-weight-light text-center">
						*The password must contain at least eight characters, including letters, numbers, and special characters
					</p>
					<a href="index.php" class="btn btn-success col-md-3">Main page</a>
					<button class="btn btn-primary text-center col-md-4 offset-md-4" type="submit" name="do_signup">Registration</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
