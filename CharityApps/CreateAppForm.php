<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> </head>
<body>
<?php require 'DBConexion.php';// conect database ?>

<form name="MainForm" action="CreateAppResult.php" method="post" target="frameResult">
	<table align="center" cellspacing="20">
		<tr> <td></td>						<td> CREATE A NEW APPLICATION											</td> <td></td>	</tr>
		<tr> <td align="right">Name</td>	<td> <input  name="eName" type="text"	style="width:300;height:30"/>	</td> <td></td>	</tr>
		<tr> <td align="right">Date</td>	<td> <input  name="eDate" type="date"	style="width:130;height:30"/>	</td> <td></td>	</tr>

		<tr> <td align="right">User</td>	<td> <select name="eUser"				style="width:300;height:30">	<?php
				//// fill combobox users
				$sql	= "SELECT user_id, name FROM users WHERE user_id in (SELECT DISTINCT user_id FROM user_roles WHERE role = 'employee') ORDER BY name";
				$list	= mysql_query($sql,$DB) or die(mysql_error($DB));
				$html	= "";
				while($row = mysql_fetch_array($list)) $html  .= "<option value='".$row['user_id']."'>".$row['name']."</option>";
				echo $html;
				mysql_free_result($list);?> </select>																</td> <td></td>	</tr>

		<tr> <td align="right">Charity</td>	<td> <select name="eChar"				style="width:300;height:30">	<?php
				//// fill combobox charities (I could create a method FillCombo(table,sql,field_names) to not repeat similar code)
				$sql	= "SELECT charity_id, charity_name FROM charities ORDER BY charity_name";
				$list	= mysql_query($sql,$DB) or die(mysql_error($DB));
				$html	= "";
				while($row = mysql_fetch_array($list)) $html  .= "<option value='".$row['charity_id']."'>".$row['charity_name']."</option>";
				echo $html;
				mysql_free_result($list);?> </select>																</td> <td></td>	</tr>

		<tr> <td></td>						<td> <button name="bAdd"  type="submit"	value="Add">SUBMIT</button>		</td> <td></td>	</tr>
	</table>
</form>

</body>
</html>