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
			$username = ($_POST['username']);

			$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title FROM user_info, book_user, author, book WHERE user_info.username = '$username' AND book_user.user_id = user_info.id AND book_user.book_id = book.id AND book.author_id = author.id"



			//$sql = "SELECT author.first_name AS first_name, author.last_name AS last_name, book.title AS title, book_user.is_owned AS owned, book_user.is_read AS read, book_user.is_wishlist AS wishlist, book_user.date_read AS date_read, genre.name AS genre FROM user_info, book_user, author, book, genre WHERE user_info.username = '$username' AND book_user.user_id = user_info.id AND book_user.book_id = book.id AND book.author_id = author.id AND book.genre_id = genre.id";

			foreach ($db->query($sql) as $row) {
				$url = "book-details.php?" . "bookid=" . $row['book_id'] . "&userid=" . $row['user_id'];

				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];
				//$genre = $row['genre'];
				//$owned = $row['owned'];
				//$read = $row['read'];
				//$wishlist = $row['wishlist'];
				//$date_read = $row['date_read'];

				echo "<a href=\"$url\">$first_name $last_name, <i>\"$title\"</i></a>";
				
				/*if ($owned) {
					echo "<i>You own this book.</i><br>";
				}
				else {
					echo "<i>You do not own this book.</i><br>";
				}*/
			}
		}
		?>
	</div>
	</body>
	</html>