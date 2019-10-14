<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Book Catalogue</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Book Catalogue</h1>

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

		$sql = 'SELECT * FROM book';

		foreach ($pdo->query($sql) as $row) {
			echo $row['title'] . "<br><br>";
		}

		$pdo = null;

	} catch (PDOExcetion $e) {
		die("Error message: " . $e->getMessage());
	}
	?>

</body>
</html>