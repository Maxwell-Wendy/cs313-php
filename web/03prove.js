
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
	});
});
