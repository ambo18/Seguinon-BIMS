<?php
session_start();

if (isset($_SESSION['id'])) {
 		header('location:home.php');
 	}
?>
<html style="background: url('Picture/logo.png') center/contain no-repeat;">
<title>Barangay Information Management System</title>
<link rel="stylesheet" type="text/css" href="Css/homepage.css">
<link rel="shortcut icon" href="Picture/logo.png">
<div class="nav">
	<a href="about.php">about</a>
	<a href="index.php">home</a>
</div>
<body>
	<div class="right" >
		<section class="banner">Sign In</section>
		<form method="POST">
			<input type="text" name="username" required autofocus placeholder="Enter Username">
			<input type="password" name="password" required autofocus placeholder="Enter Password">
			
			<input type="Submit" name="submit" value="Enter">
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
		</form>
	</div>
	<?php

include('db.php');

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$qry = mysqli_query($db, "SELECT * FROM Accounts WHERE Username ='$username'");
	$count = mysqli_num_rows($qry);

	if ($count > 0) {
		$accnt = mysqli_fetch_array($qry);
		$pass = $accnt['Password'];
		
		// Check if the entered password matches the stored password
		if ($pass == $password) {
			$_SESSION['id'] = $accnt['ID'];
			$position = $accnt['Position'];
			$committee = $accnt['Committee'];
			$fullname = $accnt['Fullname'];
			$_SESSION['LOGIN_STATUS'] = true;
			$_SESSION['position'] = $position;
			$_SESSION['USER'] = $username;
			$_SESSION['committee'] = $committee;
			$_SESSION['password'] = $password;
			$_SESSION['Emailaddress'] = $accnt['Emailaddress']; // Use 'accnt' instead of 'count'
			$_SESSION['device_Id'] = $accnt['device_Id']; // Use 'accnt' instead of 'count'
			$_SESSION['positionID'] = $accnt['position_id'];
			$_SESSION['fullname'] = $fullname;
			$_SESSION['position_id'] = $accnt['position_id'];
			echo "<script>alert('Welcome.');</script>";
			echo '<script>window.location = "home.php";</script>';
		} else {
			echo "<script>alert('Incorrect Password.');</script>";
		}
	} else {
		echo "<script>alert('Invalid username.');</script>";
	}
}
?>

</body>
</html>


