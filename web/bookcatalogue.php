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
		<label>Search catalogue by author's first name</label>
		<input type="text" name="authorfn" placeholder="Author's first name">
		<br>
		<label>Search catalogue by author's last name</label>
		<input type="text" name="authorln" placeholder="Author's last name">
		<br>
		<input type="submit" name="submit">
	</form>

	<div>
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

				$authorfn = $_POST['authorfn'];
				$authorln = $_POST['authorln'];

				//echo $author . " is the search term.<br>";

				$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title FROM author, book WHERE (last_name = '$authorln' OR first_name = '$authorfn') AND (author_id = author.id)";

				foreach ($pdo->query($sql) as $row) {
					echo $row['first_name'] . " " . $row['last_name'] . ", " . "<i>" . $row['title'] . "</i><br>";
				}

				$pdo = null;

			} catch (PDOExcetion $e) {
				die("Error message: " . $e->getMessage());
			}
		}
		?>
	</div>


	<form name="list_all" action="bookcatalogue.php" method="POST">
		<label>Show list of all books in catalog</label>
		<input type="submit" name="show_all">
	</form>

	<div>

		<?php
		if (isset($_POST['show_all'])) {
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

				$sql = 'SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title FROM author, book WHERE author_id = author.id';

				foreach ($pdo->query($sql) as $row) {
					echo $row['first_name'] . " " . $row['last_name'] . ", " . "<i>" . $row['title'] . "</i><br>";
				}

				$pdo = null;

			} catch (PDOExcetion $e) {
				die("Error message: " . $e->getMessage());
			}
		}
		?>
	</div>


</body>
</html>