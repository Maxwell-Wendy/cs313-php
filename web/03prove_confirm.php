<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="03prove.css">
	<script type="text/javascript" src="03prove.js"></script>
</head>
<body>
	<a href="03prove_checkout.php">Back to Checkout</a>

</body>
</html>
