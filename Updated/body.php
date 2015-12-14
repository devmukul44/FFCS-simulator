<?php
session_start();
?>

<html>
<head>
<title>Body
</title>
<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
<?php
echo "<h3>registration number:";
echo $_SESSION['reg_no'];
echo "</h3>";
$chk = $_SESSION['reg_no']."_course_list";
echo $chk;
?>
</body>
</html>