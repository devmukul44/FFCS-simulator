<DOCTYPE html>
<html>
<head>
<title>
FFCS SImulator
</title>
<link rel="stylesheet" href="custom.css">
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="detail.php" method="GET" style="font-size:120%">
<?php




$conn = mysql_connect("localhost","root","") or die("34");
mysql_select_db("web_proj", $conn);
$result = mysql_query("SELECT * FROM stu",$conn);

$fields_num = mysql_num_fields($result); 			// Field row



while($row = mysql_fetch_row($result)) 				// Data rows display
{
	
	foreach($row as $cell)
	{
	$field = mysql_fetch_field($result) or die("here");
	echo "<pre>{$field->name}: $cell</pre>";
		echo"<br>";
	}
}

mysql_free_result($result);
?>

<input type="submit" value="edit">

</form>
</body>
</html>

