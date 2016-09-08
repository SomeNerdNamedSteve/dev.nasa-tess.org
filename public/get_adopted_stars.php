<?php

/*
	Programmer: Steven Burgess
	Date of Creation: Sept 7th, 2016
	Date of Last Maintenance: Sept 8th, 2016
	File Name: get_star_info.php
*/

require_once('../../private/mysql_connect.php');
$query = "select number, mag, teff, logg, mh, adopted_by from stars where adopted_by != '';";



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

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($response)){

		echo '<tr><td align="left">' . $row['number'] .
		'</td><td align="left">' . $row['mag'] .
		'</td><td align="left">' . $row['teff'] .
		'</td><td align="left">' . $row['logg'] .
		'</td><td align="left">' . $row['mh'] .
		'</td><td align="left">' . $row['adopted_by'] . '</td></tr>';

	}

echo '</table>';

}else{

	echo "Could not query from database";
	mysqli_error($dbc);
}

mysqli_close($dbc);

?>
