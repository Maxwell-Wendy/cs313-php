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

	<h2>Your order details</h2>
	<div class="confirm">
		<?php
			$name = $_POST["name"];
			$street = $_POST["street"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$zip = $_POST["zip"];
			$email = $_POST["email"];

			echo "You have ordered: <br>";

			if(!empty($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $key => $value) {
					echo $value . "<br>";
				}
			}

			echo "It will be shipped to: <br>";
			echo $name . "<br>" . $street . "<br>";
			echo $city . ", " . $state . " " . $zip . "<br>";

			echo "Your confirmation email will be sent to " . $email . ".<br>";
			echo "Thank you for your order!";

		?>
	</div>

</body>
</html>