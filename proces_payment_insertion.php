<?php session_start(); ?>
<?php






$naam = $_SESSION['username'] ;
echo "Logged in as: $naam";


$strMode = $_POST["tMode"];

$objConnect = mysql_connect("localhost:8889","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("webdb2");

if($strMode == "ADD")
{
	$strSQL = "INSERT INTO payments ";
	$strSQL .="(ID_payment,username,comment,value,ID_group,paid_date) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["tCustomerID"]."','".$_POST["tName"]."','".$_POST["tEmail"]."' ";
	$strSQL .=",'".$_POST["tCountryCode"]."','".$_POST["tBudget"]."','".$_POST["tUsed"]."') ";
	$objQuery = mysql_query($strSQL);
}

//$strSQL = "SELECT * FROM payment WHERE value LIKE '%".$strSearch."%' ORDER BY ID_user DESC ";

$strSQL = "SELECT * FROM payments WHERE username = '$naam' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">ID_payment</div></th>
    <th width="98"> <div align="center">username</div></th>
    <th width="198"> <div align="center">comment</div></th>
    <th width="97"> <div align="center">value</div></th>
    <th width="59"> <div align="center">group</div></th>
    <th width="71"> <div align="center">paid_date</div></th>
  </tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?=$objResult["ID_payment"];?></div></td>
    <td><?=$objResult["username"];?></td>
    <td><?=$objResult["comment"];?></td>
    <td><div align="center"><?=$objResult["value"];?></div></td>
    <td align="right"><?=$objResult["ID_group"];?></td>
    <td align="right"><?=$objResult["paid_date"];?></td>
  </tr>
<?
}
?>
</table>
<?
mysql_close($objConnect);
?>