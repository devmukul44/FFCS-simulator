<?php
$a=$_GET["na"];
$b=$_GET["reg"];
$c=$_GET["co"];
$d=$_GET["email"];$conn = mysql_connect("localhost","root","") or die("34");
$e=$_GET["pna"];
$f=$_GET["pco"];
mysql_select_db("web_proj", $conn);
//$result = mysql_query("UPDATE stu SET name='$x' det='$y'",$conn);
if (mysql_query("UPDATE stu SET Student_Name='$a',Registeration_Number='$b',Student_Contact_Number='$c',Email='$d',Parent_Name='$e',Parent_Contact_Number='$f'",$conn)) {
    header("location:display_detail.php");
} else {
    echo "Error updating record: ";
}
?>
