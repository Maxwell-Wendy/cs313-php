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

	<form action="03prove_array.php" method="post">
		<input type="submit" name="View Cart">
	</form>


</body>
</html>