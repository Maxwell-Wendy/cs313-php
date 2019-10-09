<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Browse Items</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="03prove.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="03prove.js"></script>

</head>
<body>

	
<?php

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	?> 

	<h1>Seeds for Your Home Garden</h1>

	<div class="seeds">
		<h2>Tomato</h2>
		<p>Tomatoes are a popular choice for any home garden!</p>
		<p class="quantity">25 seeds</p>
		<p class="price">$3.50</p>
		<!--<p><button id="tomato">Add to Cart</button></p> -->
		<form action="03prove_browse.php" method="post">
			<input type="hidden" name="tomato" value="Tomato">
			<input type="submit" name="submit_tomato" value="Add to Cart">
		</form>
	</div>

	<div class="seeds">
		<h2>Lettuce</h2>
		<p>The perfect start to a fresh salad!</p>
		<p class="quantity">90 seeds</p>
		<p class="price">$1.00</p>
		<!--<p><button id="lettuce">Add to Cart</button></p>-->
		<form action="03prove_browse.php" method="post">
			<input type="hidden" name="lettuce" value="Lettuce">
			<input type="submit" name="submit_lettuce" value="Add to Cart">
		</form>
	</div>

	<div class="seeds">
		<h2>Cucumber</h2>
		<p>Great fresh or pickled!</p>
		<p class="quantity">20 seeds</p>
		<p class="price">$1.50</p>
		<!--<p><button id="cucumber">Add to Cart</button></p>-->
		<form action="03prove_browse.php" method="post">
			<input type="hidden" name="cucumber" value="Cucumber">
			<input type="submit" name="submit_cucumber" value="Add to Cart">
		</form>
	</div>

	
	<form action="03prove_array.php" method="post">
		<input type="submit" name="View Cart">
	</form>

	<?php
	if (isset($_POST["tomato"])) {
		$tomato = $_POST["tomato"];
		array_push($_SESSION['cart'], $tomato);

	}

	elseif (isset($_POST["lettuce"])) {
		$lettuce = $_POST["lettuce"];
		array_push($_SESSION, $lettuce);
	}

	elseif (isset($_POST["cucumber"])) {
		$cucumber = $_POST["cucumber"];
		array_push($_SESSION, $cucumber);
	}
	?>

	<?php

	if(!empty($_SESSION['cart'])) {

		foreach ($_SESSION['cart'] as $key => $value) {
			echo "You have added " . $value . " to your cart.<br>";
		}
	}
	else {
		echo "You have no items in your cart.";
	}
 	?>
 


</body>
</html>