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
	$("#tomato").click(function(e) {
		$.ajax({
			url: '03prove_browse.php',
			type: 'POST',
			data: {
				name: 'tomato'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
		//e.preventDefault();
	});
});

$(document).ready(function() {
	$("#cucumber").click(function(e) {
		$.ajax({
			url: '03prove_browse.php',
			type: 'POST',
			data: {
				name: 'cucumber'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
		//e.preventDefault();
	});
});

$(document).ready(function() {
	$("#lettuce").click(function(e) {
		$.ajax({
			url: '03prove_browse.php',
			type: 'POST',
			data: {
				name: 'lettuce'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
		//e.preventDefault();
	});
});
