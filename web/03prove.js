//<?php
//session_start();
//?>
//if (!isset($_SESSION['cart'])) {
//	$_SESSION['cart'] = array();
//}
//var cartList = [$_SESSION['cart']];

var cartList = [];

function addToCart(typeOfSeed) {
	var seed = typeOfSeed.value;
	//cartlist.push(seed);

	alert ("Hello" + seed);

	//$_SESSION['cart'] = cartList;

	//alert ($_SESSION['cart']);

}
