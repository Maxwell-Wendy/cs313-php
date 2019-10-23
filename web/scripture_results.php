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
	<h1>Scripture Resources</h1>
<?php

	if (isset($_GET['id'])) {
	
		$id = $_GET['id'];

	/*$sql = "SELECT * FROM scriptures WHERE scriptures.id = '$id'";
​
	foreach ($db->query($sql) as $row) {
		echo "<b>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - </b>";
            echo '"' . $row['content'] . '"<br><br>';
	}*/

		$sql = "SELECT book, chapter, verse FROM scriptures WHERE scriptures.id = '$id'";

		foreach ($db->query($sql) as $row) {
			$url = "scripture_results.php?id=" . $row['id'];

			echo "<b><a href=\"$url\">" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</a></b><br/>";

			echo $row['content'];
		}
	}
?>
</body>