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


<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax(Mode) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'proces_payment_insertion.php';
		  var pmeters = "tCustomerID=" + encodeURI( document.getElementById("txtCustomerID").value) +
						"&tName=" + encodeURI( document.getElementById("txtName").value ) +
						"&tEmail=" + encodeURI( document.getElementById("txtEmail").value ) +
						"&tCountryCode=" + encodeURI( document.getElementById("txtCountryCode").value ) +
						"&tBudget=" + encodeURI( document.getElementById("txtBudget").value ) +
						"&tUsed=" + encodeURI( document.getElementById("txtUsed").value ) +
						"&tMode=" + Mode;

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpan").innerHTML = "Now is Loading...";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {
				   document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				   document.getElementById("txtCustomerID").value = '';
				   document.getElementById("txtName").value = '<?php  if ($_SESSION['username'])
									echo "".$_SESSION['username']."";
								else
									die("You must be logged in!");

								?>';
				   document.getElementById("txtEmail").value = '';
				   document.getElementById("txtCountryCode").value = '';
				   document.getElementById("txtBudget").value = '';
				   document.getElementById("txtUsed").value = '';
				  }
				
			}

	   }
	</script>
<body Onload="JavaScript:doCallAjax('LIST');">
<?php

$con = mysql_connect("localhost:8889","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("webdb2", $con);


$result = mysql_query("SELECT * FROM groups");

echo "<table border='1'>
<tr>
<th>Group ID</th>
<th>Group name</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID_group'] . "</td>";
  echo "<td>" . $row['group_name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?>
<h1>Add Payment to Group</h1>
<form name="frmMain">
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">ID_payment</div></th>
    <th width="98"> <div align="center">ID_user</div></th>
    <th width="198"> <div align="center">comment</div></th>
    <th width="97"> <div align="center">value</div></th>
    <th width="59"> <div align="center">Group</div></th>
    <th width="71"> <div align="center">paid_date</div></th>
  </tr>
  <tr>
	<td><div align="center"><input type="hidden" name="txtCustomerID" id="txtCustomerID" size="5"></div></td>
	<td><input type="text" name="txtName" id="txtName" size="20" readonly="readonly"></td>
	<td><input type="text" name="txtEmail" id="txtEmail" size="20"></td>
	<td><div align="center"><input type="text" name="txtCountryCode" id="txtCountryCode" size="2"></div></td>
	<td align="right">
	
	
	
	<?php

	mysql_connect('localhost:8889', 'root', 'root');
	mysql_select_db('webdb2');

	

	$sql = "SELECT * FROM groups ORDER BY ID_group DESC";

		$result = mysql_query($sql);
		echo "<form><select name='txtBudget' id='txtBudget' o>";
		while ($row = mysql_fetch_array($result)) {
		    echo "<option value='" . $row['ID_group'] . "'>" . $row['group_name'] . "</option>";
		}
		echo "</select></form>";

		?>
	
	</td>
	<td align="right"><input type="text" name="txtUsed" id="txtUsed" size="5"></td>
  </tr>
</table>
<input type="button" name="btnAdd" id="btnAdd" value="Add" OnClick="JavaScript:doCallAjax('ADD');">
<br><br>
<span id="mySpan"></span>
</form>







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