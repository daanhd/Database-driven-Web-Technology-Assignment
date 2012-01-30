<?php

mysql_connect('localhost:8889', 'root', 'root');
mysql_select_db('webdb2');

$sql = "SELECT group_name FROM groups";
	$result = mysql_query($sql);

	echo "<select name='group_name'>";
	while ($row = mysql_fetch_array($result)) {
	    echo "<option value='" . $row['group_name'] . "'>" . $row['group_name'] . "</option>";
	}
	echo "</select>";

	?>