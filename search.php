
<?php


$text = $_GET["change_text"];

$conn = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn);
$result = mysql_query("SELECT * FROM course_list_test WHERE c_name LIKE '%$text%'",$conn);

$fields_num = mysql_num_fields($result); 			// Field row
echo "<h1>Course Registration</h1>";
echo "<table border='1'><tr>";
for($i=0; $i<$fields_num; $i++) 					// Field row display
{
	$field = mysql_fetch_field($result) or die("here");
	echo "<td><b>{$field->name}</b></td>";
}echo "</tr>\n";

while($row = mysql_fetch_row($result)) 				// Data rows display
{
	echo "<tr>";
	foreach($row as $cell)
		echo "<td>$cell</td>";
	echo "</tr>\n";
}
echo "<h1>$text</h1>";
mysql_free_result($result);




?>


