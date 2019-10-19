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

		if (isset($_POST['authorln']) || isset($_POST['authorfn']) || isset($_POST['genre'])) {

			$authorfn = $_POST['authorfn'];
			$authorln = $_POST['authorln'];
			$genre = $_POST['genre'];
			$user = $_SESSION['user'];

			$sql = "SELECT author.first_name AS first_name, 
				author.last_name AS last_name, 
				book.title AS title 
			FROM book_user 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN author ON book.author_id = author.id
			INNER JOIN genre ON book.genre_id = genre.id
			WHERE (author.last_name = '$authorln' 
				OR author.first_name = '$authorfn' 
				OR genre.name = '$genre') 
				AND user_info.username = '$user'
			ORDER BY last_name, first_name";

			//$result = pg_query($sql)
				//or die('Query failed: ' . pg_last_error());

				//if(pg_num_rows($result)>0){
					foreach ($db->query($sql) as $row) {
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$title = $row['title'];

					echo "<p>$first_name $last_name, <i>$title</i></p>";
				}

				//}
				//else {
					//echo "no matches";
				//}

			
		}
		?>
	</div>

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




</body>
</html>