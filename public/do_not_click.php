<!--
	Developer: Steven Burgess
	Date of Creation: Sept. 13th, 2016
	Date of last Maintenace: Sept. 13th, 2016
	File: do_not_click.php
-->

<doctype html>

<html>

	<header>
		<meta charset="UTF-8"/>
		<script type="text/javascript" src="jquery.js"></script>
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
					<!--a href="adopt_a_star.php">Adopt a Star</a><br-->
					<!--aView Adopted Stars</a><br-->
					<!--a href="about.html">About</a><br-->
					<a href="index.php">Main Page</a><br>
					<a href="do_not_click.php">DO NOT CLICK!</a>
				</ul>
			</aside>

<!--			<div class="main">
				<h1>Please enter your star information</h1>
				<?php include('star_search.php')?>
			</div>
-->

			<div class="main">
				<?php include ('get_all_stars.php')?>
			</div>

			<script>
			<div id="star_viewport">
			</div>

		</div>



	</body>

	<footer>
	<footer>

</html>
