<?php

	if(isset($_POST['submit']))

	{

		$name=$_POST['name'];

		$pho=$_POST['phone'];

		$email=$_POST['email'];

		$pwd=$_POST['pwd'];

		$cpwd=$_POST['conpwd'];

		$conn=mysqli_connect('localhost','root','');

		$dp=mysqli_select_db($conn,'tourist');

		$select="SELECT * FROM register WHERE email='$email' AND phone='$pho';";

		$res=mysqli_query($conn,$select);

		if(mysqli_num_rows($res)>0)

		{

			$error1="User already Exist";

		}

		else

		{

			if($pwd!=$cpwd)

			{

				$error2="Password not matched";

			}

			else

			{

				$insert="INSERT INTO register(name,phone,email,password)values('$name','$pho','$email','$pwd');";

				$res=mysqli_query($conn,$insert);

				if($res)

					header('location:login.php');

			}

		}

	}		

?>

	

<html>

<head>

<title>Sign Up</title>

<link rel="stylesheet" href="login.css">

</head>

<body>

	<div class="box">

		<h1>Sign Up</h1>

	

			

				

		<form action="register.php" method='POST'>

			

			<input type="text" name="name"placeholder="username" required="">

			<input type="text" name="phone"placeholder="Phone Number" required="">

			<input type="email" name="email"placeholder="Email ID" required="">

			<input type="password" name="pwd"placeholder="Password" required="">

			<input type="password" name="conpwd"placeholder="Confirm Password" required="">

			<input type="submit" name="submit" value="Sign Up" style="background-color:red; color:white;" >

			

		</form>

		

		<div class="already">

			Already have account<a href="login.php">Login here</a>

		</div>

	</div>

</body>

</html>

		
