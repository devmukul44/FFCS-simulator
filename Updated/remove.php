
<?php

session_start();

$class_num = $_GET['class_num'];

$conn = mysql_connect("localhost","root","seed") or die("34");
mysql_select_db("web_proj", $conn);

$extracts = mysql_fetch_row(mysql_query("SELECT AVAILABLE_SEATS,Course_code,SLOT FROM ".$_SESSION['reg_no']."_course_list WHERE CLASSNBR=".$class_num,$conn));
$ava_seats = $extracts[0];
if ($ava_seats<=0){
  echo "Not enough seats";

  echo "<a href=\"http://localhost/Latest/register.php\"> Go Back</a>";
}else{
$ava_seats = $ava_seats-1;
$course_code = $extracts[1];
$slot = ($extracts[2]).split('+')[0]; 
echo $slot.$extracts[2];
// Decrement the seat availability
mysql_query("UPDATE ".$_SESSION['reg_no']."_course_list SET AVAILABLE_SEATS=$ava_seats, reg=1 WHERE CLASSNBR=".$class_num,$conn);
mysql_query("UPDATE ".$_SESSION['reg_no']."_course_list SET reg=1 WHERE SLOT=\"".$slot."\";",$conn);
mysql_query("UPDATE ".$_SESSION['reg_no']."_course_list SET reg=1 WHERE SLOT=\"".$extracts[2]."\";",$conn);
mysql_query("UPDATE ".$_SESSION['reg_no']."_course_list SET reg=1 WHERE Course_code=\"".$course_code."\";",$conn);
mysql_query("INSERT INTO ".$_SESSION['reg_no']."_timetable_sample SELECT Course_code, COURSE_TITLE, COURSE_TYPE, SCHOOL, CLASSNBR, SLOT, VENUE, FACULTY_NAME FROM ".$_SESSION['reg_no']."_course_list WHERE CLASSNBR=".$class_num,$conn);
header("location:register.php");
}
?>
