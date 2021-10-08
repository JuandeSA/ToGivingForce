<?php
if(!(isset($DB))){
	$Host	= 'localhost';
	$User	= 'givingforce';
	$Pass	= 'Oxford.shire';
	$Schema	= 'gf_interview_task';
	$DB		= mysql_connect($Host, $User, $Pass) or die ('Error conecting to the database. Check conecting parameters.');
	mysql_select_db($Schema,$DB) or die(mysql_error($DB));
	mysql_query("SET NAMES 'utf8'");
}
?>