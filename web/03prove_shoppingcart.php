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
	$item = "Tomato"
	if(!isset($_SESSION['cart'])){
	    $_SESSION['cart'] = array();
	    $_SESSION['cart'][] = $item;

	    echo "woerlk";

    }

    else {
     echo "yuck";
}
	?> 

	<h1>Seeds for Your Home Garden</h1>

	<div class="seeds">
		<h2>Tomato</h2>
		<p>Tomatoes are a popular choice for any home garden!</p>
		<p class="quantity">25 seeds</p>
		<p class="price">$3.50</p>
		<p><button id="tomato">Add to Cart</button></p>
		<!--<form action="03prove_array.php" method="post">
			<input type="submit" name="tomato" value="Tomato">
		</form> -->
	</div>

	<div class="seeds">
		<h2>Lettuce</h2>
		<p>The perfect start to a fresh salad!</p>
		<p class="quantity">90 seeds</p>
		<p class="price">$1.00</p>
		<p><button id="lettuce">Add to Cart</button></p>
	</div>

	<div class="seeds">
		<h2>Cucumber</h2>
		<p>Great fresh or pickled!</p>
		<p class="quantity">20 seeds</p>
		<p class="price">$1.50</p>
		<p><button id="cucumber">Add to Cart</button></p>
	</div>

	<div class="seeds">
		<h2>Oregano</h2>
		<p>Italian seasoning at your fingertips!</p>
		<p class="quantity">50 seeds</p>
		<p class="price">$2.00</p>
		<p><button id="oregano">Add to Cart</button></p>
	</div>

	<div class="seeds">
		<h2>Cilantro</h2>
		<p>Mix with your home-grown tomatoes for fresh salsa!</p>
		<p class="quantity">30 seeds</p>
		<p class="price">$2.50</p>
		<p><button id="cilantro">Add to Cart</button></p>
	</div>

	<div class="seeds">
		<h2>Dill</h2>
		<p>The perfect start to a fresh salad!</p>
		<p class="quantity">75 seeds</p>
		<p class="price">$3.00</p>
		<p><button id="dill">Add to Cart</button></p>
	</div>

	<form action="03prove_array.php" method="post">
		<input type="submit" name="View Cart">
	</form>





</body>
</html>