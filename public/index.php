<html>
	    <head>
	            <title>Space Science Center Adopt-a-star program</title>
	            <link rel="stylesheet" href="style.css">
    		    <link rel="stylesheet" href="http://aladin.u-strasbg.fr/AladinLite/api/v2/latest/aladin.min.css" />
		    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js" charset="utf-8"></script>
	    </head>

	    <body>
		<h1 id="sitetitle">Space Science Center Adopt-A-Star Program</h1>
	    <div class="skyview">
			<div id="aladin-lite-div"></div>
			<script type="text/javascript" src="http://aladin.u-strasbg.fr/AladinLite/api/v2/latest/aladin.min.js" charset="utf-8"></script>

			<?php


				//convert RA to J2000
				function raToGal($lad, $lam, $las) { return ($lad + ($lam/60) + ($las/3600)) * 15; }

				//convert Dec to J2000
				function decToGal($lod, $lom, $los){ return ($lod + $lom/60 + ($los/3600)); }

				//get the the of celestial body
				function getFlag($num){
					if($num == 1){ return "Star"; }
					else if($num == 2){ return "Binary Star"; }
					else if($num == 3){ return "Suspected Star"; }
					else if($num == 4){ return "Planet"; }
					else{ return "null"; }
				}

				//db connection
				$file = file_get_contents("../private/info.json");
				$db_info = json_decode($file, true);

				$user = $db_info['user'];
				$pwd = $db_info['pwd'];
				$db = $db_info['db'];

				//db connection
				$conn = mysql_connect('mysql.nasa-tess.org', $user, $pwd) or die('Could not connect');

				mysql_select_db($db) or die('ERROR');

				//$query = "select * from stars where id=757076;";
				$query = "select * from stars where adopted_by='' order by rand() limit 2500;";

				$r = mysql_query($query) or die('QUERY ERROR');

				//javascript for view of stars
				echo '<script type="text/javascript">';

				//web view for stars
				echo "	var aladin = A.aladin('#aladin-lite-div', { survey : 'P/DSS2/color', target: '665.5 +19', fov : 10, fullscreen : true, showZoomControl : false, showFullscreenControl : false, showLayersControl : false, showGotoControl : false });";

				//beacon adding
				echo "	var unadopted = A.catalog('#aladin-lite-div', { name: 'Unadopted Targets', color: 'rgb(0,0,255)', sourceSize: 50 });";
				echo "	aladin.addCatalog(unadopted);";

				while($qcol = mysql_fetch_array($r, MYSQL_ASSOC)){

					$type="";

					if($q2col["flag"] == 1){ $type = "Star"; }
					else if($qcol["flag"] == 2){ $type = "Double Star"; }
					else if($qcol["flag"] == 3){ $type = "Suspected Star"; }
					else if($qcol["flag"] == 4){ $type = "Planet"; }

					$l = raToGal($qcol["lat_d"], $qcol["lat_m"], $qcol["lat_s"]);
					$b = decToGal($qcol["lon_d"], $qcol["lon_m"], $qcol["lon_s"]);
					echo "unadopted.addSources([A.marker(" . (string)$l  . "," . (string)$b . ", {popupTitle: 'ID: " . $qcol["id"] .  "', popupDesc: '<em>Celestial Body: </em>". getFlag($qcol["flag"]) ." <br/><em>Right Acension: </em> " . $b . "<br/> <em>Declination: </em>" . $l . "'})]);";

				}


				echo '</script>';
			?>
		</div>
	    </body>

</html>
