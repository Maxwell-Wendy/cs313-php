<?php

session_start();

require "dbConnect.php";
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

if(!isset($_POST['username']) || $username =="" 
		|| !isset($_POST['password']) || $password == ""){
    header("Location: signup.php");
    die();
}
$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare('INSERT INTO user_info (username, password) VALUES (:username, :password)');
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $hashedPassword);
$stmt->execute();

header("Location: signin.php");
die();

?>
