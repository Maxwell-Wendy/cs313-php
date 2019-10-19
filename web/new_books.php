<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Enter New Books</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<h1>Add a new book to your list</h1>

	<form name="newbooks">
		<label>Author's first name</label>
		<input type="text" name="author_first" placeholder="Author's first name">
		<label>Author's last name</label>
		<input type="text" name="author_last" placeholder="Author's last name">
		<label>Title</label>
		<input type="text" name="title" placeholder="Title">
		<label>Genre of book</label>
		<input type="text" name="genre_1" placeholder="Genre">
		<label>Check any of the following that apply</label>
		<input type="checkbox" name="is_owned">I own this book.<br>
		<input type="checkbox" name="is_read">I have read this book.<br>
		<input type="checkbox" name="is_wish">Include in wishlist.<br>
		<label>Date you last read this book</label>
		<input type="date" name="date_read"><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>