<?php
session_start();

require "dbConnect.php";
$db = get_db();

if (isset($_POST['title'])) {
	$title = $_POST['title'];

	foreach ($db->query("SELECT title, id FROM book WHERE title = '$t'") as $row) {
		$b_title = $row['title'];
		$b_id = $row['id'];

		echo "<p>$b_title, id: $b_id</p>";
	}

	foreach ($db->query("SELECT username, id FROM user_info WHERE username = '$user'") as $row) {
		$u_name = $row['username'];
		$u_id = $row['id'];

		echo "<p>$u_name, id: $u_id</p>";
	}

	$stmt = $db->prepare("DELETE FROM book_user WHERE book_id = '$b_id' AND user_id = '$u_id'");
	$stmt->execute();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Delete</title>
</head>

<body>
<a href="user_booklist.php">Back to Book List Page</a>	
</body>
</html>