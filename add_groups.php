<?php
	// Add groups module
	include("db_connect_xqz20120129.php");

?>

<html>
<body>

<form action="insert_groups.php" method="post">
<input type="hidden" name="ID_group" />
Groupname: <input type="text" name="group_name" />
<input type="submit" />
</form>
<hr>
</body>
</html>



<?php


$result = mysql_query("SELECT * FROM groups");

echo "<table border='1'>
<tr>
<th>ID_group</th>
<th>group_name</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID_group'] . "</td>";
  echo "<td>" . $row['group_name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>