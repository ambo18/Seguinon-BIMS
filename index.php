<?php
session_start();

if (isset($_SESSION['id'])) {
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barangay Information Management System</title>
    <link rel="stylesheet" href="Bootstrap4/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Bootstrap4/assets/css/atlantis.min.css">
    <link rel="stylesheet" href="Css/homepage.css">
    <link rel="shortcut icon" href="Picture/seguinon_logo.png">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('Picture/dark-bg2.jpg');
            background-size: cover; /* Ensure the background image covers the entire body */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the background image from repeating */
            position: relative; /* Set position to relative to allow layering */
        }

        .overlay {
            position: absolute; /* Position the overlay layer relative to its containing block */
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>

    <div class="overlay"></div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Web - Based Barangay Information Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h2 class="mt-2">Web - Based Barangay Information Management System</h2>
                        </div>
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required autofocus
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required
                                    placeholder="Enter Password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
                        </form>
                    </div>
                </div>
                <?php
                include('db.php');
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $qry = mysqli_query($db, "SELECT * FROM Accounts WHERE Username ='$username'");
                    $count = mysqli_num_rows($qry);

                    if ($count > 0) {
                        $accnt = mysqli_fetch_array($qry);
                        $pass = $accnt['Password'];

                        if ($pass == $password) {
                            $_SESSION['id'] = $accnt['ID'];
                            $position = $accnt['Position'];
                            $committee = $accnt['Committee'];
                            $fullname = $accnt['Fullname'];
                            $_SESSION['LOGIN_STATUS'] = true;
                            $_SESSION['position'] = $position;
                            $_SESSION['USER'] = $username;
                            $_SESSION['committee'] = $committee;
                            $_SESSION['password'] = $password;
                            $_SESSION['Emailaddress'] = $accnt['Emailaddress'];
                            $_SESSION['device_Id'] = $accnt['device_Id'];
                            $_SESSION['positionID'] = $accnt['position_id'];
                            $_SESSION['fullname'] = $fullname;
                            $_SESSION['position_id'] = $accnt['position_id'];
                            echo "<script>alert('Welcome.');</script>";
                            echo '<script>window.location = "home.php";</script>';
                        } else {
                            echo "<script>alert('Incorrect Password.');</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid username.');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="Bootstrap4/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="Bootstrap4/assets/js/core/popper.min.js"></script>
    <script src="Bootstrap4/assets/js/core/bootstrap.min.js"></script>
</body>

</html>
