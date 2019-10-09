<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html>
<a href="03prove_browse.php">Back to Browsing</a>
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

 	}

?>

</html>