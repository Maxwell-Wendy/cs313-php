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
​
	foreach ($db->query("SELECT * FROM Scriptures WHERE Scriptures.id =" . $_GET['id']) as $row) {
		echo "<b>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - </b>";
            echo '"' . $row['content'] . '"<br><br>';
	}
​
?>
</body>