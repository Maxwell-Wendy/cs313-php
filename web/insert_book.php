<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>New Book Added</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<h1>Your New Book Details</h1>
<div>

<?php

$user = $_SESSION['user'];
$a = htmlspecialchars($_POST['author']);
$t = htmlspecialchars($_POST['title']);
$g = htmlspecialchars($_POST['genre_1']);
$d = htmlspecialchars($_POST['date_read']);

if (isset($_POST['is_owned'])) {
	$is_o = true;
}
else {
	$is_o = false;
}

if (isset($_POST['is_read'])) {
	$is_r = true;
}
else {
	$is_r = false;
}

if (isset($_POST['is_wish'])) {
	$is_w = true;
}
else {
	$is_w = false;
}
	
	$stmt_a = $db->prepare('INSERT INTO author (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_a->bindValue('name', $a);
	$stmt_a->execute();

	foreach ($db->query("SELECT name, id FROM author WHERE name = '$a'") as $row) {
				$a_name = $row['name'];
				$a_id = $row['id'];

				echo "<p>$a_name, id: $a_id</p>";
			}

	echo "The author id is $a_id";


	$stmt_g = $db->prepare('INSERT INTO genre (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_g->bindValue(':name', $g);
	$stmt_g->execute();

	foreach ($db->query("SELECT name, id FROM genre WHERE name = '$g'") as $row) {
				$g_name = $row['name'];
				$g_id = $row['id'];

				echo "<p>$g_name, id: $g_id</p>";
			}

	echo "The genre id is $g_id";

	
	$stmt_b = $db->prepare('INSERT INTO book (title, author_id, genre_id) VALUES (:title, :author_id, :genre_id) ON CONFLICT (title) DO NOTHING');
	$stmt_b->bindValue(':title', $t);
	$stmt_b->bindValue(':author_id',  $a_id);
	$stmt_b->bindValue(':genre_id',  $g_id);
	$stmt_b->execute();

	foreach ($db->query("SELECT title, id FROM book WHERE title = '$t'") as $row) {
				$b_title = $row['title'];
				$b_id = $row['id'];

				echo "<p>$b_title, id: $b_id</p>";
			}

			echo "<p>$is_o, $is_r, $is_w, $d<p>";


	$stmt_b_u = $db->prepare('INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read) VALUES (:user_id, :book_id, :is_owned, :is_read, :is_wishlist, :date_read) DO NOTHING');
	$stmt_b_u->bindValue(':user_id', $user);
	$stmt_b_u->bindValue(':book_id', $b_id);
	$stmt_b_u->bindValue(':is_owned', $is_o);
	$stmt_b_u->bindValue(':is_read', $is_r);
	$stmt_b_u->bindValue(':is_wishlist', $is_w);
	$stmt_b_u->bindValue(':date_read', $d);
	$stmt_b_u->execute();


	$sql = "SELECT author.name AS name, 
				book.title AS title, 
				book_user.book_id AS book_id, 
				book_user.user_id AS user_id 
			FROM book_user 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN author ON book.author_id = author.id 
			WHERE user_info.username = '$user' 
			ORDER BY name";

			
			foreach ($db->query($sql) as $row) {
				$url = "book_details.php?bookid=" . $row['book_id'] . "&userid=" . $row['user_id'];

				$name = $row['name'];
				$title = $row['title'];

				echo "<a href=\"$url\">$name, <i>$title</i></a><br>";
			}


?>
</div>
</body>
</html>