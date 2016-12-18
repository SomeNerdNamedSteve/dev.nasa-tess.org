<?php
/*
	Programmer: Steven Burgess
	Date of file creation: 9/16/16
	Date of last maintenance: 12/1/16
	File Name: index.html
	File purpose: To act as the main page of the website
*/
?>



	<html>
	  <head>
	    <title>Space Science Center Adopt-a-star program</title>
	    <link rel="stylesheet" href="style.css">
	  </head>

	  <body>

	    <h1 id="header1">Space Science Center Adopt-A-Star Program</h1>

	    <div id="main">

		    <h2>Find your star!</h2>
		    <form action="index.php" method="post">
			Adopted For: <input name="adopted_by" type="textfield"><br>
			<input type="submit">
		    </form>

		    <?php

				$server = "mysql.nasa-tess.org";
				$user = "sgburgess";
				$pass = "tmp4_Steve";
				$db = "targets";
				$conn = mysqli_connect($server, $user, $pass, $db);

				if(!$conn){ die("Connection Failure"); }
					$adopt = $_POST["adopted_by"];
					$query = "select * from stars where adopted_by like \"$adopt\" limit 1;";
					$result = mysqli_query($conn, $query);
					$num_rows = mysqli_num_rows($result);

				if($num_rows > 0){
					while($row = mysqli_fetch_assoc($result)){
						$latd = floor($row["lat_d"]);
						$latm = floor($row["lat_m"]);
						$lats = floor($row["lat_s"]);
						$lond = floor($row["lon_d"]);
						$lonm = floor($row["lon_m"]);
						$lons = floor($row["lon_s"]);
					}
				}

		   ?>

	    	<iframe src="http://server1.sky-map.org/skywindow?ra=<?php echo $latd; ?> <?php echo $latm; ?> <?php echo $lats; ?>&de=<?php echo $lond; ?> <?php echo $lonm; ?> <?php echo $lons; ?>&zoom=10" width="400" height="300"></iframe>
		<br>
		<br>
	</div>

	<div id="get_star">
		    <h2>Have a star of your own!</h2>

		    <?php
			$server = "mysql.nasa-tess.org";
			$user = "sgburgess";
			$pass = "tmp4_Steve";
			$db = "targets";

			$conn = mysqli_connect($server, $user, $pass, $db);

			if(!$conn){ die("Connection Failure"); }
				$adopt = $_POST["adopted_by"];

				$query = "select * from stars where adopted_by=\"\" order by rand() limit 1;";

				$result = mysqli_query($conn, $query);
				$num_rows = mysqli_num_rows($result);

				if($num_rows > 0){
					while($row = mysqli_fetch_assoc($result)){
						$latd = floor($row["lat_d"]);
						$latm = floor($row["lat_m"]);
						$lats = floor($row["lat_s"]);
						$lond = floor($row["lon_d"]);
						$lonm = floor($row["lon_m"]);
						$lons = floor($row["lon_s"]);
					}
				}
		   ?>

	    	<iframe src="http://server1.sky-map.org/skywindow?ra=<?php echo $latd; ?> <?php echo $latm; ?> <?php echo $lats; ?>&de=<?php echo $lond; ?> <?php echo $lonm; ?> <?php echo $lons; ?>&zoom=10" width="400" height="300"></iframe>
		<br>
		<input type="button" value="Make this star yours! (not fully working yet)"/>
		<p>			</p>
		<input type="button" value="Show me a new star! (Not working yet)"/>

	</div>

 	</body>
	</html>

