<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="homepage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="homepage.js"></script>

</head>

<body>
	<h1>Beautiful Tasmania</h1>

	<div>
		<a href="assignments.php">Access Links to Assignments</a>
	</div>

	<div id="div_intro">
		<p>If you ever get the chance to visit Tasmania, Australia, <span id="cradle_mountain">Cradle Mountain<span id="cradle_mountain_text">This view of Cradle Mountain can be reached by driving to Lake Dove in the Cradle Mountain-Lake St Clair National Park. Gorgeous!</span></span> is a beautiful destination! This photo was taken at sunset in July of 2019. Yes, that is snow on the mountain because July is in the middle of winter in the Southern Hemisphere. The following pictures are from a trip my husband and I look to Tasmania to celebrate our 30th wedding anniversary. We had a fantastic and very memorable trip!</p>
		<img src="cradlemountain_sunset.jpeg" class="rounded img-fluid" alt="Cradle Mountain at sunset">
	</div>
	
	<div id="pademelon">
		<p>This little <span id="pademelon_info">pademelon<span id="pademelon_text">The Tasmanian pademelon is also known as the red-bellied padamelon and is the only species of pademelon native to Tasmania.</span> </span> was near the cabin where we stayed. A pademelon is a marsupial that looks like a small kangaroo. They are very prevalent in Tasmania.</p>
		<img src="pademelon.jpeg" id="pademelon_pic" class="rounded-circle img-fluid" alt="Pademelon in the headlights">
	</div>
	
	<div id="cliff">
		<p>The scenery is stunning!</p>
		<img src="cliff.jpeg" class="rounded img-fluid" alt="Cliff with clouds">
	</div>
	
	<div id="wombat">
		<p>We were only there for a few days, but we saw wildlife every day. Here is a wombat taking a stroll across the road.</p>
		<img src="wombat.jpeg" class="rounded-circle img-fluid" alt="Wombat crossing the road">
	</div>

	<div id="summary">
		We had a great adventure! If you ever get the chance, Tasmania is a great vacation destination!
	</div>

	<div>
		<?php
		echo "It is currently " . date("l\, j M Y\, h:i:s T") . " in Melbourne, Australia.<br>";
		?>
		<a href="assignments.php">Access Links to Assignments</a>
	</div>

</body>
</html>
