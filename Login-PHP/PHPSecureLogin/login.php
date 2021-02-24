<?php
require_once('veganConfig.php');
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
if(!empty($_POST))
{
	$sql = mysqli_query($al, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($al, $_POST['email'])."' AND password = '".mysqli_real_escape_string($al,sha1($_POST['pass']))."'");
	if(mysqli_num_rows($sql) == 1)
	{
		$_SESSION['email'] = $_POST['email'];
		header("location:home.php");
	}
	else
	{
		$msg = "Incorrect Credentials";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Login</title>
</head>

<body>
<div align="center">
<br>
<br>
<h1>User Login</h1>

<h3><?php if(isset($msg)) { echo $msg; }?></h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="email" name="email" size="25" required title="Enter Email" placeholder="Enter Email" />
<br>
<br>
<input type="password" name="pass" size="25" required title="Enter Password" placeholder="Enter Password"/>
<br>
<br>
<input type="submit" value="Login" />
</form>
<br>
<br>
<h2>New User <a href="register.php">Register Here</a></h2>
</body>
</html>