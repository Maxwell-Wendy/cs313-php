<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book List</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<h1>Your Booklist</h1>
<div>
		<?php
		//if (isset($_POST['submit_list'])) {

			echo "<h2>Click book for more details</h2>";

			if (isset($_SESSION['user'])) {
				$username = $_SESSION['user'];
			}
			else {
				header("Location: signin.php");
				die(); 
			}

			//echo "<p>Your username is $username.<p>";

			$sql = "SELECT author.name AS name, 
				book.title AS title, 
				book_user.book_id AS book_id, 
				book_user.user_id AS user_id 
			FROM book_user 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN author ON book.author_id = author.id 
			WHERE user_info.username = '$username'
			ORDER BY name";

			

			foreach ($db->query($sql) as $row) {
				$url = "book_details.php?bookid=" . $row['book_id'] . "&userid=" . $row['user_id'];

				$name = $row['name'];
				$title = $row['title'];

				echo "<a href=\"$url\">$name, <i>$title</i></a><br>";
			}
		//}
		?>
	</div>

	<h2>Enter a new book</h2>
	<form name="new_books" action="new_books.php" method="POST">
		<input type="submit" name="submit_new" value="Enter new books">
	</form>

	<h2>Search your books</h2>
	<div>
		<form name="fnsearch" action="search_results.php" method="POST">
			<label>Search your books by author's name</label>
			<!--<input type="text" name="author" placeholder="Author's name">-->
			<select name="author">
				<?php
				$sql = "SELECT name FROM author ORDER BY name";

				foreach ($db->query($sql) as $row) {
					$author = $row['name'];
					echo "<option>$author</option>";
				}
				?>
			</select>
			<input type="submit" name="submit">
		</form>

		<form name="gnsearch" action="search_results.php" method="POST">
			<label>Search your books by genre</label>
			<select name="genre">
				<?php
				$sql = "SELECT name FROM genre ORDER BY name";

				foreach ($db->query($sql) as $row) {
					$genre = $row['name'];
					echo "<option>$genre</option>";
				}
				?>
			</select>
			<input type="submit" name="submit">
		</form>
		<form name="ownedsearch" action="search_results.php" method="POST">
			<label>Show books that you own</label>
			
			<input type="submit" name="owned" value="Books Owned">
		</form><form name="readsearch" action="search_results.php" method="POST">
			<label>Show books that you have read</label>
			
			<input type="submit" name="read" value="Books Read">
		</form><form name="wishsearch" action="search_results.php" method="POST">
			<label>Show books on your wishlist</label>
			
			<input type="submit" name="wishlist" value="Wishlist">
		</form>

	</div>

	<h2>Delete a book from your catalogue</h2>
	<div>
		<form name="fnsearch" action="delete.php" method="POST">
			<label>Choose book to delete</label>
			<!--<input type="text" name="author" placeholder="Author's name">-->
			<select name="title">
				<?php

				$sql = "SELECT book.title AS title 
				FROM book_user 
				INNER JOIN user_info ON book_user.user_id = user_info.id 
				INNER JOIN book ON book_user.book_id = book.id 
				INNER JOIN author ON book.author_id = author.id
				INNER JOIN genre ON book.genre_id = genre.id
				WHERE user_info.username = '$username'
				ORDER BY title";

				foreach ($db->query($sql) as $row) {
					$book = $row['title'];
					echo "<option>$book</option>";
				}
				?>
			</select>
			<input type="submit" name="submit">
		</form>

	</div>


</body>
</html>



	</body>
	</html>