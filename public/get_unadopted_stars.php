<?php

/*
	Programmer: Steven Burgess
	Date of Creation: Sept 7th, 2016
	Date of Last Maintenance: Sept 12th, 2016
	File Name: get_unadopted_stars.php
*/

$limit = 50;

$page = 1;

if(isset($_GET['page'])){

	$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
	if(false === page){
		$page = 1;
	}

}

$offset = ($page - 1) * $limit;

require_once('../../private/mysql_connect.php');
$query = "select number, mag, teff, logg, mh, adopted_by from stars where adopted_by != '' LIMIT " . $offset . "," . $limit . ";";

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
		echo '<tr>';
		echo '<tr><td align="left">' . $row['number'] .
		'</td><td align="left">' . $row['mag'] .
		'</td><td align="left">' . $row['teff'] .
		'</td><td align="left">' . $row['logg'] .
		'</td><td align="left">' . $row['mh'] .
		'</td><td align="left">' . $row['adopted_by'] . '</td>';
		echo '</tr>';
	}

	echo '</table>';

	echo '</div>';

	$new_query = "select number, mag, teff, logg, mh, adopted_by from stars where adopted_by = '';";

	$new_response = @mysqli_query($dbc, $new_query);

	$total_records = mysqli_num_rows($new_response);

	$total_pages = ceil($total_records / $limit);

	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

	$startPoint = $page - 1;

	echo '<a href="get_unadopted_stars.php">First</a>';

	if ($page > 1){
		$temp1 = $page - 1;
   		echo '<a href="get_unadopted_stars.php?page='.$temp1.'">Previous</a>';	
	}

	if ($page != $total_pages){
   		$temp2 = $page + 1;
		echo '<a href="get_unadopted_stars.php?page='.$temp2.'">Next</a>';
	}

	echo '<a href="get_unadopted_stars.php?page=' . $total_pages . '">Last</a>';

	echo '</div>';

}else{

	echo "Could not query from database";
	mysqli_error($dbc);
}

mysqli_close($dbc);


?>
