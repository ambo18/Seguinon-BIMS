<?php

session_start(); 
include('db.php');

 	if (isset($_SESSION['id'])) {
 	}
 	else{

 		header('location:index.php');
 	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="Picture/seguinon_logo.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
        }
    </style>
</head>

<frameset rows="80%, 5%" frameborder="0">
    <frameset cols="20%, 80%">
        <frame src="modules.php" name="FraLink">
        <frame src="Resident_Profiling\Dash\index.php" name="FraDisplay">
    </frameset>
    <frame src="footer.php" name="FraDisplay">
</frameset>

</html>


