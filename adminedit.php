<?php
session_start();
?>

<html>

<?php
require("db.php");
$id =$_REQUEST['ID'];

$result = mysqli_query($db,"SELECT * FROM accounts WHERE ID  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$Fullname = $test['Fullname'] ;
				$Username = $test['Username'] ;
				$Emailaddress = $test['Emailaddress'] ;
				$Password = $test['Password'] ;					
				$Position = $test['Position'] ;
if(isset($_POST['save']))
{	
	$fullname_save = $_POST['fullname'];
	$username_save = $_POST['username'];
	$emailaddress_save = $_POST['emailaddress'];
	$password_save = $_POST['password'];
	$position_save = $_POST['position'];

	mysqli_query($db,"UPDATE accounts SET Fullname = '$fullname_save', Username ='$username_save', Emailaddress='$emailaddress_save', Password ='$password_save',
		 Position ='$position_save'  WHERE ID = '$id'")
				or die(mysqli_error($db)); 
	echo "<script>alert('Account Saved.');</script>";
				echo '<script>window.location = "admin.php";</script>';		
}
mysqli_close($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="Css/admin.css">
</head>

<body>
<section class="left">
<div class="banner">
				EDIT ACCOUNT
			</div>
			<center>
<form method="post">
<?php
if($_SESSION['position']=='Barangay Secretary'){
echo 
'
<table>

	<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<option>Barangay Secretary</option>
						
						
						</optgroup>
						</select>
						</td>


	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>';
}




?>
</body>
</html>
 