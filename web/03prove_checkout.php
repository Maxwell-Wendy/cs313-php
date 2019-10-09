<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="03prove.css">
	<script type="text/javascript" src="03prove.js"></script>
</head>
<body>
	<a href="03prove_cart.php">Back to Cart</a>
	<h1>Enter your Shipping Information</h1>
	<div class="address">
		<form action="03prove_confirm.php" method="post">
			<label for="name">Full Name</label>
			<input type="text" id="name" name="name" placeholder="John Doe"><br>
			<label for="street">Street Address</label>
			<input type="text" id="street" name="street" placeholder="123 Any St."><br>
			<label for="city">City</label>
			<input type="text" id="city" name="city" placeholder="Your City">
			<label for="state">State</label>
			<input type="text" id="state" name="state" placeholder="Your State">
			<label for="zip">Zip Code</label>
			<input type="text" id="zip" name="zip" placeholder="00000"><br>
			<label for="email">Email</label>
			<input type="text" id="email" name="email" placeholder="johndoe@example.com"><br>
			<input type="submit" name="submit" value="Place your Order">
		</form>
		<form action="03prove_cart.php" method="post">
			<input type="submit" name="submit" value="Return to Cart">
		</form>

	</div>

</body>
</html>
