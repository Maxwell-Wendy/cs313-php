<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html>
<script type="text/javascript" src="03prove.js"></script>
<a href="03prove_browse.php">Back to Browsing</a>

<h1>Shopping Cart</h1>
<br>
<br>

<?php

 	foreach ($_SESSION['cart'] as $key => $value) {
 		echo "You have added " . $value . " to your cart.<br>";
?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<input type="hidden" name="seed" value="Seed">
			<input type="submit" name="submit" value="Remove Item">
		</form>
<?php 
	if(isset($_POST["seed"]))
	$_SESSION['cart'] = \array_diff($_SESSION, [$value]);


 	}

?>

</html>