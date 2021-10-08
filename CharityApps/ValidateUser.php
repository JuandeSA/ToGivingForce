<?php
function AllowedUser($user_id,$role){
	require 'DBConexion.php';
	$sql	= "SELECT COUNT(*) FROM user_roles WHERE (user_id = $user_id) AND (role = '$role')";
	$result	= mysql_query($sql,$DB) or oiError(mysql_error($DB));
	$return	= mysql_fetch_array($result);
	return ($return[0] > 0);
    mysql_free_result($result);
}
// EXAMPLE TO USE IN ENDPOINTS:
//require 'ValidateUser.php';
//if(AllowedUser(1,'employee')){ ... }
?>