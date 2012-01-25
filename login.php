<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Database-driven Web Technology &mdash; by Daan Disselhorst & Corné van Willigen</title>
</head>

<body>

	<div id="wrapper">
	
		<div id="header">
			<h1><a href="index.php">Database-driven Web Technology</a></h1>
			<p>FINANCIAL TRANSACTIONS FOR GROUPS IN A NUTSHELL</p>
		</div>
		
		<div id="content">
			
			<h2>User Login</h2>
			
			<div class="hentry">
				
<?php



$username = $_POST['username'];
$password = $_POST['password'];

if ($username&&$password)
{

$connect = mysql_connect("localhost", "root", "root") or die("Couldn't connect!");
mysql_select_db("dbweb") or die("Couldn't find database!");

$query = mysql_query("SELECT * FROM users WHERE username='$username'");

$numrows = mysql_num_rows($query);

if ($numrows!=0)
{

	while ($row = mysql_fetch_assoc($query))
	{
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
	}
	
	// check to see if they match
	if ($username==$dbusername&&md5($password)==$dbpassword)
	{
		echo "You're in! <a href='member.php'>Click</a> here to enter the member page.";
		$_SESSION['username']=$dbusername;
	}
	else
		echo "Incorrect password!";

}
else
	die("That user doesn't exist!");


}
else
	die("Please enter username and password!");



?>

			</div>
					
			<div class="clear"></div>
			
		</div>
		
		<div id="sidebar">
			
			<div class="widget">
				<h2>What?</h2>
				<p>This website is created for our course Database-driven Web Technology. Basically we created a web application, which is connected to a MySQL Database.</p>
				<p>If you have any questions, feel free to contact us, <a href:"mailto=s1683764@student.rug.nl">Daan</a> or <a href="mailto:c.j.c.van.willigen@student.rug.nl>Corné</a>.</p>
			</div>
			
		</div>
		
		<div class="clear"></div>
			
		<div id="footer">
			<p>Design by Daan en Corné.</a></p>
		</div>
		
	</div>
	
</body>
</html>