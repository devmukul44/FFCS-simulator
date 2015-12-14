
<?php

// Connect to DB
$conn = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn);


// Total number of courses in database
$num_course = mysql_fetch_row(mysql_query("SELECT MAX(c_num) FROM course_list_test",$conn))[0];
$date_t=date_create("$test");
$date_n=date_create();
// Number of seats to be removed
$del_seats = (date_timestamp_get($date_n) - date_timestamp_get($date_t))/500;


for ($i=0; $i<2; $i++)//$del_seats; $i++)
{
	$del_c_num = rand(1,$num_course);			// Select Random classes to delete 
	$ava_seats = mysql_fetch_row(mysql_query("SELECT * FROM course_list_test WHERE c_num=$del_c_num",$conn))[2];
	$ava_seats -=1;								// Decrement the seat availability
	mysql_query("UPDATE course_list_test SET seat_avail = $ava_seats WHERE c_num=$del_c_num",$conn);
}

// Final SQL Database Results
$result = mysql_query("SELECT * FROM course_list_test",$conn);
$fields_num = mysql_num_fields($result); 			// Field row
echo "<table border='1'><tr>";
for($i=0; $i<$fields_num; $i++) 					// Field row display
{
	$field = mysql_fetch_field($result);
	echo "<td><b>{$field->name}</b></td>";
}echo "</tr>";

while($row = mysql_fetch_row($result)) 				// Data rows display
{
	echo "<tr>";
	foreach($row as $cell)
		echo "<td>$cell</td>";
	echo "</tr>\n";
}
mysql_free_result($result);

?>



