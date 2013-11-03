<?php
	error_reporting(E_ALL & ~E_DEPRECATED);
	require "db.php";

	$username = $_POST["username"];

	/* Lookup username, and redirect to u.php after setting cookie */
	$user = db_get_user($username);
	if ( $user <= 0 ) {
		header('Location: http://127.0.0.1/');
		exit;
	}

	setcookie("uaa_login", $user);
	header('Location: http://127.0.0.1/u.php');
	
?>