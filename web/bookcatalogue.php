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

	<form name="search" action="bookcatalogue.php" method="POST">
		<label>Author:</label>
		<input type="text" name="author" placeholder="Author's name">
		<input type="submit" name="submit">
	</form>

	<?php

	if (isset($_POST['author'])) {
		
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

			$author = $_POST['author'];

			echo $author . " is the search term.";


			$sql = 'SELECT * FROM author where name = "$author"';

			foreach ($pdo->query($sql) as $row) {
				echo $row['name'] . "<br><br>";
			}

			$pdo = null;

		} catch (PDOExcetion $e) {
			die("Error message: " . $e->getMessage());
		}
	}
	else {echo "no query";}
	?>

</body>
</html>