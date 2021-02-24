<?php
require_once('veganConfig.php');
if(!empty($_POST))
{
	
	$sql = mysqli_query($al, "INSERT INTO users(name,email,password,time,date) VALUES('".mysqli_real_escape_string($al,$_POST['name'])."','".mysqli_real_escape_string($al,$_POST['email'])."','".mysqli_real_escape_string($al,sha1($_POST['pass']))."','".date('h:i A')."','".date('d/m/Y')."')");
	if($sql)
	{
		$msg = "Successfully Registered";
	}
	else
	{
		$msg = "Error in Registration";
	}
}
?>
<html>
<head>
<title>Registration</title>
</head>
<body>
<div align="center">
<br>
<br>
<h1>Registration Form</h1>
<br>
<h3><?php if(isset($msg)) { echo $msg.mysqli_error($al); }?></h3>

<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="name" size="25" required title="Please Enter Name" placeholder="Enter Full Name" />
<br>
<br>
<input type="email" name="email" size="25" required title="Enter Email" placeholder="Enter Email" />
<br>
<br>
<input type="password" name="pass" size="25" required title="Enter Password" placeholder="Enter Password"/>
<br>
<br>
<input type="submit" value="Register" />
</form>
</div>
</body>
</html>