<?php
session_start();

require "dbConnect.php";
$db = get_db();

if (isset($_POST['username'])) {

			$username = ($_POST['username']);
			$_SESSION['user'] = $username;
		}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Enter New Books</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<h1>Add a new book to your list</h1>

	<form name="newbooks" action="insert_book.php" method="POST">
		<label>Author's name</label>
		<input type="text" name="author" placeholder="Author's name"><br>
		<label>Title</label>
		<input type="text" name="title" placeholder="Title"><br>
		<label>Genre of book</label>
		<input type="text" name="genre_1" placeholder="Genre"><br>
		<label>Check any of the following that apply:</label><br>
		<input type="checkbox" name="is_owned">I own this book.<br>
		<input type="checkbox" name="is_read">I have read this book.<br>
		<input type="checkbox" name="is_wish">Include in wishlist.<br>
		<label>Date you last read this book</label>
		<input type="date" name="date_read"><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>