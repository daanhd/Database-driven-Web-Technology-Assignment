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
			
			<h2>User Registration</h2>
			
			<div class="hentry">
	<?php			

$submit = strip_tags($_POST['submit']);

// form data
$fullname = strip_tags($_POST['fullname']);
$username = strtolower(strip_tags($_POST['username']));
$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
$date = date("Y-m-d");
$bankaccount = strip_tags($_POST['bankaccount']);
$group = $_POST['group'];

if ($submit)
{
	// connect to database
	$connect = mysql_connect("localhost", "root", "root");
	mysql_select_db("dbweb"); //select database
	
	$namecheck = mysql_query("SELECT username FROM users WHERE username='$username'");
	$count = mysql_num_rows($namecheck);

	if ($count!=0)
	{
		die("Username already taken");
	}

				

//check for existance

	if ($fullname&&$bankaccount&&$username&&$group&&$password&&$repeatpassword)
	{

		if ($password==$repeatpassword)
		{
		// check char length of username and fullname
			if (strlen($username)>25||strlen($fullname)>25)
			{
				echo "Length of username or fullname is too long";
			}
				else
				{
				if (strlen($bankaccount)>12||strlen($bankaccount)<4)
				{
					echo "Bank account number must be between 4-12 characters";
				}
				else
				{
								
					//check password length
					if (strlen($password)>25||strlen($password)<6)
					{
						echo "Password must be between 6-25 characters";
					}
					else
					{
					//register the user!
					
					// encrypt password
					$password = md5($password);
					$repeatpassword = md5($repeatpassword);

					$queryreg = mysql_query("
					
					INSERT INTO users VALUES ('','$fullname', '$bankaccount', '$username', '$group', '$password','$date')
					
					");
					
					die ("You have been registered! <a href=index.php>Return to login page.</a>");
					
					}
				
				}
			}
		}
		else 
		{
			echo "Your passwords do not match!";
		}
	}
	else
		echo "Please fill in <b>all</b> fields!";

}


?>
<p>
<html>

<form action 'register.php' method='POST'>
	<table>
			<tr>
				<td>
				Your full name:
				</td>
				<td>
				<input type='text' name='fullname' value='<?php echo $fullname; ?>'>
				</td>
			</tr>
			<tr>
				<td>
				Bank account number:
				</td>
				<td>
				<input type='text' name='bankaccount' value='<?php echo $bankaccount; ?>'>
				</td>
			</tr>
			<tr>
				<td>
				Choose a username:
				</td>
				<td>
				<input type='text' name='username' value='<?php echo $username; ?>'>
				</td>
			</tr>
			<tr>
				<td>
				Choose your group:
				</td>
				<td>
					<select input type='select' name='group' value='<?php echo $group; ?>'>
  						<option value='1'>Group #1</option>
  						<option value='2'>Group #2</option>
  						<option value='3'>Group #3</option>
  						<option value='4'>Group #4</option>
  						<option value='5'>Group #5</option>
					</select>
				</td>
			<tr>
				<td>
				Choose a password:
				</td>
				<td>
				<input type='password' name='password'>
				</td>
			</tr>
			<tr>
				<td>
				Repeat your password:
				</td>
				<td>
				<input type='password' name='repeatpassword'>
				</td>
			</tr>
		</table>
		<p>
		<input type='submit' name='submit' value='Register'>

	
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