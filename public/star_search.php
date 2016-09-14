<?php

/*
	Programmer: Steven Burgess
	Date of Creation: Sept 8th, 2016
	Date of Last Maintenance: Sept 8th, 2016
	File Name: star_search.php
*/

require_once('../../private/mysql_connect.php');

echo'<h3>Please enter your star's information</h3><form action="star_query.php" method="get">Star Number(begins with KIC)<input type="text" name="in_number"><br>Adopted By<input type="text" name="in_adopted_by"><br></form>';

$query = "select number, mag, teff, logg, mh, adopted_by from stars where adopted_by = '';";

$response = @mysqli_query($dbc, $query);

if($response){

	echo '<table align="left"
	cellspacing="5" cellpadding="8">
	<tr><td align="left"><b>Number</b></td>
	<td align="left"><b>Mag</b></td>
	<td align="left"><b>Teff</b></td>
	<td align="left"><b>log(g)</b></td>
	<td align="left"><b>M/H</b></td>
	<td align="left"><b>Adopted By</b></td>';

	$inner_count = 1;

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($response)){

		while(inner_count < 51){

			echo '<tr><td align="left">' . $row['number'] .
			'</td><td align="left">' . $row['mag'] .
			'</td><td align="left">' . $row['teff'] .
			'</td><td align="left">' . $row['logg'] .
			'</td><td align="left">' . $row['mh'] . '</td></tr>';

		}

		$inner_count++;

	}

echo '</table>';

}else{

	echo "Could not query from database";
	mysqli_error($dbc);
}

mysqli_close($dbc);

?>