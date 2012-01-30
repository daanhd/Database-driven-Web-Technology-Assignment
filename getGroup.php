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
<th>value</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID_group'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['comment'] . "</td>";
  echo "<td>" . $row['value'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


$query = "SELECT SUM(value) ,COUNT(value) FROM payments WHERE ID_group = '".$q."'"; 
	 
$result_table = mysql_query($query) or die(mysql_error());

// Print out result
while($row = mysql_fetch_array($result_table)){
	echo "Total amount for the group ". $row['value']. " = € ". $row['SUM(value)']. ",-";
	echo "<br />";
	$number_rows = mysql_num_rows($result_table);
	$part = $row['SUM(value)'] / $row['COUNT(value)'];
	echo "Your part = € " .round($part,2). ",-";
	
}

mysql_close($con);
?>