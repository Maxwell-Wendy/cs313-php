<!DOCTYPE html>
<html>

<head>
	<title>Scriptures</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Scripture Resources</h1>

	<?php
	if (isset($_POST['book']))
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

			$book = $_POST['book'];

			$sql = "SELECT * FROM Scriptures WHERE Scriptures.book = '$book'";



			foreach ($pdo->query($sql) as $row) {
				$url = "result.php?" ."id=" . $row['id'];

				echo "<b><a href=\"$url\">" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</a></b><br/>";

				//echo "<b>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - </b>";
				//echo "\"" . $row['content'] . "\"<br><br>";
			}

			//$pdo = null;
		} 
		catch (PDOExcetion $e) {
			die("Error message: " . $e->getMessage());
		}
	?>

</body>
</html>

