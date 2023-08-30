<?php
session_start();
require_once('db.php');
$sesID = $_SESSION['id'];
$z = mysqli_query($db,"SELECT * FROM `accounts` WHERE ID = '$sesID'");
$data = mysqli_fetch_array($z);
?><html>
<head>
<link rel="shortcut icon" href="Icon/indang logo.png">
<style type="text/css">
body {

/* background: linear-gradient(to bottom, #666666 0%,#111111 90%,#111111 70%,#111111 60%); */
background-color: white;
margin-right:0;
margin-left: 0;	
margin-top: 0;
font-family: calibri;
color: #333333;
	
	
}
img {
	padding-right: 10px;
	padding-left: 15px;
}
h1 {
	color: white;
	font-family: calibri;	
}
a {
	display: block;
	text-decoration: none;
	padding: 10px 5px;
	font-size:18;
	font-face: calibri;
	color: #007BFF;
	
}
a:hover{
	background: #0058E0;
	color:white;
	left:0;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}
.banner {
	width: auto;
  	height: auto;
	padding-top: 12px;
	padding-bottom: 15px;
	padding-left: 5px;
	font-size: 25px;
	text-align: left;
	color: #333333;
	margin-top: 0%;
	font-weight: bold;
	background: #007BFF;
	font-family: calibri;
	text-transform: uppercase;
}
.holder {
	background: #17A2B8;
	width:100%;
	margin-top: 0%;
	margin-left: 0%;
	padding-top: 10px;
	padding-bottom:10px;
	text-align:left;
}
/* width */
::-webkit-scrollbar {
    width: 15px;
}

/* Track */
::-webkit-scrollbar-track {
    background: white; 


}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #8c8c8c; 

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #141414; 
}
.avatar {
	border-radius: 30px;
}
</style>
</head>


<div class="banner">

	<img src="Picture/logo.png" style="float:left; border-radius: 50%; filter: invert(0%)!important;" width="50" height="50">
	<font style="float:center; word-wrap: break-word;">Welcome<b> </br> </font>	</br>
	<p style="word-wrap: break-word; text-align: center;"><?php echo $data[1]; ?></p>
</div>

<?php
if($_SESSION['position']=='Barangay Secretary'){
echo 

		
'<b><div class="holder"><b>GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>


<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>



<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>
<a href="Report/viewreport.php" target="FraDisplay"><img src="Icon/clearances.png" style="float:left" width="29">&nbsp;Reports</a>

<b><div class="holder"><b></b></div>
<a href = "admin.php" target="FraDisplay"><image src="Icon/settings.png" style = "float:center; filter: invert(100%)!important;" width="20" >Account Setting</a>
';	
}
?>
<div class="holder"></div>
<a href = "accountLogout.php" target="_Parent"><img src="Icon/Logout.png" height= "20" style="filter: invert(100%)!important;">Logout</a>	

</body>

</html>