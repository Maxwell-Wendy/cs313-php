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
</body>