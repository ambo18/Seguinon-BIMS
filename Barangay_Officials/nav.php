<?php
	session_start();
?>
<style type="text/css">
	#lia{
		color: #f2f2f2;
	}
	#lia:hover{

		color: black;
	}
</style>
<link href="style/style.css" rel="stylesheet" type="text/css">
<ul class="nav navbar-nav">

<?php 
	if ($_SESSION['position']=='Barangay Secretary')
	echo'
		<li><a href="chart.php"  id="lia">Officials</a></li>
		<li><a href="add.php"  id="lia">Add</a></li>
';?>
</ul>