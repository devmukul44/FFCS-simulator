<?php
session_start();
?>

<html>
<body class="l">
thanks for using ffcs stimulator...
<br>
<?php
session_unset();        // remove all session variables
session_destroy();      // destroy the session 
?>
<p id="put"></p>
<script>
</script>

<?php
header("location:login.php");
?>

</body>
</html>