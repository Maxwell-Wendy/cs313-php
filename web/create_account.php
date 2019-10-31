<?php

session_start();

require "dbConnect.php";
$db = get_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_pwd'])) {
	if (isset($_SESSION['pwd_error'])) {
		unset($_SESSION['pwd_error']);
	}

	$username = $_POST['username'];
	$password = $_POST['password_1'];
	$check_password = $_POST['password_2'];

	if(!isset($_POST['username']) || $username =="" 
			|| !isset($_POST['password_1']) || $password == "" 
			|| !isset($_POST['password_2']) || $check_password == ""){
		$_SESSION['pwd_error'] = "You must fill all fields.";
	    header("Location: signup.php");
	    die();
	}

	$username = htmlspecialchars($username);

	$valid = true;

	if ($password != $check_password) {
		$_SESSION['pwd_error'] = "Your passwords do not match. Try again.";
		$valid = false;
	}

	if (!preg_match("/\w{7,}/", $password)) {
        $_SESSION['pwd_error'] = "Your password must have at least 7 characters. Try again.";
        $valid = false;
    }

    if (!preg_match("/[0-9]+/", $password)) {
        $_SESSION['pwd_error'] = "Your password must have at least one number. Try again.";
        $valid = false;
    }

    if ($valid) {
    	try {
    		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			$stmt = $db->prepare('INSERT INTO user_info (username, password) VALUES (:username, :password)');
			$stmt->bindValue(':username', $username);
			$stmt->bindValue(':password', $hashedPassword);
			$stmt->execute();

			header("Location: signin.php");
			die();
    	}
    	catch (PDOException $ex) {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
    }
}

?>
