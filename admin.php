<?php
session_start();
?>
<html>
<link rel="stylesheet" href="Css/admin.css">
<title>Account</title>
<style>
	.btn {
		width:70%;
		display: inline-block;
		padding: 8px 16px;
		margin: 4px 2px;
		border: none;
		background-color: #3d4ee7; /* Default background color */
		color: white;
		text-align: center;
		text-decoration: none;
		font-size: 16px;
		cursor: pointer;
		border-radius: 4px;
		transition: background-color 0.3s ease; /* Smooth transition */
	}

	.btn:hover {
		background-color: #758bff; /* Hover background color */
	}
</style>
</head>

<body>
	<section class="left">
		<div class="banner">
			ACCOUNT
		</div>
<center>
<form method="post">

<?php

if (isset($_POST['submit']))
	{
	include 'db.php';

			 		$fullname=$_POST['fullname'] ;
			 		$username=$_POST['username'] ;
					$password= $_POST['password'] ;
					$position= $_POST['position'] ;

		 mysqli_query($db,"INSERT INTO `accounts`(Fullname ,Username, Emailaddress, Password, Position)
		 VALUES ('$fullname','$username','$emailaddress',,'$password','$position')");


	        }
?>
</form>

<table width="90%" border="2" style="border-collapse:collapse;">
	<thead> <tr>
			<th> Fullname </th>
			<th> Username </th>
			<th> Password </th>
			<th> Position </th>
			<th colspan="2">Action</th>
	</tr>
</thead>
	<script>
				function myFunction() {
					var r = confirm("Are you sure?");
					if (r == true) {
						return true;
					} else {
						return false;
					}
					document.getElementById("demo").innerHTML = txt;
				}
			</script>
			<?php
			include("db.php");


			$result=mysqli_query($db,"SELECT * FROM accounts WHERE id=1");
	if($_SESSION['position']=='Barangay Secretary'){
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['ID'];
				echo "<tr align='center'>";
				echo"<td><font color='black'>" .$test['Fullname']."</font></td>";
				echo"<td><font color='black'>" .$test['Username']."</font></td>";
				echo"<td><font color='black'>*********</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";
				echo"<td><a href ='adminedit.php?ID=$id' class='btn btn-info btn-xs' onclick='return myFunction()'>Edit</a></td>";

				echo "</tr>";
			} //while
		} //if

			mysqli_close($db);
			?>
</section>
</table>
</center>
</body>
</html>
