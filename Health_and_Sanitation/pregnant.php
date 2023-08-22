<?php
session_start();
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>pregnant</title>
	
</head>
<link href="css/design.css" rel="stylesheet" type="text/css"> 
<body>
	<div class="label"> Health and Sanitation
						<div class="nav">
<?php
if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Health Worker' OR ($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health and Sanitation"))
    echo'
							<a href="dashboard.php">Insert Record</a>';?>
							<a href="distribute.php">Drug Distribution</a>
							<a href="vaccine.php">Vaccination</a>
							<a href="birth.php">Newborn</a>
							<a href="pregnant.php">Pregnant</a>
							<a href="death.php">Death</a>
						</div>		

</div><br>
        <center>
        	<?php

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_detail INNER JOIN resident_pregnant ON resident_detail.res_ID= resident_pregnant.res_ID WHERE CONCAT(`res_fName`,`res_mName`,`res_lName`,`preg_Date`,`preg_Labor`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query,$db);
    
} else {
    $query         = "SELECT * From resident_detail INNER JOIN resident_pregnant ON resident_detail.res_ID= resident_pregnant.res_ID ";
    $search_result = filterTable($query,$db);
}

// function to connect and execute the query
function filterTable($query,$db)
{
    
    $filter_Result = mysqli_query($db, $query);
    return $filter_Result;
}

?>
<h2>Pregnant Records</h2>

<form action="pregnant.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="80%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Resident's Name</strong></th><th><strong> Date of Conception</strong></th><th><strong> Date of Labor</strong></th><th><strong> Date Recorded</strong></th></tr>
</thead>
<tbody>
		<?php 

$count=1;
while($row = mysqli_fetch_assoc($search_result)) { ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?><?php echo " " ?><?php echo $row["res_mName"]; ?><?php echo " " ?><?php echo $row["res_lName"]; ?></td>
	<td align="center"><?php echo $row["preg_Date"]; ?></td>
	<td align="center"><?php echo $row["preg_Labor"]; ?></td>
	<td align="center"><?php echo $row["preg_Date_Record"]; ?></td>
	</tr>
<?php $count++; }

?>
</tbody>
</center>
</body>
</html>