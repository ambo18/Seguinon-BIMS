<?php
session_start();
?>
<html>
<link rel="stylesheet" href="Css/admin.css">
<title>Account</title>

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
					$emailaddress=$_POST['emailaddress'];
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
			<th> Email Address </th>
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
				echo"<td><font color='black'>" .$test['Emailaddress']."</font></td>";
				echo"<td><font color='black'>". $test['Password']. "</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";	
				echo"<td> <a href ='adminedit.php?ID=$id'onclick='return myFunction()'>Edit</a>";
									
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
