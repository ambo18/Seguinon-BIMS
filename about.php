<!DOCTYPE html>
<html lang="en" style="background: url('Picture/plaza5.jpg') center/cover no-repeat;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web - Based BIMS - About</title>
    <link rel="shortcut icon" href="Picture/logo.png" />
    <link rel="stylesheet" href="Bootstrap4/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="Bootstrap4/assets/css/atlantis.min.css">
    <style type="text/css">
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 30%; /* Adjust the width as needed */
            margin: 1em; /* Adjust the margin as needed */
            font-family: arial;
            background-color: white;
            padding: 10px;
        }

        .card p {
            flex-grow: 1;
        }

        .card:hover {
            border: solid 1px #3d4ee7;
            background-color: #e9e9e9;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        #navbarNav ul li .nav-link {
            margin-left: 50px;
        }

        .card img {
            width: 100%;
        }

        .modal-body img {
            width: 100%;
            border: 1px solid;
        }
    </style>
</head>

<body style="background-color: transparent !important;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Web - Based Barangay Information Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 5em; padding-left: 8%;">
        <div class="row">
            <div class="col-sm-3 card">
                <div style="padding:5px;">
                    <img src="Picture/logo.png" alt="bims" style="width:100% ">
                </div>
                <h4>Web - Based BIMS</h4>
                <p class="title">Web - Based Barangay Information Management System</p>
                <p>is a computerized information-processing system...</p>
                <p><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bmis">Read More</button></p>
            </div>

            <div class="col-sm-1"></div>
            <div class="card col-sm-3">
                <div style="padding:5px;">
                    <img src="Picture/mission_vision.jpg" alt="mission_vission" style="width:100% ">
                </div>
                <h4>MISSION AND VISION</h4>
                <p class="title">Mission and Vision of Barangay Information Management System</p>
                <p>Mission: To streamline and enhance the administrative processes of the barangay, providing the barangay secretary with an...</p>
                <p><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mv">Read More</button></p>
            </div>

            <div class="col-sm-1"></div>
            <div class="card col-sm-3">
                <div style="padding:5px;">
                    <img src="Picture/salcedo.jpg" alt="Municipal_Profile" style="width:100% ">
                </div>
                <h4>SALCEDO EASTERN SAMAR</h4>
                <p class="title">Municipal Profile</p>
                <p>REGION : VII <br> PROVINCE : EASTERN SAMAR MUNICIPALITY : SALCEDO</p>
                <p><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#inprofile">Read More</button></p>
            </div>
            
        </div>
    </div>

    <!-- Modal -->
    <div id="bmis" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mr-auto">Web - Based Barangay Information Management System</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="5" color="#3d4ee7">
                                <b>Web - Based Barangay Information Management System</b> </font>
                        </h1>
                    </center>
                    <div>
                        <p><img src="Picture/logo.png" align="left" width="300" height="330"> &emsp; The Web - Based Barangay Information Management System is a computerized information-processing system designed to support the activities, manages files and documents of company or organization.It
                            can provide up to date information of the residents with relatively little effort on the part of the user of the system and put a huge amount of information within convenient and comfortable read. Not mentioning the security
                            and integrity of the document, it also provides.
                            <Br><br>&emsp; The barangay secretary will no longer have a hard time when it comes to organizing the data needed by the residents. it will help the barangay to solve the difficulty in retrieving large volume of residents information.
                            It makes things more convenient for the residents and reduces the number of visits in the barangay. &emsp; What will the Web - Based BIMS achieve? To Address barangay efficiency issues and have a Satisfied or happier residents of the barangay.
                        </p>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="mv" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mr-auto">Mission and Vision</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="5" color="#3d4ee7"> <b>Mission and Vision</b></font>
                        </h1>
                        <h1>
                            <font size="5" color="#3d4ee7"><b>Mission</b></font>
                        </h1>
                        <p> To streamline and enhance the administrative processes of the barangay, providing the barangay secretary with an efficient and user-friendly platform to manage resident information,
                             facilitate communication, and optimize decision-making for the benefit of the community.</p>

                        <h1>
                            <font size="5" color="#3d4ee7"><b>Vision</b></font>
                        </h1>
                        <p> To be the indispensable digital tool that empowers the barangay secretary in maintaining accurate and up-to-date resident records, fostering community engagement, and contributing 
                            to the overall development and well-being of the barangay.</p>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="inprofile" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title mr-auto">Municipal Profile</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h1>
                        <font size="5" color="#3d4ee7">
                            <B>Fact and Figures</b> </font>
                    </h1>
                    <center>
                        <img src="Picture/municipal.webp" align="" width="500" style="border:1px solid;"></center>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <B>REGION</b> :</td>
                            <td> Eastern Visayas VIII</td>
                        </tr>
                        <tr>
                            <td>
                                <B>PROVINCE</b> :</td>
                            <td>Eastern Samar</td>
                        </tr>
                        <tr>
                            <td>
                                <B>MUNICIPALITY</b> :</td>
                            <td>Salcedo</td>
                        </tr>
                        <tr>
                            <td>
                                <B>Income Class</b> :</td>
                            <td>5th Class</td>
                        </tr>
                        <tr>
                            <td>
                                <B>Land Area</b> :</td>
                            <td>11380 hectares (113.80 sq.km.) </td>
                        </tr>

                        <tr>
                            <td>
                                <B>Number of Barangay</b> :</td>
                            <td> 41 Barangays</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script src="Bootstrap4/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="Bootstrap4/assets/js/core/popper.min.js"></script>
    <script src="Bootstrap4/assets/js/core/bootstrap.min.js"></script>
    <script src="Bootstrap4/assets/js/plugin/datatables/datatables.min.js"></script>
</body>

</html>
