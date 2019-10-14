<!DOCTYPE html>
<html>

<head>
	<title>Scriptures</title>
</head>

<body>
	<h1>Scripture Resources</h1>

	<?php
	try {
		$db = parse_url(getenv("DATABASE_URL"));

		$pdo = new PDO("pgsql:" . sprintf(
		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		    $db["host"],
		    $db["port"],
		    $db["user"],
		    $db["pass"],
		    ltrim($db["path"], "/")
		))
			or die('Could not connect: ' . pg_last_error());

		$sql = 'SELECT * FROM scriptures';

		foreach ($pdo->query($sql) as $row) {

			echo "<b>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - </b>";
			echo "\"" . $row['content'] . "\"<br><br>";
		}

		$pdo = null;

	} catch (PDOExcetion $e) {
		die("Error message: " . $e->getMessage());
	}
	?>

</body>
</html>

