<?php 
	include("db_connect_xqz20120129.php");
?>
<?php
/**
 *
 * @create a dropdown select
 *
 * @param string $name
 *
 * @param array $options
 *
 * @param string $selected (optional)
 *
 * @return string
 *
 */
function dropdown( $name, array $options, $selected=null )
{
    /*** begin the select ***/
    $dropdown = '<select name="'.$name.'" id="'.$name.'">'."\n";

    $selected = $selected;
    /*** loop over the options ***/
    foreach( $options as $key=>$option )
    {
        /*** assign a selected value ***/
        $select = $selected==$key ? ' selected' : null;

        /*** add each option to the dropdown ***/
        $dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n";
    }

    /*** close the select ***/
    $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
}
?>

<form>

<?php
$name = 'my_dropdown';
$options = "";
$selected = 1;
while ($row=mysql_fetch_array($result)) { 

    $id=$row["ID_group"]; 
    $thing=$row["group_name"]; 
    $options.="<OPTION VALUE=\"$id\">".$thing; 
} 
echo dropdown( $name, $options, $selected );

?>
</form>

<?
$result = mysql_query("SELECT * FROM groups");

while($row = mysql_fetch_array($result))
  {
  echo $row['ID_group'] . " " . $row['group_name'];
  echo "<br />";
  }


?>

