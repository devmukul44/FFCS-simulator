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
$sql = "INSERT INTO user VALUES ('$_POST[uname]', '$_POST[pass]')";

//echo '<div id="signup">';
//var_dump($_POST["uname"]);

if (mysqli_query($conn, $sql)) 
		{

		// Start the session
		session_start();

		$_SESSION["reg_no"] ="$_POST[uname]";
		
		header("location:table.php");
		}
else {
	header("location:signup_no.php");
	
	}

mysqli_close($conn);
?>
