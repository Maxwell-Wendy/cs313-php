<!DOCTYPE html>
<html>

<head>
	<title>Scriptures</title>
</head>

<body>
	<h1>Scripture Resources</h1>

	<?php
	try{

		$db = parse_url(getenv("DATABASE_URL"));
		//$db["path"] = ltrim($db["path"], "/");

		//$dbconn = pg_connect($db)
			//or die('Could not connect:' . pg_last_error());

		$pdo = new PDO("pgsql:" . sprintf(
		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		    $db["host"],
		    $db["port"],
		    $db["user"],
		    $db["pass"],
		    ltrim($db["path"], "/")
		))
			or die('Could not connect: ' . pg_last_error());

		/*$query = 'SELECT * FROM book';

		$result = pg_query($query) or die ('Error message: ' . pg_last_error());


		while ($row = pg_fetch_row($result)) {
			var_dump($row);
		}

		pg_free_result($result);
		pg_close($dbconn);
		//$result = pg_query($db, "SELECT book FROM scriptures WHERE scriptures.id =1");
		//echo $db;
		echo "<br>Wendy <br>";
		//echo $db["path"];
		echo "<br>Maxwell <br>";
		//var_dump($result);*/

		$sql = 'SELECT * FROM scriptures';

		foreach ($pdo->query($sql) as $row) {

			echo $row['book'] . " ";
			echo $row['chapter'] . ":";
			echo $row['verse'] . " - ";
			echo $row['content'] . "<br>";
			//var_dump($row);
		}

		$pdo = null;

	} catch (PDOExcetion $e) {
		die("Error message: " . $e->getMessage());
	}
	?>

</body>
</html>

