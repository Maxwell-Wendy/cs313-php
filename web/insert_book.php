<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="book.css">
	<title>New Book Added</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a><br>
	<a href="user_booklist.php">Back to Booklist</a>
	<h1>You Have Added This Book to Your Catalogue</h1>
<div>

<?php

$user = $_SESSION['user'];

if (isset($_POST['submit_new'])) {
	if (isset($_POST['author'])) {
		$a = htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8');
	}
	else {
		echo "An author's name is required.";
	}

	if (isset($_POST['title'])) {
		$t = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
	}
	else {
		echo "A title is required.";
	}

	if (isset($_POST['genre_1'])) {
		$g = htmlspecialchars($_POST['genre_1'], ENT_QUOTES, 'UTF-8');
	}
	else {
		$g = NULL;
	}

	if (isset($_POST['date_read_new'])) {
		$d = htmlspecialchars($_POST['date_read']);
	} 
	else {
		$d = NULL;
	}

	if (isset($_POST['is_owned_new'])) {
		$is_o = 1;
	}
	else {
		$is_o = 0;
	}

	if (isset($_POST['is_read_new'])) {
		$is_r = 1;
	}
	else {
		$is_r = 0;
	}

	if (isset($_POST['is_wish_new'])) {
		$is_w = 1;
	}
	else {
		$is_w = 0;
	}

	//if author is not in database, add author
	$stmt_a = $db->prepare('INSERT INTO author (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_a->bindValue('name', $a);
	$stmt_a->execute();

	//get author id number
	foreach ($db->query("SELECT name, id FROM author WHERE name = '$a'") as $row) {
		$a_name = $row['name'];
		$a_id = $row['id'];

		//echo "<p>$a_name, id: $a_id</p>";
	}

	//if genre is not in database, add genre
	$stmt_g = $db->prepare('INSERT INTO genre (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_g->bindValue(':name', $g);
	$stmt_g->execute();

	//get genre id number
	foreach ($db->query("SELECT name, id FROM genre WHERE name = '$g'") as $row) {
		$g_name = $row['name'];
		$g_id = $row['id'];

		//echo "<p>$g_name, id: $g_id</p>";
	}
	
	//if book is not in database, add book
	$stmt_b = $db->prepare('INSERT INTO book (title, author_id, genre_id) VALUES (:title, :author_id, :genre_id) ON CONFLICT (title) DO NOTHING');
	$stmt_b->bindValue(':title', $t);
	$stmt_b->bindValue(':author_id',  $a_id);
	$stmt_b->bindValue(':genre_id',  $g_id);
	$stmt_b->execute();

	//get book id number
	foreach ($db->query("SELECT title, id FROM book WHERE title = '$t'") as $row) {
		$b_title = $row['title'];
		$b_id = $row['id'];

		//echo "<p>$b_title, id: $b_id</p>";
	}
}

if (isset($_POST['submit_existing'])) {
	if (isset($_POST['title'])) {
		$t = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
		foreach ($db->query("SELECT title, id FROM book WHERE title = '$t'") as $row) {
			$b_title = $row['title'];
			$b_id = $row['id'];
		}
	}

	if (isset($_POST['date_read'])) {
		$d = htmlspecialchars($_POST['date_read']);
	}
	else {
		$d = NULL;
	}

	if (isset($_POST['is_owned'])) {
		$is_o = 1;
	}
	else {
		$is_o = 0;
	}

	if (isset($_POST['is_read'])) {
		$is_r = 1;
	}
	else {
		$is_r = 0;
	}

	if (isset($_POST['is_wish'])) {
		$is_w = 1;
	}
	else {
		$is_w = 0;
	}
}

//get user id number
foreach ($db->query("SELECT username, id FROM user_info WHERE username = '$user'") as $row) {
	$u_name = $row['username'];
	$u_id = $row['id'];

	//echo "<p>$u_name, id: $u_id</p>";
}

//add book and user info to book_user with and without dates
if ($d == NULL) {
	$stmt_b_u = $db->prepare('INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist) VALUES (:user_id, :book_id, :is_owned, :is_read, :is_wishlist)');
	$stmt_b_u->bindValue(':user_id', $u_id);
	$stmt_b_u->bindValue(':book_id', $b_id);
	$stmt_b_u->bindValue(':is_owned', $is_o);
	$stmt_b_u->bindValue(':is_read', $is_r);
	$stmt_b_u->bindValue(':is_wishlist', $is_w);
	$stmt_b_u->execute();
}

else {
	$stmt_b_u = $db->prepare('INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read) VALUES (:user_id, :book_id, :is_owned, :is_read, :is_wishlist, :date_read)');
	$stmt_b_u->bindValue(':user_id', $u_id);
	$stmt_b_u->bindValue(':book_id', $b_id);
	$stmt_b_u->bindValue(':is_owned', $is_o);
	$stmt_b_u->bindValue(':is_read', $is_r);
	$stmt_b_u->bindValue(':is_wishlist', $is_w);
	$stmt_b_u->bindValue(':date_read', $d);
	$stmt_b_u->execute();
}

//list new user book with links to details page
$sql = "SELECT author.name AS name, 
				book.title AS title, 
				book_user.book_id AS book_id, 
				book_user.user_id AS user_id 
		FROM book_user 
		INNER JOIN book ON book_user.book_id = book.id 
		INNER JOIN user_info ON book_user.user_id = user_info.id 
		INNER JOIN author ON book.author_id = author.id 
		WHERE user_info.username = '$user' 
		AND book_user.book_id = '$b_id'
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
