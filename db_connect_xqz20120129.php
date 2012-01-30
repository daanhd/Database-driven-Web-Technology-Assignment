<?php
	// db_connect by Corné
	// random filename for extra security
	$connect = mysql_connect("localhost:8889", "root", "root") or die("Couldn't connect!");
	mysql_select_db("dbweb") or die("Couldn't find database!");
?>