
<?php
session_start();

// Connect to DB
$conn = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn);


// Total number of courses in database
$num_course = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM ".$_SESSION['reg_no']. "_course_list" ,$conn))[0];
$max_time = mysql_fetch_row(mysql_query("SELECT MAX(modified_date) FROM ".$_SESSION['reg_no']. "_course_list" ,$conn))[0];
$date_t=date_create("$max_time");
$date_n=date_create();
// Number of seats to be removed
$del_seats = (date_timestamp_get($date_n) - date_timestamp_get($date_t))/500;


for ($i=0; $i<2; $i++)//$del_seats; $i++)
{
  $del_c_num = rand(1,$num_course);			// Select Random classes to delete 
	$ava_seats = mysql_fetch_row(mysql_query("SELECT AVAILABLE_SEATS FROM ".$_SESSION['reg_no']."_course_list WHERE CLASSNBR=2779",$conn))[0];
	if ($ava_seats<=0){
	}else{
	$ava_seats -=1;								// Decrement the seat availability
	mysql_query("UPDATE ".$_SESSION['reg_no']."_course_list SET AVAILABLE_SEATS = $ava_seats WHERE CLASSNBR=2779",$conn);
	}

}

?>

