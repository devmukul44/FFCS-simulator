<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "seed";
$dbname = "web_proj";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$f = 0;
    // output data of each row
    while($row = mysqli_fetch_row($result)) 
	{    
		if($row[0] == $_POST["uname"] && $row[1] == $_POST["pass"])
		{
		global $f;
		//echo $row[0];
		$f=1;
		break;
    }
	}
 //var_dump($row[0]);
 //var_dump($_POST["uname"]);

if($f==1)
{
		// Start the session
		session_start();
		$_SESSION["reg_no"] ="$_POST[uname]";
		header("location:main.php");
}

else
{

		header("location:login_no.php");
}

mysqli_close($conn);
?>
