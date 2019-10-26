<?php
session_start();

require "dbConnect.php";
$db = get_db();

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

try {
	
	$stmt_a = $db->prepare('INSERT INTO author (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_a->bindValue('name', $a);
	$stmt_a->execute();


	$stmt_a_id = $db->prepare('SELECT name, id FROM author WHERE name = $a');
	$stmt_a_id->execute();
	$row_a = $stmt_a_id->fetch();
	$a_id = $row_a['id'];


	$stmt_g = $db->prepare('INSERT INTO genre (name) VALUES (:name) ON CONFLICT (name) DO NOTHING');
	$stmt_g->bindValue(':name', $g);
	$stmt_g->execute();


	$stmt_g_id = $db->prepare('SELECT name, id FROM genre WHERE name = $g');
	$stmt_g_id->execute();
	$row_g = $stmt_g_id->fetch();
	$g_id = $row_g['id'];

	
	$stmt_b = $db->prepare('INSERT INTO book (title, author_id, genre_id) VALUES (:title, :author_id, :genre_id) ON CONFLICT (title) DO NOTHING');
	$stmt_b->bindValue(':title', $t);
	$stmt_b->bindValue(':author_id',  $a_id);
	$stmt_b->bindValue(':genre_id',  $g_id);
	$stmt_b->execute();


	$stmt_b_id = $db->prepare('SELECT title, id FROM book WHERE title = $t');
	$stmt_b_id->execute();
	$row_b = $stmt_b_id->fetch();
	$b_id = $row_b['id'];


	$stmt_b_u = $db->prepare('INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read) VALUES (:user_id, :book_id, :is_owned, :is_read, :is_wishlist, :date_read) DO NOTHING');
	$stmt_b_u->bindValue(':user_id', $user);
	$stmt_b_u->bindValue(':book_id', $b_id);
	$stmt_b_u->bindValue(':is_owned', $is_o);
	$stmt_b_u->bindValue(':is_read', $is_r);
	$stmt_b_u->bindValue(':is_wishlist', $is_w);
	$stmt_b_u->bindValue(':date_read', $d);
	$stmt_b_u->execute();

}
?>