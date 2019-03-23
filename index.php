<?php
require 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		body {
			font-size: 32px;
			padding: 10px;
		}
		a:hover {
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<?php if (isset($_SESSION['logged_user'])) : ?>
			<div class="row">
				<div class="col-md-4"><?php echo '<p class="text-info">Hello, '.$_SESSION['logged_user']['login'].'!</p>'; ?>
			</div>
			<div class="col-md-1 offset-md-7">
				<a href="logout.php" class="btn btn-secondary">Logout</a>
			</div>
		</div>

	</div>
	<?php else : ?> 
		<a href="login.php" class="btn btn-success">Authorization</a>
		<a href="signup.php" class="btn btn-primary">Registration</a>
	<?php  endif ?>
</body>
</html>