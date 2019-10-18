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

	$sql = "SELECT author.first_name AS first_name, 
			author.last_name AS last_name, 
			book.title AS title, 
			book_user.is_owned AS owned, 
			book_user.is_read AS read, 
			book_user.is_wishlist AS wishlist, 
			book_user.date_read AS date_read, 
			genre.name AS genre 
		FROM book_user 
		INNER JOIN user_info ON book_user.user_id = user_info.id 
		INNER JOIN book ON book_user.book_id = book.id 
		INNER JOIN author ON book.author_id = author.id 
		INNER JOIN genre ON book.genre_id = genre.id 
		WHERE book_user.book_id = '$bookid' AND book_user.user_id = '$userid'
		ORDER BY last_name, first_name";


	foreach ($db->query($sql) as $row) {
				
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];
				$genre = $row['genre'];
				$owned = $row['owned'];
				$read = $row['read'];
				$wishlist = $row['wishlist'];
				$date_read = $row['date_read'];

				echo "<h2>$first_name $last_name, <i>$title</i></h2>";

				echo "<p>Genre: $genre<br>";
				
				if ($owned) {
					echo "You own <i>$title.</i><br>";
				}
				else {
					echo "You do not own <i>$title.</i><br>";
				}

				if ($read) {
					echo "You have read <i>$title.</i><br>";
				}
				else {
					echo "You have not read <i>$title.</i><br>";
				}

				if ($wishlist) {
					echo "<i>$title</i> is on your wishlist.<br>";
				}
				else {
					echo "<i>$title</i> is not on your wishlist.<br>";
				}

				if (!is_null($date_read)) {
					echo "You last read <i>$title</i> on $date_read.";
				}
			}
			?>
		</div>
	</body>
	</html>

