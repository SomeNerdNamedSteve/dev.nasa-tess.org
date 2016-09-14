<!--
	Developer: Steven Burgess
	Date of Creation: Sept. 5th, 2016
	Date of last Maintenace: Sept. 13th, 2016
	File: adopt_a_star.php
-->

<doctype html>

<html>

	<header>
		<meta charset="UTF-8"/>
		<script type="text/javascript" src="app.js"></script>
		<link rel="stylesheet" type="text/css" media="only screen and (min:width:768 and max-width:980px)" href="style_768.css"></link>
		<link rel="stylesheet" type="text/css" href="style_large.css"></link>
		<link rel="stylesheet" type="text/css" media="only screen and (min:width:600 and max-width:767px)" href="style_600.css"></link>
		<link rel="stylesheet" type="text/css" media="only screen and (min:width:300 and max-width:599px)" href="style_300.css"></link>
	</header>

	<body onresize="getWindowWidth()">

		<h1>Space Science Institute Adopt-A-Star Program</h1>

		<div class="wrapper">
			<aside class="aside">
				<ul id="asidelist">
					<a href="adopt_a_star.php">Adopt a Star</a><br>
					<a href="index.php">View Adopted Stars</a><br>
					<a href="about.html">About</a>
				</ul>
			</aside>

			<div class="main">
				<h2>What can I adopt?</h2>
				

			</div>

			<div class="main">
				<h2>All Unadopted stars</h2>
				<?php include ('get_unadopted_stars.php')?>
			</div>

		</div>


	</body>

	<footer>
	<footer>

</html>
