<!--
	Developer: Steven Burgess
	Date of Creation: Sept. 5th, 2016
	Date of last Maintenace: Sept. 8th, 2016
	File: index.php
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
				<!--	<a href="adopt_a_star.php">Adopt a Star</a><br>
					<a>View Adopted Stars</a><br>
					<a href="about.html">About</a> -->
					<a href="do_not_click.php">DO NOT CLICK!</a>
				</ul>
			</aside>

			<div class="main">
				<h1>Please enter your star information</h1>
				<!--?php include('star_search.php')?-->
			</div>

			<div class="main">
				
				<h3>All adopted stars</h3>
				<?php include ('get_adopted_stars.php')?>
			</div>

		</div>


	</body>

	<footer>
	<footer>

</html>
