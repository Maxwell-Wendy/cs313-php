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
    <p>This is a test to print the name: <?php echo $_SESSION['cart'][0]?></p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<input type="hidden" name="name" value="<?php echo $_SESSION['cart'][$value]?>">
			<input type="submit" name="submit" value="Remove Item">
		</form>
<?php 
	if(isset($_POST["name"]))
	$_SESSION['cart'] = \array_diff($_SESSION['cart'], [$value]);


 	}

?>
</body>
</html>