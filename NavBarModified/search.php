
<?php
session_start();


$text = $_GET["change_text"];

$conn = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn);

$result = mysql_query("SELECT * FROM ".$_SESSION['reg_no']."_course_list WHERE (COURSE_TITLE LIKE '%$text%' OR Course_code LIKE '%$text%' OR SLOT LIKE '%$text%')",$conn);

$fields_num = mysql_num_fields($result); 			// Field row
echo "<link rel=\"stylesheet\" href=\"tt.css\">";
echo "<table id='t2' border='1' style='font-size:120%; position:static;top:500px;' ><tr>";
for($i=0; $i<($fields_num-2); $i++) 					// Field row display
{
	$field = mysql_fetch_field($result) or die("here");
	echo "<td><b>{$field->name}</b></td>";
}echo "</tr>\n";

while($row = mysql_fetch_row($result)) 				// Data rows display
{
	echo "<tr>";
	for ($i=0; $i<15; $i++)
		echo "<td>$row[$i]</td>";
	if ($row[16]==0){
		echo "<td><a href=\"http://localhost/Latest/remove.php?class_num=$row[8]\"> Register </a></td>";
	}else{
		echo "<td><p> Registered </p></td>";
	}
	
	echo "</tr>\n";
}echo "</table>";
mysql_free_result($result);

?>

