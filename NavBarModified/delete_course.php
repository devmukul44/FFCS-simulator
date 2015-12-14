<?php
session_start();

$conn2 = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn2);

$table_list = mysql_query("SELECT * FROM ".$_SESSION['reg_no']."_timetable_sample",$conn2);

$fields_num = mysql_num_fields($table_list);     	// Field row
echo "<link rel=\"stylesheet\" href=\"tt.css\">";
echo "<table id='t2' border='1' style='font-size:80%;top:20px;' ><tr>";
for($i=0; $i<($fields_num); $i++) 					      // Field row display
{
	$field = mysql_fetch_field($table_list) or die("here");
	echo "<td><b>{$field->name}</b></td>";
}echo "<td><b>Remove Col</b></td></tr>\n";
while($row = mysql_fetch_row($table_list)) 				// Data rows display
{
	echo "<tr>";
  for ($i=0; $i<8; $i++)
  	echo "<td>".$row[$i]."</td>";
  echo "<td><a href=\"http://localhost/NavBarModified/add.php?class_num=".$row[4]."\">Delete</a></td>";
	echo "</tr>\n";
}echo "</table>";
mysql_free_result($table_list);


?>
