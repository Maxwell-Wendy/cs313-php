<?php
session_start();

require "dbConnect.php";
$db = get_db();

if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$user = $_SESSION['user'];

	foreach ($db->query("SELECT title, id FROM book WHERE title = '$title'") as $row) {
		$b_title = $row['title'];
		$b_id = $row['id'];

		//echo "<p>$b_title, id: $b_id</p>";
	}

	foreach ($db->query("SELECT username, id FROM user_info WHERE username = '$user'") as $row) {
		$u_name = $row['username'];
		$u_id = $row['id'];

		//echo "<p>$u_name, id: $u_id</p>";
	}

	$stmt = $db->prepare("DELETE FROM book_user WHERE book_id = '$b_id' AND user_id = '$u_id'");
	$stmt->execute();

	header("Location: user_booklist.php");
	die();
}
?>
