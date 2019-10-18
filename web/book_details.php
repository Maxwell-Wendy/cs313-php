<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book Details</title>
</head>

<body>
	<a href="user_booklist.php">Back to Book List Page</a>
	<h1>Your Book Details</h1>
<div>
	<?php

	$bookid = $_GET['bookid'];
	$userid = $_GET['userid'];

	/*$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title, book_user.is_owned AS owned, book_user.is_read AS read, book_user.is_wishlist AS wishlist, book_user.date_read AS date_read, genre.name AS genre FROM user_info, book_user, author, book, genre WHERE user_info.username = '$username' AND book_user.user_id = user_info.id AND book_user.book_id = book.id AND book.author_id = author.id AND book.genre_id = genre.id";*/

	$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title, book_user.is_owned AS owned, book_user.is_read AS read, book_user.is_wishlist AS wishlist, book_user.date_read AS date_read, genre.name AS genre FROM user_info, book_user, author, book, genre WHERE book_user.book_id = '$bookid' AND book_user.user_id = '$userid' AND book.author_id = author.id AND book.genre_id = genre.id";
