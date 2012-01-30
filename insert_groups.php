



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<!-- the next meta tag does the redirect -->
<meta http-equiv="refresh" content="3;url=http://localhost:8888/webtech/Database-driven-Web-Technology-Assignment/add_groups.php">
<title>Page Title</title>
</head>
<body>
<p>
<?php
	//insert_groups.php
	//include("db_connect_xqz20120129.php");
	$con = mysql_connect("localhost:8889","root","root");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("webdb2", $con);


$sql = "INSERT INTO groups (ID_group, group_name)
VALUES
('$_POST[ID_group]','$_POST[group_name]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>

Wait a few seconds...</p>
<p><a href="http://localhost:8888/webtech/Database-driven-Web-Technology-Assignment/add_groups.php">Add new record.</a></p>
</body>
</html>