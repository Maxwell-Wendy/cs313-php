function showAlert() {
	alert("Clicked!");
}

function changeColor() {
	var x = document.getElementById("color").value;
	document.getElementById("div1").style.backgroundColor = x;
}

$(document).ready(function() {
	$("#button2").click(function() {
		
		$("#div1").css("backgroundColor", $("#color").val());

	})
});