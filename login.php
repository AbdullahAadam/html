//login 
<?php

	session_start();

	if(isset($_POST['submit']))

	{

		$name=$_POST['name'];

		$pwd=$_POST['pwd'];

		$conn=mysqli_connect('localhost','root','');

		$dp=mysqli_select_db($conn,'tourist');

		$select="SELECT * FROM register WHERE name='$name' AND password='$pwd';";

		$res=mysqli_query($conn,$select);

		if(mysqli_num_rows($res)>0)

		{

			$_SESSION['name']=$name;

			while($row=mysqli_fetch_array($res))

			{

				if($row['password']!=$pwd)

				{

					$error[]="Invalid Username(or)Password";

				}

				else

					header('location:sample.php');

			}

		}

		else

		{

			$error[]="Invalid Username(or)Password";

		}

	}

?>

<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="login.css">

</head>

<body>

	<div class="box">

		<h1>Login</h1>

		<form action="login.php" method='POST'>

			<input type="text" name="name"placeholder="username" required="">

			<input type="password" name="pwd"placeholder="Password" required="">

			<input type="submit" name="submit" value="Login" style="background-color:red; color:white;" >

		</form>

		

		<div class="already">

			Not a member <a href="register.php">Register Now</a>

		</div>

	</div>

</body>

</html>
