<?php
$q=$_GET["q"];

$con = mysql_connect('localhost:8889', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("webdb2", $con);

$sql="SELECT * FROM payments WHERE ID_group = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Fullname</th>
<th>comment</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID_group'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['comment'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>