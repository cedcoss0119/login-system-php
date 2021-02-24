<?php
require_once('veganConfig.php');
session_start();
if(!isset($_SESSION['email']))
{
	header("location:login.php");
}
$pr = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOME</title>
</head>

<body>
<h1>Welcome <?php echo $pr['name'];?></h1><h3><?php echo $pr['time']." ".$pr['date'];?></h3>
<br>
<a href="logout.php">Logout</a>
</body>
</html>