<?php
	error_reporting(E_ALL & ~E_DEPRECATED);

	function db_get_user($name) {
		$q = "SELECT * FROM settings WHERE username='" . $name . "';";
		$user = db_query($q);
		if ($user != false ) {
			return $user['id'];
		}
		return -1;
	}


	function db_query($query) {
		$handle = new SQLite3("/var/www/uaa.db");
 		$result = $handle->query($query)->fetchArray();
		return $result;
	}



?>