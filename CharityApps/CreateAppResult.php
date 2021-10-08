<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<table align="center"><tr><td>
	<?php
	if(isset($_POST["eName"], $_POST["eDate"], $_POST["eUser"], $_POST["eChar"])){
		//// check values
			if($_POST["eName"]=="")	echo "You must enter the <b>name</b>.";
		elseif($_POST["eUser"]=="")	echo "You must select the <b>user</b>.";
		elseif($_POST["eChar"]=="")	echo "You must select the <b>charity</b>.";
		elseif($_POST["eDate"]=="")	echo "You must enter the <b>date of creation</b>.";
		else{//// check date of creation, should be in the past
			$date		= $_POST["eDate"];
			$created	= strtotime($date);
			$today		= strtotime(date("d-m-Y",time()));
			if($created >= $today)	echo "The <b>date of creation</b> must be in the past.";
			else{
				//// conect database
				require 'DBConexion.php';
				//// insert row
				$name	= $_POST["eName"];
				$user	= $_POST["eUser"];
				$char	= $_POST["eChar"];
				$sql	= "INSERT INTO applications (name,creation_date,user_id,charity_id,stage_id) VALUES ('$name','$date',$user,$char,1)";
				if(mysql_query($sql))	echo "New application created successfully";
				else					echo "Error: ".$sql."<br>".mysql_error($DB);
			}
		}
	}else echo "";
	?>
	</td></tr></table>
</body>
</html>