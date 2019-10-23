<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<head>
</head>
<body>
	<a href="scriptures.php">Back to Scriptures start page</a>
	<h1>Scripture Details</h1>
<?php

	if (isset($_GET['id'])) {
	
		$id = $_GET['id'];

		$sql = "SELECT book, chapter, verse, content FROM scriptures WHERE scriptures.id = '$id'";

		foreach ($db->query($sql) as $row) {
			$b = $row['book'];
			$ch = $row['chapter'];
			$v = $row['verse'];
			$c = $row['content'];

			echo "<b>$b $ch:$v</b> $c<br>";

		}
	}
?>
<?php
		if (isset($_POST['book'])) {

			$book = $_POST['book'];

			$sql = "SELECT id, book, chapter, verse FROM Scriptures WHERE scriptures.book = '$book'";

			foreach ($db->query($sql) as $row) {
				$id = $row['id'];
				$b = $row['book'];
				$ch = $row['chapter'];
				$v = $row['verse'];

				$url = "scripture_results.php?id=$id";

				echo "<b><a href=\"$url\">$b $ch:$v</a></b><br/>";
			}
		}
	?>
</body>