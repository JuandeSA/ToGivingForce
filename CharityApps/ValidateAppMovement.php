<?php
function AppCanBeMoved($app_id,$side_to_move){
	require 'DBConexion.php';
	$sql	= "SELECT COUNT(*) FROM applications INNER JOIN charities ON (applications.charity_id = charities.charity_id) INNER JOIN countries ON (charities.country_id = countries.country_id) WHERE (applications.app_id = $app_id) AND (countries.country_code = 'GBR')";
	if($side_to_move == 'forward') $sql .= " AND (applications.creation_date < CURDATE()) AND (charities.is_approved = 1)";
	$result	= mysql_query($sql,$DB) or oiError(mysql_error($DB));
	$return	= mysql_fetch_array($result);
	return ($return[0] > 0);
    mysql_free_result($result);
}
// EXAMPLE TO USE IN ENDPOINTS:
//require 'ValidateAppMovement.php';
//if(AppCanBeMoved(3,'forward')){ ... }
?>