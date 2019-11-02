<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="book.css">
	<title>Enter New Books</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<?php

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
	?>

	<h1>Add a book from our ever-growing catalogue to your personal catalogue</h1>
	<div>
		<form name="add_existing_book" action="insert_book.php" method="POST">
			<select name="title">
				<option> </option>
				<?php

					//$sql = "SELECT title FROM book ORDER BY title";
					$sql = "SELECT book.title AS title 
						FROM book_user 
						INNER JOIN user_info ON book_user.user_id = user_info.id 
						INNER JOIN book ON book_user.book_id = book.id 
						INNER JOIN author ON book.author_id = author.id
						INNER JOIN genre ON book.genre_id = genre.id
						WHERE user_info.username <> '$user'
						ORDER BY title";

					foreach ($db->query($sql) as $row) {
						$book = $row['title'];
						echo "<option>$book</option>";
					}
				?>
			</select>
			<br>
			<label>Check any of the following that apply:</label><br>
			<input type="checkbox" name="is_owned">I own this book.<br>
			<input type="checkbox" name="is_read">I have read this book.<br>
			<input type="checkbox" name="is_wish">Include in wishlist.<br>
			<label>Date you last read this book</label>
			<input type="date" name="date_read"><br>
			<input type="submit" name="submit_existing">
		</form>
	</div>

	<h1>Add a new book to your list, <?php echo $username ?></h1>
	<div>
		<form name="newbooks" action="insert_book.php" method="POST">
			<label>Author's name</label><br>
			<input type="text" name="author" placeholder="Author's name"><br>
			<label>Title</label><br>
			<input type="text" name="title" placeholder="Title"><br>
			<label>Genre of book</label><br>
			<input type="text" name="genre_1" placeholder="Genre"><br>
			<label>Check any of the following that apply:</label><br>
			<input type="checkbox" name="is_owned_new">I own this book.<br>
			<input type="checkbox" name="is_read_new">I have read this book.<br>
			<input type="checkbox" name="is_wish_new">Include in wishlist.<br>
			<label>Date you last read this book</label><br>
			<input type="date" name="date_read_new"><br>
			<input type="submit" name="submit_new">
		</form>
	</div>

</body>
</html>