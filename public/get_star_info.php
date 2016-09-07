<?php

require_once('../../mysql_connect.php');
$query = "select number, mag, tell, logg, mh, adopted_by from stars;"

$response = @mysqli_query($dbc, $query);

if($response){



}else{

	echo "Could not query from database";
	mysqli_error($dbc);
}

mysqli_close($dbc);

?>
