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
	$result = pg_query($db, "SELECT * FROM scriptures");
	echo $db;
	echo $db["path"];
	echo $result;
	?>

</body>
</html>

