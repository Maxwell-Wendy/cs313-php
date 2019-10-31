<?php
session_start();

require "dbConnect.php";
$db = get_db();

if(isset($_POST['submit_changes'])) {
	if (isset($_SESSION['user'])) {
		$username = $_SESSION['user'];
	}
	else {
		header("Location: signin.php");
		die(); 
	}

	if (isset($_POST['date_read_new'])) {
		$d = htmlspecialchars($_POST['date_read']);
	} 
	else {
		$d = NULL;
	}

	if (isset($_POST['is_owned_new'])) {
		$is_o = 1;
	}
	else {
		$is_o = 0;
	}

	if (isset($_POST['is_read_new'])) {
		$is_r = 1;
	}
	else {
		$is_r = 0;
	}

	if (isset($_POST['is_wish_new'])) {
		$is_w = 1;
	}
	else {
		$is_w = 0;
	}

	$b_id = $_POST['book_id'];
	$u_id = $_POST['user_id'];

	//update book and user info to book_user with and without dates
	if ($d == NULL) {
		$stmt_b_u = $db->prepare('UPDATE book_user SET is_owned = :is_owned, is_read = :is_read, is_wishlist = :is_wishlist WHERE user_id = :user_id AND book_id = :book_id');
		$stmt_b_u->bindValue(':user_id', $u_id);
		$stmt_b_u->bindValue(':book_id', $b_id);
		$stmt_b_u->bindValue(':is_owned', $is_o);
		$stmt_b_u->bindValue(':is_read', $is_r);
		$stmt_b_u->bindValue(':is_wishlist', $is_w);
		$stmt_b_u->execute();
	}

	else {
		$stmt_b_u = $db->prepare('UPDATE book_user SET is_owned = :is_owned, is_read = :is_read, is_wishlist = :is_wishlist, date_read = :date_read WHERE user_id = :user_id AND book_id = :book_id');
		$stmt_b_u->bindValue(':user_id', $u_id);
		$stmt_b_u->bindValue(':book_id', $b_id);
		$stmt_b_u->bindValue(':is_owned', $is_o);
		$stmt_b_u->bindValue(':is_read', $is_r);
		$stmt_b_u->bindValue(':is_wishlist', $is_w);
		$stmt_b_u->bindValue(':date_read', $d);
		$stmt_b_u->execute();
	}

	header("Location: book_details.php");
	die();
}
?>