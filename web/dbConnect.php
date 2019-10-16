<?php

function get_db() {
	$db = NULL;

	try {
		$dbparts = parse_url(getenv("DATABASE_URL"));

		$db = new PDO("pgsql:" . sprintf("host=%s;port=%s;user=%s;password=%s;dbname=%s",
				$dbparts["host"],
				$dbparts["port"],
				$dbparts["user"],
				$dbparts["pass"],
				ltrim($dbparts["path"], "/")
				));
		
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOExcetion $e) {
		die("Error message: " . $e->getMessage());
	}

	return $db;
}
?>