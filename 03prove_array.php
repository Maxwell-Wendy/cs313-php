<?php

session_start();

if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}

if (isset($_POST["tomato"])) {
 	$tomato = $_POST["tomato"];
 	array_push($_SESSION["cart"], $tomato);

 	foreach ($_SESSION["cart"] as $key => $value) {
 		echo $value;
 	}
 } 


?>