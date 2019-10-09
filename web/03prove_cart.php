<?php
//header("Location: 03prove_cart.php");

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
</html>
<?php

//echo $_SESSION['cart'][0];
//$name = $_POST["name"];

//echo $name;

//$price =$_POST["price"];

//if (isset($_POST["tomato"])) {
 	//$tomato = "Tomato-for-you";
 	//array_push($_SESSION['cart'], $tomato);

 	//echo $_SESSION['cart'][1] . "X";

 	foreach ($_SESSION['cart'] as $key => $value) {
 		echo "You have added " . $value . " to your cart.<br>";
 	}
 //} 
//echo $tomato;

//echo $_POST["name"]; 
//echo "<br>";

//$mail = $_POST["email"];

?>

