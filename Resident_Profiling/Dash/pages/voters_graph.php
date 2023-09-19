<?php  
    include('connections.php');
    $query ="SELECT COUNT(res_ID) AS total FROM resident_detail";  
    $result = mysqli_query($db, $query);  
    $row = mysqli_fetch_assoc( $result );
    $num_rows=$row['total'];

    $non_voter = 0;
    $sk_voter = 0;
    $barangay_voter = 0;
  
    $query1 ="SELECT res_Bday FROM resident_detail";  
    $result1 = mysqli_query($db, $query1);  
    $today = date('Y-m-d');
        
    while ($row=mysqli_fetch_array($result1)){
        $dob = $row['res_Bday'];

        $diff = date_diff(date_create($dob), date_create($today));
        
        $age= $diff->format('%y');
        if($age<14){
            $non_voter++; 
        }
        elseif($age>=15 && $age<18){
            $sk_voter++; 
        }
        else{
            $barangay_voter++; 
        }
        
    }  
 ?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../js/loader1.js"></script>

</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <center>
                <h3 class="page-header">Voters Profiling Dashboard</h3>
            </center>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div>


        <script src="../js/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],


                ['Non Voter(s)', <?php echo $non_voter; ?>],
                ['Sk Voter(s)', <?php echo $sk_voter; ?>],
                ['Barangay Voter(s)', <?php echo $barangay_voter; ?>],
            ]);

            var options = {
                title: 'Voters Graph'
            };

            var chart = new google.visualization.PieChart(document.getElementById('voterspiechart'));

            chart.draw(data, options);
        }
        </script>

        <body>
            <div id="voterspiechart" style="width: 1200px; height: 800px;"></div>
        </body>

    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

</html>