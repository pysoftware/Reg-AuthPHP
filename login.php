<?php 
require 'db.php';

$data = $_POST;
if (isset($data['do_login'])) {
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
		// CHECK USER IS IN DB
	if ($user) {
			// VALIDATION PASSWORD
		if(password_verify($data['password'], $user->password)){
			// IT'S ALL OKAY
			$_SESSION['logged_user'] = $user;
		} else {
			$errors[] = "Wrong password";
		}
	} else {
		$errors[] = "This user doesn't exist";
	}
	if(empty($errors)){
		echo '<p class="text-success text-center" style="font-size: 20px;">Welcome, '.$data['login'].'!</p>';
	} else {
							// WRONG LOGIN OR PASSWORD
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
			<div class="mx-auto col-md-6 bg-light">
				<h2 class="text-center mb-3">Enter your login and password</h2>
				<form action="login.php" method="POST">
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="text" class="form-control" id="name" placeholder="Login" name="login" value="<?php echo @$data['login']; ?>">
						</div>
						<div class="form-group col-md-6">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
						<button class="btn btn-primary text-center form-control mb-3" type="submit" name="do_login">LogIn</button>
					</div>
					<a href="index.php" class="btn btn-success offset-md-4 col-md-4">Main page</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
