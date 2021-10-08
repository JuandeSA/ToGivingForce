<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<table align="center"><tr><td>
	<?php
	if(isset($_POST["eUser"], $_POST["eApp"])){
		//// check values
			if($_POST["eUser"]=="")	echo "You must select the <b>user</b>.";
		elseif($_POST["eApp"]=="")	echo "You must select the <b>application</b>.";
		else{
			//// check user permission (actually, it is not nessesary, as I already filtered users to the combobox control)
			require 'ValidateUser.php';
			if(!AllowedUser($_POST["eUser"],'admin_applications'))
				echo "<b>User</b> not allowed!";
			else{
				//// check app movement
				$app_id	= $_POST["eApp"];
				require 'ValidateAppMovement.php';
				if(!AppCanBeMoved($app_id,'forward'))
					echo "<b>Application</b> movement not allowed!";
				else{
					//// perform movement
					$sql = "UPDATE applications SET stage_id = 3 WHERE app_id = $app_id";
					if(mysql_query($sql))	echo "The application was moved successfully";
					else					echo "Error: ".$sql."<br>".mysql_error($DB);
				}
			}
		}
	}else echo "";
	?>
	</td></tr></table>
</body>
</html>