<?php 
session_start();

    $iid = $_GET['id'];


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>


</head>

<body style="margin-top: 5%;">
    <link href="Style.css" type="text/css" rel="stylesheet">
    <br>
    <div class="head">
        <font size="5">Clearance Amount Update</font>
    </div>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0"
        onclick="location.href = 'ViewClearancePurposeAmount.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <section id="asd" class="asds">

        <article>

            <center>
                <form method="post" action="ClearanceSetUpdateExec.php">

                    <?php
				include('dbcon.php');
				$query = $db->query("SELECT * FROM finance_clearance_set WHERE purpose_id = '$iid'");
		      $row=mysqli_fetch_assoc($query);
         
             $eto = $row['clearance_id'];
            $query1 = $db->query("SELECT * FROM finance_clearance_list WHERE clearance_id = '$eto'");
		$row1=mysqli_fetch_assoc($query1);
         
			?>


                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tr>
                            <div class="form-group col-md-4">
                                <td>
                                    <label for="clearance_form">Clearance Form</label>
                                </td>
                                <td>


                                    <select name="clearance_id" class="form-control" readonly
                                        value="<?php echo $row["clearance_form"]; ?>" required name="clearance_form">
                                        <option value="<?php echo $iid; ?>"><?php echo $row1['clearance_form']; ?>
                                        </option>

                                    </select>
                                </td>
                            </div>
                        </tr>


                        <br>
                        <tr>
                            <div class="form-group col-md-4">
                                <td><label for="purpose">Purpose</label></td>

                                <td><input type="text" class="form-control"
                                        value="<?php echo $row["purpose"]; ?>" required name="purpose" method="POST">
                                </td>
                            </div>
                        </tr>
                        <br>

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4"><label for="price">Amount</label></div>
                            </td>
                            <td><input type="text" maxlength=20 class="form-control input-sm text-left amount"
                                    value="<?php echo number_format($row["price"],2); ?>" required name="price"></td>
                        </tr>
                        <br>

                    </table>

                    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" class="form-control" value="<?php echo $iid; ?>" required name="iiid">
                </form>

            </center>

        </article>
    </section>


    </div>

</body>
<script type="text/javascript">
$(function() {
    $('.amount').mask('#,###,###,###,###.##', {
        reverse: true
    });
});
</script>

</html>