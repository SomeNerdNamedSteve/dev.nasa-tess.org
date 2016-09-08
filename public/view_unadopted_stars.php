<!--
	Developer: Steven Burgess
	Date of Creation: Sept. 5th, 2016
	Date of last Maintenace: Sept. 8th, 2016
	File: view_unadopted_stars.php
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

		<div class="wrapper">
			<aside>
				<ul id="asidelist">
					<a>Adopt a Star</a><br>
					<a>View Adopted Stars</a><br>
					<a>About</a>
				</ul>
			</aside>

			<main>
				<h1>Space Science Institute Adopt-A-Star Program</h1>
				<h3>All adopted stars</h3>
				<?php include ('get_unadopted_stars.php')?>
			</main>

		</div>


	</body>

</html>
