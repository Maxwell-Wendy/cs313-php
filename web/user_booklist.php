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
		if (isset($_POST['username'])) {

			echo "<h2>Click book for more details</h2>";

			$username = ($_POST['username']);
			$_SESSION['user'] = $username;

			$sql = "SELECT author.first_name AS first_name, 
				author.last_name AS last_name, 
				book.title AS title, 
				book_user.book_id AS book_id, 
				book_user.user_id AS user_id 
			FROM book_user 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN author ON book.author_id = author.id 
			WHERE user_info.username = '$username'
			ORDER BY last_name, first_name";

			

			foreach ($db->query($sql) as $row) {
				$url = "book_details.php?bookid=" . $row['book_id'] . "&userid=" . $row['user_id'];

				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];

				echo "<a href=\"$url\">$first_name $last_name, <i>$title</i></a><br>";
			}
		}
		?>
	</div>

	<h2>Search your books</h2>

	<form name="fnsearch" action="search_results.php" method="POST">
		<label>Search your books by author's first name</label>
		<input type="text" name="authorfn" placeholder="Author's first name">
		<input type="submit" name="submit">
	</form>
	<form name="lnsearch" action="search_results.php" method="POST">
		<label>Search your books by author's last name</label>
		<input type="text" name="authorln" placeholder="Author's last name">
		<input type="submit" name="submit">
	</form>

	<form name="gnsearch" action="search_results.php" method="POST">
		<label>Search your books by genre</label>
		<select name="genre">
			<?php
			$sql = "SELECT genre.name AS genre FROM genre ORDER BY genre";

			foreach ($db->query($sql) as $row) {
				$genre = $row['genre'];
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


	</body>
	</html>