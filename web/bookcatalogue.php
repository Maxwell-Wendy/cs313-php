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


	<form name="search_genre" action="bookcatalogue.php" method="POST">
		<label>Search catalogue by genre</label>
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

	<div>
		<?php
		if (isset($_POST['genre'])) {

			$genre = $_POST['genre'];
			
			$sql = "SELECT author.first_name AS first_name, 
				author.last_name AS last_name, 
				book.title AS title, 
				genre.name AS genre 
			FROM author
			INNER JOIN book ON author_id = author.id
			INNER JOIN genre ON genre_id = genre.id
			WHERE genre.name = '$genre'
			ORDER BY last_name, first_name";

			foreach ($db->query($sql) as $row) {
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];

				echo "<p>$first_name $last_name, <i>$title</i></p>";
			}
		}
		?>
	</div>


	<form name="list_all" action="bookcatalogue.php" method="POST">
		<label>Show list of all books in catalogue (any user)</label>
		<input type="submit" name="show_all">
	</form>

	<div>
		<?php
		if (isset($_POST['show_all'])) {

			$sql = 'SELECT author.first_name AS first_name, 
			author.last_name AS last_name, 
			book.title AS title 
			FROM author
			INNER JOIN book on author_id = author.id
			ORDER BY last_name, first_name';

			foreach ($db->query($sql) as $row) {
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];

				echo "<p>$first_name $last_name, <i>$title</i></p>";
			}
		}
		?>
	</div>

	<form name="list_users_books" action="user_booklist.php" method="POST">
		<label>Show all books you own</label>
		<input type="text" name="username" placeholder="Your username"><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>