<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Information Management System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="Style.css" type="text/css" rel="stylesheet">

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            text-align: left;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        td.amount {
            text-align: right;
        }
    </style>
</head>

<body style="margin-top: 5%;">

    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0"
        onclick="location.href = 'IncomeFundOperationSet.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>


    <?php session_start();
include("dbcon.php");
?>
    <center>
        <?php
		
include('dbcon.php');


$res = mysqli_query($db, "SELECT finance_fundoperation_income.income_type,
finance_fundoperation_income.income_code, finance_fundoperation_incomeset.income_id,finance_fundoperation_incomeset.income_amount, finance_fundoperation_incomeset.income_setid,finance_fundoperation_incomeset.income_year,finance_fundoperation_income.income_id FROM finance_fundoperation_income INNER JOIN finance_fundoperation_incomeset
WHERE finance_fundoperation_income.income_id=finance_fundoperation_incomeset.income_id");?>

        <div class="container">
            <div class="table-responsive">
                <table class="table table table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th scope="col">Particulars</th>
                            <th scope="col">Account Code</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Year</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php
while($row = mysqli_fetch_array($res)){
$id = $row["income_setid"];
$year = $row["income_year"];
$iid = $row["income_id"];?>
                    <tr>
                        <td><?php echo $row["income_type"]?></td>
                        <td><?php echo $row["income_code"]?></td>
                        <td class='amount'><?php echo number_format($row["income_amount"],2)?></td>
                        <td><?php echo $row["income_year"]?></td>

                        <td><a href="IncomeFundOperationSetUpdate.php?id=<?php echo $row['income_setid']; ?>&year=<?php echo $row['income_year']; ?>&iid=<?php echo $row['income_id']; ?>"
                                class="btn btn-primary">Update</a></td>
                        <td><input type="button" onClick="deleteme(<?php echo $row['income_setid']?>)" name="Delete"
                                value="Delete" class="btn btn-primary"></td>
                    </tr>

                    <script language="javascript">
                    function deleteme(delid) {
                        if (confirm("Are you sure you want to delete?")) {
                            window.location.href = 'IncomeFundOperationSetDelete.php?del_id=' + delid + '';
                            return true;
                        }
                    }
                    </script>
                    <?php
}
?>

            </div>
        </div>

        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendor/js/jquery.dataTables.min.js"></script>
        <script src="vendor/js/dataTables.bootstrap.min.js"></script>
        <script>
        $(document).ready(function() {
            var table = $('#mytable').removeAttr('width').DataTable({
                scrollY: "500px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                columnDefs: [{
                        width: 120,
                        targets: 0
                    }

                ],
                fixedColumns: true
            });
        });
        </script>

    </center>

</body>
<html>