<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title>Finance</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<style>
		body{
			margin: 0;
			font-family: "Calibri";
			font-size: 18px;
		}

		nav {
			background-color: #2D2D2D;
			color: white;
			position: fixed;
			margin-left:1%;
			margin-top:1%;
			margin-right:1%;
			border: none;
			width:98%;
			box-sizing: border-box;
			transition: .3s;
			z-index: 1;
			font-family: calibri;
			margin-bottom: 20%;
		}

		ul {

			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #2d2d2d;
		}

		li {
			float: left;
		}

		li a, .dropbtn {
			background-color: #2d2d2d;
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			
		}

		a {
			margin: 0px 3px;
			text-decoration: none;
			text-transform: uppercase;
			transition: .3s;
		}

		li a:hover, .dropdown:hover .dropbtn {
			background-color: #17A2B8;
		}


		li.dropdown {
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #333;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			padding: 15px 13px;
			text-decoration: none;
			display: block;
			text-align: left;
			color: white;
		}

		.dropdown-content a:hover {background-color: #045764;}

		.dropdown:hover .dropdown-content {
			display: block;
		}
		div#root{
			position: fixed;
			width: 100%;
			height: 100%;
		}
		div#root > iframe{
			display: block;
			width: 100%;
			height: 95.5%;
			border: none;
		}
	</style>
	<ul>
		<nav>
			<?php
			if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Treasurer' OR ($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Finance"))
			{echo'
			<li><a class="active" href="printButton.php" target = "Fradisplay">Home</a></li>
					<li class="dropdown">
					<a herf="" class="dropbtn">Particular</a>
						<div class="dropdown-content">
					<a href="IncomeFundOperation.php" target = "Fradisplay">Income</a>
					<a href="ServiceFundOperation.php" target = "Fradisplay">Personal Services</a>
					<a href="MOOEFundOperation.php" target = "Fradisplay">Maintenance and Other Operating Expenses</a>
					<a href="NOEFundOperation.php" target = "Fradisplay">Non-Office Expenditures</a>
					</li>
						</div>

						<li class="dropdown">
					<a herf="" class="dropbtn">Fund Operation</a>
						<div class="dropdown-content">
					<a href="IncomeFundOperationSet.php" target = "Fradisplay">Income</a>
					<a href="ServiceFundOperationSet.php" target = "Fradisplay">Personal Services</a>
					<a href="MOOEFundOperationSet.php" target = "Fradisplay">Maintenance and Other Operating Expenses</a>
					<a href="NOEFundOperationSet.php" target = "Fradisplay">Non-Office Expenditures</a>
					</li>
						</div>';}

			if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Treasurer' OR $_SESSION['position']=='Barangay Captain' OR $_SESSION['position']=='Barangay Councilor')
			{echo'

				<li class="dropdown">
					<a herf="" class="dropbtn">Clearances and Permits</a>
						<div class="dropdown-content">
					<a href="ClearanceType.php" target = "Fradisplay">Set Clearances</a>
					<a href="ClearanceSetPrice.php" target = "Fradisplay">Set Amount</a>
					<a href="ViewClearancePurposeAmount.php" target = "Fradisplay">Price List</a>
					</li>
						</div>';}

				if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Treasurer' OR ($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Finance"))
			{echo'

					<li class="dropdown">
					<a herf="" class="dropbtn">Collection and Disbursement</a>
						<div class="dropdown-content">
					<a href="Collection.php" target = "Fradisplay">Collection</a>
					<a href="Disbursement.php" target = "Fradisplay">Disbursement</a>
					</li>
						</div>';}?>
		</nav>				
</ul>
	<div id="root">
		<iframe class="frame" src="printButton.php" name="Fradisplay" height=80% width=100%></iframe>
	</div>
	
	</body>
</html>







