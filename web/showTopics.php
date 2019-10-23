<?php
require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture and Topic List</title>
</head>
<body>
	<a href="topicEntry.php">Back to Topic Entry Page</a>
	<h1>Scripture and Topic List</h1>
<?php

try {

	$query = 'SELECT id, book, chapter, verse, content FROM scriptures';

	$stmt = $db->prepare($query);
	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$b = $row['book'];
		$ch = $row['chapter'];
		$v = $row['verse'];
		$c = $row['content'];

		echo "<p><b>$b $ch:$v</b> - $c<br>";

		$stmtTopics = $db->prepare('SELECT name FROM topic t'
			. ' INNER JOIN scripture_topic st ON st.topic_id = t.id'
			. ' WHERE st.scripture_id = :scriptureId');

		$stmtTopics->bindValue(':scriptureId', $row['id']);
		$stmtTopics->execute();

		while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
		{
			echo $topicRow['name'] . ' ';
		}

		echo "<p>";
	}
}

catch (PDOException $ex) {
	echo "Error with DB. Details: $ex";
	die();
}
?>

</body>
</html>
