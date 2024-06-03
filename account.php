<?php
session_start();
?>
<!--  <pre>
            <?php 
            // if(){

            // }
            print_r($_SERVER) ;
            ?>
            </pre> -->
<html>
<title>Account</title>
<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">

</head>

<body style="padding: 25px;">
 	
  


<?php
if($_SESSION['position']=='Barangay Secretary'){
?>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add account</button>
<?php
}
?>
<?php 
if ($_SESSION['position']=='Barangay Secretary')
{
?>

<h2>LIST OF ACCOUNTS</h2>
<?php
}
 if ($_SESSION['position']!='Barangay Secretary')
{

?>

<h2>ACCOUNTS</h2>
<?php
}?>
<center>
<?php
if (isset($_POST['submit']))
	{	   
	include 'db.php';
	
			 		$fullname=$_POST['fullname'] ;	
			 		$username=$_POST['username'] ;
					$emailaddress=$_POST['emailaddress'];
					$device_Id= $_POST['device_Id'];
					$password= $_POST['password'] ;					
					$position= $_POST['position'] ;
					$committee= $_POST['committee'];
												
		 mysqli_query($db,"INSERT INTO `accounts`(Fullname, Username, Emailaddress, device_Id, Password, Position, Committee) 
		 VALUES ('$fullname','$username','$emailaddress','$device_Id','$password','$position', '$committee')"); 
				
				
	        }
?>
</form>
<br>
<br>
<table id="x" class="table table-bordered" >

	<thead> <tr>
			<th> Fullname </th>
			<th> Username </th> 
			<th> Email Address </th>
			<th> Device ID </th>
			<th> Password </th>
			<th> Position </th>
			<th> Committee</th>
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
			
				
			$result=mysqli_query($db,"SELECT * FROM accounts WHERE id!=1");
	if($_SESSION['position']=='Barangay Secretary'){		
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['ID'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['Fullname']."</font></td>";
				echo"<td><font color='black'>" .$test['Username']."</font></td>";
				echo"<td><font color='black'>" .$test['Emailaddress']."</font></td>";
				echo"<td><font color='black'>" .$test['device_Id']."</font></td>";
				echo"<td><font color='black'>". $test['Password']. "</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";
				echo"<td><font color='black'>". $test['Committee']. "</font></td>";	
				echo"<td> 
				<div class='btn-group'>
				<a href ='accounteditadmin.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'>Edit</a>
				<a href ='accountdelete.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'><center>Delete</center></a>
				</div></td> ";
			} //while
		} //if
		else {
			$result=mysqli_query($db,"SELECT * FROM accounts WHERE username='".$_SESSION['USER']."'");
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['ID'];	
				echo "<tr align='center'>";
				echo"<td><font color='black'>" .$test['Fullname']."</font></td>";					
				echo"<td><font color='black'>" .$test['Username']."</font></td>";
				echo"<td><font color='black'>" .$test['Emailaddress']."</font></td>";
				echo"<td><font color='black'>" .$test['device_Id']."</font></td>";
				echo"<td><font color='black'>". $test['Password']. "</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";
				echo"<td><font color='black'>". $test['Committee']. "</font></td>";	
				echo"<td> 
				<div class='btn-group'>
				<a href ='accountedit.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'>Edit</a>
				</div></td>";
									
				echo "</tr>";
			} //while
		} //else




			mysqli_close($db);
			?>
</down>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header" style=" padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #b1cbbb;
    color: black;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ">Add Account</h4>
      </div>
      <div class="modal-body">
       
       <form class="form-horizontal" action= "accountinsert.php" method="post">
       	 <div class="form-group">
		    <label class="col-sm-2 control-label">Fullname</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Fullname" name="fullname" required >
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Username" name="username" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Email Address</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Email Address" name="emailaddress" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Device ID</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Device ID" name="emailaddress" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="password" placeholder="Enter Password" name="password" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Position</label>
		    <div class="col-sm-10">
		    	<select name="position" class="form-control">
					<optgroup>
					<option>Barangay Captain</option>
					<option>Barangay Councilor</option>
					<option>Barangay Health Worker</option>
					<option>Barangay Treasurer</option>
					<option>SK Chairman</option>
					</optgroup>
				</select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Committee</label>
		    <div class="col-sm-10">
		    	<select name="committee" class="form-control">
					<optgroup>
					<option>None</option>
					<option>Peace and Order</option>
					<option>Health,Education & Sport</option>
					<option>Agriculture</option>
					<option>Infrastructure</option>
					<option>Budget & Appropriation</option>
					<option>Ways and Means</option>
					<option>Clean and Green</option>
					</optgroup>
				</select>
		    </div>
		  </div>
		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-success btn-lg" name="submit">Add</button>
		    </div>
  		</div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 	<script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>  
    <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
    <script>
	$(document).ready(function() {
    $('#x').DataTable();
	} );
	</script>
</body>
</html>
