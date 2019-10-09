<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="03prove.css">
	<script type="text/javascript" src="03prove.js"></script>
</head>
<body>
	<a href="03prove_browse.php">Back to Browsing</a>

	<h1>Shopping Cart</h1>
	<br>
	<br>

<?php

 	foreach ($_SESSION['cart'] as $key => $value) {
 		echo "You have added " . $value . " to your cart.<br>";
?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<input type="hidden" name="remove" value="<?php echo $value ?>">
			<!-- <input type="submit" name="submit" value="Remove Item"> -->
			<input type="button" name="delete" onclick="message()" value="Remove Item">
		</form>
	<?php 
	if(isset($_POST["remove"])) {
		$item = $_POST["remove"]; ?>
		<!-- <div class="delete">
			<form action="<?php //echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<input type="hidden" name="confirm" value="<?php //echo $value ?>">
			<input type="submit" name="submit" value="Confirm Remove Item">
		</form>-->


		<?php 
		$_SESSION['cart'] = \array_diff($_SESSION['cart'], [$item]);
	}
}	
?>
	<form action="03prove_checkout.php" method="post">
		<input type="submit" name="checkout" value="Proceed to Checkout">
	</form>

</body>
</html>