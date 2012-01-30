<?php session_start(); ?>
<?php // test corne was hier ?>
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



if ($_SESSION['username'])
	echo "Welcome, ".$_SESSION['username']."!<br><a href='logout.php'>Logout</a>";
else
	die("You must be logged in!");

?>






<script type="text/javascript">
function showGroup(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getGroup.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<br />
<a href="http://localhost:8888/webtech/Database-driven-Web-Technology-Assignment/insert_payment.php">insert payment</a>
<br />
<strong>Select group:</strong>
<?php

mysql_connect('localhost:8889', 'root', 'root');
mysql_select_db('webdb2');

//$sql = "SELECT ID_group.Groups, paid.Payments FROM groups, payments WHERE ID_group.Groups = paid.Groups ";
//$sql = "SELECT groups.ID_group, groups.group_name, payments.ID_group FROM groups RIGHT JOIN payments ON groups.ID_group=payments.ID_group";

$sql = "SELECT * FROM groups ORDER BY ID_group DESC";

	$result = mysql_query($sql);
//selecteer groep, zie dan elke gebruiker in deze groep
	echo "<form><select name='groups' onchange='showGroup(this.value)'>";
	while ($row = mysql_fetch_array($result)) {
	    echo "<option value='" . $row['ID_group'] . "'>" . $row['group_name'] . "</option>";
	}
	echo "</select></form>";

	?>
<br />
<div id="txtHint"><b>Group info will be listed here.</b></div>











			</div>
					
			<div class="clear"></div>
			
		</div>
		
		<div id="sidebar">
			
			<div class="widget">
				<h2>What?</h2>
				<p>This website is created for our course Database-driven Web Technology. Basically we created a web application, which is connected to a MySQL Database.</p>
				<p>If you have any questions, feel free to contact us, <a href="mailto:s1683764@student.rug.nl">Daan</a> or <a href="mailto:c.j.c.van.willigen@student.rug.nl">Corné</a>.</p>
			</div>
			
		</div>
		
		<div class="clear"></div>
			
		<div id="footer">
			<p>Design by Daan en Corné.</a></p>
		</div>
		
	</div>
	
</body>
</html>
