<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Search Results</title>
</head>

<body>
	<a href="user_booklist.php">Back to Book List Page</a>
	<h1>Search Results</h1>


	<div>
		<?php

		if (isset($_POST['authorln']) || isset($_POST['authorfn'])) {

			$authorfn = $_POST['authorfn'];
			$authorln = $_POST['authorln'];
			$user = $_SESSION['usernum'];

			$sql = "SELECT author.first_name AS first_name, 
				author.last_name AS last_name, 
				book.title AS title 
			FROM book_user 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN author ON book.author_id = author.id
			WHERE (author.last_name = '$authorln' OR author.first_name = '$authorfn') 
			AND book_user.user_id = '$user'
			ORDER BY last_name, first_name";

			foreach ($db->query($sql) as $row) {
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];

				if (is_null($row['title'])) {
					echo "You have no books that match";
				}

				echo "<p>$first_name $last_name, <i>$title</i></p>";
			}
		}
		?>
	</div>



</body>
</html>