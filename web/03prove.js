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
		$.ajax({
			url: '03prove_browser.php',
			type: 'POST',
			data: {
				name: 'tomato'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
	});
});

$(document).ready(function() {
	$("#cucumber").click(function() {
		$.ajax({
			url: '03prove_browser.php',
			type: 'POST',
			data: {
				name: 'cucumber'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
	});
});

$(document).ready(function() {
	$("#lettuce").click(function() {
		$.ajax({
			url: '03prove_browser.php',
			type: 'POST',
			data: {
				name: 'lettuce'
			},
			success: function(msg) {
				alert('data posted');
			}
		});
	});

});
