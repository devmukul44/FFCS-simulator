<?php
session_start();
$a=$_GET["na"];
$c=$_GET["co"];
$conn = mysql_connect("localhost","root","seed") or die("34");
$d=$_GET["email"];
$e=$_GET["pna"];
$f=$_GET["pco"];
mysql_select_db("web_proj", $conn) or die("sfg");
$result = mysql_query("UPDATE stu SET Student_Name=\"$a\",Student_Contact_Number=\"$c\",Email=\"$d\",Parent_Name=\"$e\",Parent_Contact_Number=\"$f\" WHERE Registeration_Number=\"".$_SESSION['reg_no']."\";",$conn) or die("Nothere") ;
if ($result){
    header("location:display_detail.php");
} else {
    echo "Error updating record: ";
}
?>
