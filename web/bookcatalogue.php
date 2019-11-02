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
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="book.css">
	<title>Book Catalogue</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Book Catalogue</h1>

	<h2>Welcome to your personal book catalogue, <?php echo $user ?>!</h2>
	<div>
		<p>What would you like to do next?</p>

		<form name="list_users_books" action="user_booklist.php" method="POST">
			<input type="submit" name="submit_list" value="Show all of your books"><br>
		</form>

		<form name="new_books" action="new_books.php" method="POST">
			<input type="submit" name="submit_new" value="Enter new books">
		</form>

		<a href="signout.php">Sign Out</a>
	</div>

	<br><br>


	<p>This is a growing catalogue. The list of books is expanding as readers include titles from their personal collections. If you would like to see a full list of books in the catalogue, you can do so here.<p>

	<form name="list_all" action="bookcatalogue.php" method="POST">
		<label>Show list of all books in catalogue (any user)</label><br>
		<input type="submit" name="show_all" value="Show All Books">
	</form>

	<div>
		<?php
		if (isset($_POST['show_all'])) {

			$sql = 'SELECT author.name AS name, 
				book.title AS title 
			FROM author
			INNER JOIN book on author_id = author.id
			ORDER BY name';

			foreach ($db->query($sql) as $row) {
				$name = $row['name'];
				$title = $row['title'];

				echo "<p>$name, <i>$title</i></p>";
			}
		}
		?>
	</div>
</body>
</html>