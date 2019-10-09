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

	<?php
		echo "Your cart contains: <br>";
	?>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		
		<?php foreach($_SESSION['cart'] as $k => $p): ?>
        <?php echo $p; ?>&nbsp;<button type="submit" name="remove" value="<?php echo $k; ?>">Remove</button><br/>
    	<?php endforeach; ?>
		
	</form>

	<?php 
	if(isset($_POST["remove"])) {
		$item = $_POST["remove"]; 
		unset($_SESSION['cart'] [$item]);

		$page = $_SERVER['PHP_SELF'];
		$sec = ".5";
		header("Refresh: $sec; url = $page");
	}
	
?>
	<form action="03prove_checkout.php" method="post">
		<input type="submit" name="checkout" value="Proceed to Checkout">
	</form>

</body>
</html>