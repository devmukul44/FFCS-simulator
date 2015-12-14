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




$conn = mysql_connect("localhost","root","") or die("34");
mysql_select_db("web_proj", $conn) or die("databse error");
$result = mysql_query("SELECT * FROM stu",$conn);

$fields_num = mysql_num_fields($result) or die("field error"); 			// Field row


echo "<table>";
while($row = mysql_fetch_row($result)) 				// Data rows display
{
	
	foreach($row as $cell)
	{echo "<tr>";
	$field = mysql_fetch_field($result) or die("here");
	echo "<th>{$field->name}:</th><td>$cell</td>";
		echo"</tr>";
	}
}
echo "</table>";

mysql_free_result($result);
?>
<br>
<input type="submit" value="Edit Details" style="font-size:20px">

</form>
</body>
</html>

