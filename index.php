<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>

<form action="index.php" method="POST">
	<div class="form">
    <h1>log in </h1>
	<input type="text" name="email" id="email" placeholder="Enter your email"><br><br>
	<input type="password" name="password" id="password" placeholder="Enter your password"><br><br>
	<input type="submit" name="submit" value="Login" onclick="return checklogin()">
</div>
<?php
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$con=mysqli_connect("localhost:3306","root","","blog");
	$sql="select * from userdata where username='$username' and password='$password'";
		$res=mysqli_query($con,$sql);
		$r=mysqli_num_rows($res);
		if($r>0){

			session_start();
			$_SESSION['username']=$username;

			echo"<script>
				alert('Login Succsfull');
				window.location.href='home.php';
			</script>";
		}

	}
?>
</form>
</body>
<script type="text/javascript">
	function checklogin() 
	{
		if (document.getElementById('email').value=="") 
		{
			alert("please enter your email");
			document.getElementById('email').focus();
			return false
		}
		if (document.getElementById('password').value=="") 
		{
			alert("please enter your password");
			document.getElementById('password').focus();
			return false
		}
	}



</script>
</html>