<?php
session_start();

require "dbConnect.php";
$db = get_db();

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
}
else
{
	header("Location: signin.php");
	die(); 
}

//if (isset($_POST[''])) {

			//$username = ($_POST['username']);
			//$_SESSION['user'] = $username;
		//}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Enter New Books</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>

	<h1>Add a book from our ever-growing catalogue to your personal catalogue</h1>
	<form name="add_existing_book" action="insert_book.php" method="POST">
		<select name="title">
			<?php

				$sql = "SELECT title FROM book ORDER BY title";

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



	<h1>Add a new book to your list, <?php echo $user ?></h1>

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
		<input type="date" name="date_read _new"><br>
		<input type="submit" name="submit_new">
	</form>

</body>
</html>