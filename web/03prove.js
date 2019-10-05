//<?php
//session_start();
//?>
//if (!isset($_SESSION['cart'])) {
//	$_SESSION['cart'] = array();
//}
//var cartList = [$_SESSION['cart']];

var cartItem = [];

function addToCart(typeOfSeed) {
	var seed = typeOfSeed.value;
	//cartlist.push(seed);

	alert ("Added " + seed);

	//$_SESSION['cart'] = cartList;

	//alert ($_SESSION['cart']);

}



$(document).ready(function() {
	$("#tomato").click(function() {
		$.post("03prove_array.php",
		{
			'cartItem[]' : ["Tomato"]
		});
	})
	$("#button3").click(function() {
		$("#div3").fadeToggle("slow");
	})
});
