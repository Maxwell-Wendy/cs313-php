<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Scriptures</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Scripture Resources</h1>

	<?php
	//if (isset($_POST['book'])) {

		//$book = $_POST['book'];

		//$sql = "SELECT * FROM Scriptures WHERE Scriptures.book = '$book'";
		$sql = 'SELECT book, chapter, verse FROM scriptures';

		foreach ($db->query($sql) as $row) {
			$url = "scripture_results.php?id=" . $row['id'];

			echo $row['id'];

			echo "<b><a href=\"$url\">" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</a></b><br/>";

			//echo "<b>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - </b>";
			//echo "\"" . $row['content'] . "\"<br><br>";
		}

	?>

	<form name="search" action="scripture_results.php" method="post">
		Search Book: <input type="text" name="book" />
		<input type="submit" value="Search"><br/>
	</form>

</body>
</html>

