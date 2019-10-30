<?php
session_start();

require "dbConnect.php";
$db = get_db();

$badLogin = false;

if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $db->prepare('SELECT password FROM user_info WHERE username = :username');
	$stmt->bindValue(':username', $username);
	$result = $stmt->execute();

	if ($result) {
		$row = $stmt->fetch();
		$hashed_pwd_from_db = $row['password'];

		if (password_verify($password, $hashed_pwd_from_db)) {
			$_SESSION['user'] = $username;
			header("Location: bookcatalogue.php");
			die();
		}
		else {
			$badLogin = true;
		}
	}
	else {
		$badLogin = true;
	}
}
$_SESSION['is_bad_login'] = $badLogin;
?>