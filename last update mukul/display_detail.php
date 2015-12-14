<?php
error_reporting(E_ERROR);
?>
<DOCTYPE html>
<html>
<head>
<title>
FFCS Simulator
</title>

<style>
body
{
background-color:rgb(255,255,242);
}
table,th,td
{
width:50%;
padding:5px;
border-collapse:collapse;
}
th
{
background-color:black;
color:white;
border:1px solid white;
}
table,td
{
background-color:white;
border:1px solid black;
}

</style>
</head>
<body>

<form action="detail.php" method="GET" style="font-size:120%">
<?php
session_start();

$conn = mysql_connect("localhost","root","") or die("34");
mysql_select_db("web_proj", $conn) or die("databse error");
$result = mysql_query("SELECT * FROM stu WHERE Registeration_Number=\"".$_SESSION['reg_no']."\"",$conn) or die("not here");
$fields_num = mysql_num_fields($result) or die("field error"); 	
echo "<h3>Welcome:";
echo $_SESSION['reg_no'];
echo "</h3>";		// Field row
echo "<table>";
$row = mysql_fetch_row($result); 				// Data rows display
$fields = array("Name : ","Username : ","Mobile Num : ","Email Address : ","Parents Name : ","Parents Phone : ");
$i = 0;
foreach($row as $cell)
{
  echo "<tr>";
  echo "<td>".$fields[$i]."</td>";
  echo "<td>$cell</td>";
  echo "</tr>";
  $i+=1;
}
echo "</table>";

mysql_free_result($result);

?>
<br>
<input type="submit" value="Edit Details" style="font-size:20px">

</form>
</body>
</html>

