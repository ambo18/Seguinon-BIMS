<html style="background: url('Picture/logo.png') center/contain no-repeat;">
<title>BIMS - About</title>
<link rel="shortcut icon" href="Picture/logo.png" />

<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="Css/homepage.css"> -->
<style type="text/css">
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px !important;
        height: 500px;
        margin: auto;
        text-align: center;
        font-family: arial;
        background-color: white;
    }
    .card:hover{
        border: solid 1px #3d4ee7;
        background-color: #e9e9e9;
    }
    
    .title {
        color: grey;
        font-size: 18px;
    }
    .nav {
        background-color: #000000;
        border: none;
        width: 100%;
        position:fixed;
        overflow: hidden;
        top: 0;
        left: 0;
        text-transform: uppercase;
        font-family: calibri;
    }
    .nav a {
        float: right;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 70px;
        margin: 0px 10px;
        text-decoration: none;
        background-color: #0f0f0f;
    }
    .nav a:hover {
        background: #3d4ee7;
        color: white;
    } 
    .nav a:active {
        background: #99c74b;
    }
</style>
<div class="nav">
    <a href="about.php">about</a>
    <a href="index.php">home</a>
</div>

<body style="background-color: transparent !important;">

    <div class="container" style="padding-top: 5em; padding-left: 15%;">


        <div class="col-sm-3 card ">
            <div style="padding:5px;">
                <img src="Picture/logo.png" alt="bims" style="width:100% ">
            </div>
            <h4>BIMS</h4>
            <p class="title">Bgy. Information Management System</p>
            <p>is a computerized information-processing system...</p>
            <p><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bmis">Read More</button></p>
        </div>
        <div class="col-sm-1"></div>
        <div class="card col-sm-3">
            <div style="padding:5px;">
                <img src="Picture/mission_vision.jpg" alt="mission_vission" style="width:100% ">
            </div>
            <h4>MISSION AND VISION</h4>
            <p class="title">Mission and Vision of Seguinon Salcedo Eastern Samar</p>
            <p>Mission: Enhance the quality of life of the people by providing adequate basic social services in an...</p>
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
    <!-- Modal -->
    <div id="bmis" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Barangay Information Management System</h4>
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="5" color="#3d4ee7">
                                <b>Barangay Information Management System</b> </font>
                        </h1>
                    </center>
                    <div>
                        <p><img src="Picture/logo.png" align="left" width="300" height="300"> &emsp; The Barangay Information Management System is a computerized information-processing system designed to support the activities, manages files and documents of company or organization.It
                            can provide up to date information of the residents with relatively little effort on the part of the user of the system and put a huge amount of information within convenient and comfortable read. Not mentioning the security
                            and integrity of the document, it also provides.
                            <Br><br>&emsp; The barangay officials will no longer have a hard time when it comes to organizing the data needed by the residents. it will help the barangay to solve the difficulty in retrieving large volume of residents information.
                            It makes things more convenient for the residents and reduces the number of visits in the barangay. &emsp; What will the BMIS achieve? To Address barangay efficiency issues and have a Satisfied or happier residents of the barangay.
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mission and Vision</h4>
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="5" color="#3d4ee7"> <b>Mission and Vision</b></font>
                        </h1>
                        <h1>
                            <font size="5" color="#3d4ee7"><b>Mission</b></font>
                        </h1>
                        <p> Enhance the quality of life of the people by providing adequate basic social services in an environment conducive for living that promotes agri-tourism Sustain a balance and healthy environment through proper preservation, and
                            protection of natural resources. Ensure peace and public safety through respecting peoples lives to achieve an orderly society.</p>

                        <h1>
                            <font size="5" color="#3d4ee7"><b>Vision</b></font>
                        </h1>
                        <p> The Center of Agri-Tourism imbued with nurturing and respectful people in a progressive, healthy and balanced environment governed by honest leaders</p>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Municipal Profile</h4>
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

    <script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>
    <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
</body>

</html>