<?php

/*
	Programmer: Steven Burgess
	Date of Creation: Sept 13th, 2016
	Date of Last Maintenance: Sept 13th, 2016
	File Name: get_all_stars.php
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
$query = "select * from stars;";
/*
	Variables:
	adopted_by
	flag (1=star,2=binary,3=suspected planet,4=planetary system)
	id
	lat_d
	lat_m
	lat_s
	logg
	lon_d
	lon_m
	lon_s
	mag
	mh
	number
	teff
*/
$response = @mysqli_query($dbc, $query);

if($response){


	$total_records = mysqli_num_rows($response);

/*
	echo '<table align="left"
	cellspacing="5" cellpadding="8">
	<tr><td align="left"><b>Number</b></td>
	<td align="left"><b>Mag</b></td>
	<td align="left"><b>Teff</b></td>
	<td align="left"><b>log(g)</b></td>
	<td align="left"><b>M/H</b></td>
	<td align="left"><b>Adopted By</b></td>';

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

	echo '<div>';

	$query = "select number, mag, teff, logg, mh, adopted_by from stars;";
	$new_response = @mysqli_query($dbc, $query);
	$total_records = mysqli_num_rows($new_response);
	$total_pages = ceil($total_records / $limit);
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$startPoint = $page - 1;

	echo '<a href="do_not_click.php">First</a>';
	if ($page > 1){
		$temp1 = $page - 1;
   		echo '<a href="do_not_click.php?page='.$temp1.'">Previous</a>';
	}
	if ($page != $total_pages){
   		$temp2 = $page + 1;
		echo '<a href="do_not_click.php?page='.$temp2.'">Next</a>';
	}
	echo '<a href="do_not_click.php?page=' . $total_pages . '">Last</a>';
	echo '</div>';
*/

}else{
	echo "Could not query from database";
	mysqli_error($dbc);
}

mysqli_close($dbc);


?>

<input type="hidden" id="limit" value="<?php echo $limit; ?>" />
<script type="text/javascript">
var limit = "<?= $limit ?>";
alert(limit);
</script>
