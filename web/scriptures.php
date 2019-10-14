<!DOCTYPE html>
<html>

<head>
	<title>Scriptures</title>
</head>

<body>
	<h1>Scripture Resources</h1>

	<?php
	$db = parse_url(getenv("DATABASE_URL"));
	$db["path"] = ltrim($db["path"], "/");
	$result = pg_query($db, "SELECT * FROM scriptures WHERE scriptures.id =1");
	$book = scriptures.book;
	echo $db;
	echo "<br>Wendy <br>";
	echo $db["path"];
	echo "<br>Maxwell <br>";
	echo $book;
	?>

</body>
</html>

