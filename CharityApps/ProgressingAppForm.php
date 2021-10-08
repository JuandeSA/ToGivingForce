<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> </head>
<body>
<?php require 'DBConexion.php';?>

<form name="MainForm" action="ProgressingAppResult.php" method="post" target="frameResult">
	<table align="center" cellspacing="20">
		<tr> <td></td>							<td> MOVE AN APPLICATION FROM "Allow to Proceed" TO "Paid"			</td> <td></td>	</tr>
		<tr> <td align="right">User</td>		<td> <select name="eUser" style="width:300;height:30"><?php
				//// fill combobox users
				$sql	= "SELECT user_id, name FROM users WHERE user_id in (SELECT DISTINCT user_id FROM user_roles WHERE role = 'admin_applications') ORDER BY name";
				$list	= mysql_query($sql,$DB) or die(mysql_error($DB));
				$html	= "";
				while($row = mysql_fetch_array($list)) $html  .= "<option value='".$row['user_id']."'>".$row['name']."</option>";
				echo $html;
				mysql_free_result($list);?> </select>																</td> <td></td>	</tr>
		<tr> <td align="right">Application</td>	<td> <select name="eApp" style="width:300;height:30"><?php
				//// fill combobox apps (maybe it should only show apps that belong to the selected user in the previous control)
				$sql	= "SELECT app_id, name FROM applications WHERE stage_id = 2 ORDER BY name";
				$list	= mysql_query($sql,$DB) or die(mysql_error($DB));
				$html	= "";
				while($row = mysql_fetch_array($list)) $html  .= "<option value='".$row['app_id']."'>".$row['name']."</option>";
				echo $html;
				mysql_free_result($list);?> </select>																</td> <td></td>	</tr>
		<tr> <td></td>							<td> <button name="bMove" type="submit"	value="Move">MOVE</button>	</td> <td></td>	</tr>
	</table>
</form>

</body>
</html>