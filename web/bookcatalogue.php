<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Book Catalogue</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Book Catalogue</h1>

	<form name="search" action="bookcatalogue.php" method="POST">
		<label>Search catalogue by author's first name</label>
		<input type="text" name="authorfn" placeholder="Author's first name">
		<br>
		<label>Search catalogue by author's last name</label>
		<input type="text" name="authorln" placeholder="Author's last name">
		<input type="submit" name="submit">
	</form>

	<div>
		<?php

		if (isset($_POST['authorln']) || isset($_POST['authorfn'])) {

			$authorfn = $_POST['authorfn'];
			$authorln = $_POST['authorln'];

			$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title FROM author, book WHERE (author.last_name = '$authorln' OR author.first_name = '$authorfn') AND author_id = author.id";

			foreach ($db->query($sql) as $row) {
				echo $row['first_name'] . " " . $row['last_name'] . ", " . "<i>" . $row['title'] . "</i><br>";
			}
		}
		?>
	</div>


	<form name="list_all" action="bookcatalogue.php" method="POST">
		<label>Show list of all books in catalog</label>
		<input type="submit" name="show_all">
	</form>

	<div>

		<?php
		if (isset($_POST['show_all'])) {

			$sql = 'SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title FROM author, book WHERE author_id = author.id';

			foreach ($db->query($sql) as $row) {
				echo $row['first_name'] . " " . $row['last_name'] . ", " . "<i>" . $row['title'] . "</i><br>";
			}
		}
		?>
	</div>

	<form name="list_users_books" action="bookcatalogue.php" method="POST">
		<label>Show all books you own</label>
		<input type="text" name="username" placeholder="Your name"><br>
		<input type="submit" name="submit">
	</form>

	<div>

		<?php
		if (isset($_POST['username'])) {
			$username = ($_POST['username']);

			$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title, book_user.is_owned AS owned, book_user.is_read AS read, book_user.is_wishlist AS wishlist, book_user.date_read AS date_read, genre.name AS genre FROM user_info, book_user, author, book, genre WHERE user_info.username = '$username' AND book_user.user_id = user_info.id AND book.author_id = author.id AND book.genre_id = genre.id";

			foreach ($db->query($sql) as $row) {

				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];
				$genre = $row['genre'];
				$owned = $row['owned'];
				$read = $row['read'];
				$wishlist = $row['wishlist'];
				$date_read = $row['date_read'];

				echo "<p>$first_name $last_name, <i>\"$title\"</i><p>";
				
				/*if ($owned) {
					echo "You own this book.<br>";
				}
				else {
					echo "You do not own this book.<br>";
				}*/

			}
		}
		?>
	</div>

</body>
</html>