<?php
session_start();
?>

<html>

<title>Account Edit</title>
<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">

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
				$device_Id = $test['device_Id'] ;
				$Password = $test['Password'] ;					
				$Position = $test['Position'] ;
				$Committee = $test['Committee']	;
if(isset($_POST['save']))
{	
	$fullname_save = $_POST['fullname'];
	$username_save = $_POST['username'];
	$emailaddress_save = $_POST['emailaddress'];
	$device_Id_save = $_POST['device_Id'];
	$password_save = $_POST['password'];
	$position_save = $_POST['position'];
	$committee_save = $_POST['committee'];

	mysqli_query($db,"UPDATE accounts SET Fullname ='$fullname_save', Username = '$username_save', Emailaddress='$emailaddress_save',device_Id='$device_Id_save', Password ='$password_save',
		 Position ='$position_save', Committee ='$committee_save'  WHERE ID = '$id'")
				or die(mysqli_error($db)); 
	echo "<script>alert('Account Saved.');</script>";
				echo '<script>window.location = "account.php";</script>';					
}
mysqli_close($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<div style="padding: 250px;">
<div class="panel panel-success" >
    <div class="panel-heading">EDIT ACCOUNT</div>
    <div class="panel-body">
    	
    	<form method="post" class="form-horizontal">

<table class="table table-bordered">
	<div class="form-group">
		<label class="col-sm-2 control-label">Fullname</label>
		<div class="col-sm-10">
		  <input class="form-control" id="focusedInput" type="text" placeholder="Enter Fullname" name="fullname" value="<?php echo $Fullname?>" required >
		</div>
	</div>
	 <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Username" name="username" required value="<?php echo $Username?>">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Email Address</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Email Address" name="emailaddress" required value="<?php echo $Emailaddress?>" >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Device ID</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Device ID" name="device_Id" required value="<?php echo $device_Id?>">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="password" placeholder="Enter Password" name="password" required value="<?php echo $Password?>">
		    </div>
		  </div>
	<!-- 	<div class="form-group">
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
 -->
		<div class="form-group">
			    <label class="col-sm-2 control-label">Position</label>
			    <div class="col-sm-10">

		<select name="position" class="form-control" name="position">
			<?php
			if($_SESSION['position']=='Barangay Secretary'){
			?>
						<optgroup>
						<option>Barangay Captain</option>
						<option>Barangay Councilor</option>
						<option>Barangay Health Worker</option>
						<option>Barangay Treasurer</option>
						<option>SK Chairman</option>
						</optgroup>
						<?php 
						}
			if($_SESSION['position']=='Barangay Captain')
			{
				?>
				<optgroup>
				<option>Barangay Captain</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Peace and Order")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Agriculture")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health,Education & Sport")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Budget & Appropriation")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php

			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Infrastructure")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Clean and Green")
			{
				?>
				<optgroup>					
				<option>Barangay Councilor</option>
				</optgroup>
				<optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Health Worker')
			{
				?>
				<optgroup>
				<option>Barangay Health Worker</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Treasurer')
			{
				?>
				<optgroup>
				<option>Barangay Treasurer</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='SK Chairman')
			{
				?>
				<optgroup>
				<option>SK Chairman</option>
				</optgroup>
				<?php
			}
						?>
			</select>
			    </div>
			  </div>
	<div class="form-group">
			    <label class="col-sm-2 control-label">Position</label>
			    <div class="col-sm-10">
			    	<select name="committee" class="form-control" value='<?php echo $Committee ?>'>
			<?php
			if($_SESSION['position']=='Barangay Secretary'){
			?>
					
						<optgroup>
						<option>None</option>
						<option>Peace and Order</option>
						<option>Health,Education & Sport</option>
						<option>Agriculture</option>
						<option>Infrastructure</option>
						<option>Budget and Appropriation</option>
						<option>Ways and Means</option>
						<option>Clean and Green</option>
						</optgroup>
			<?php 
			}
			if($_SESSION['position']=='Barangay Captain')
			{
				?>
				<optgroup>
				<option>None</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Peace and Order")
			{
				?>
				<optgroup>
				<option>Peace and Order</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Agriculture")
			{
				?>
				<optgroup>
				<option>Agriculture</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health,Education & Sport")
			{
				?>
				<optgroup>
				<option>Health,Education & Sport</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Budget & Appropriation")
			{
				?>
				<optgroup>
				<option>Budget & Appropriation</option>
				</optgroup>
				<?php

			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Infrastructure")
			{
				?>
				<optgroup>
				<option>Infrastructure</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Clean and Green")
			{
				?>
				<optgroup>
				<option>Clean and Green</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Health Worker')
			{
				?>
				<optgroup>
				<option>None</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='Barangay Treasurer')
			{
				?>
				<optgroup>
				<option>None</option>
				</optgroup>
				<?php
			}
			if($_SESSION['position']=='SK Chairman')
			{
				?>
				<optgroup>
				<option>None</option>
				</optgroup>
				<?php
			}
			?>
			</select>
			 </div>
			</div>

		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<div class="btn-group">
		      <input type="submit" class="btn btn-success btn-lg" name="save" value="save" ></button>
			<button class="btn btn-danger btn-lg" onclick="window.history.go(-1); return false;" >Cancel</button>

		      </div>
		    </div>
  		</div>
	</table>

</form>
    </div>
 </div>
</div>

</section>

 <script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>  
     <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
 