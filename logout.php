<?php
	require 'db.php';

	// LOGOUT
	unset($_SESSION['logged_user']);
	header('Location: index.php');
?>