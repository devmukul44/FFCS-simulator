<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_proj";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$course_list = $_SESSION['reg_no']."_course_list";
$timetable_sample = $_SESSION['reg_no']."_timetable_sample";

$sql = "CREATE TABLE ".$course_list." (Course_code VARCHAR(30), COURSE_TITLE VARCHAR(30), COURSE_TYPE VARCHAR(10), L INT, T INT, P INT, C INT, SCHOOL VARCHAR(20), CLASSNBR INT, SLOT VARCHAR(30), VENUE VARCHAR(20), FACULTY_NAME VARCHAR (50), COURSE_MODE VARCHAR(10), TOTAL_SEATS INT, AVAILABLE_SEATS INT, modified_date TIMESTAMP,reg INT);";

$sql .= "INSERT INTO ".$course_list." SELECT * FROM course_list;";

$sql .="CREATE TABLE ".$timetable_sample." (Course_code VARCHAR(30), COURSE_TITLE VARCHAR(30), COURSE_TYPE VARCHAR(10),SCHOOL VARCHAR(20), CLASSNBR INT, SLOT VARCHAR(30), VENUE VARCHAR(20), FACULTY_NAME VARCHAR (50));";

if (mysqli_multi_query($conn, $sql)) 
		{
		header("location:main.php");
		}
else {
	echo "error creating database!!!";
	
		}

mysqli_close($conn);
?>