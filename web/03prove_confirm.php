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
			$posted_name = $_POST["name"];
			$name = filter_var($posted_name, FILTER_SANITIZE_STRING);

			$posted_street = $_POST["street"];
			$street = filter_var($posted_street, FILTER_SANITIZE_STRING);

			$posted_city = $_POST["city"];
			$city = filter_var($posted_city, FILTER_SANITIZE_STRING);

			$posted_state = $_POST["state"];
			$state = filter_var($posted_state, FILTER_SANITIZE_STRING);

			$posted_zip = $_POST["zip"];
			$zip = filter_var($posted_name, FILTER_SANITIZE_STRING);

			$posted_email = $_POST["email"];
			$email = filter_var($posted_email, FILTER_SANITIZE_EMAIL);

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