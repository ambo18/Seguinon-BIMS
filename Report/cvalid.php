<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
input[type=text] {
    width: 40%;
    padding: 12px 15px;

    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.container {
    width: 45%;
    height: 50%;
    background-color: white;
    float: center;
    border: 2px solid green;
    border-radius: 10px;




}

.button {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    -webkit-transition-duration: 0.4s;
    /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
</style>
<header style="padding: 40px;">
    <h1 style="margin-left:70;"> <a href="viewreport.php"><button class='btn btn-success'> Back </button></a></h1>
</header>


<form method="post" action="computecov.php">


    <center>

        <div class="container">

            <BR><BR>

            <br><br><br> <label>Select month :</label>


            <select name="fmonth" required>
                <option value="">Month</option>
                <?php for ($month = 1; $month <= 12; $month++) { ?>
                <option value="<?php echo strlen($month)==1 ? '0'.$month : $month; ?>">
                    <?php echo date('F', mktime(0,0,0,$month,1,date('Y'))); ?></option>
                <?php } ?>
            </select>
            <br> <label>Select year :</label>
            <select name="fyear" required>
                <option value="">Year</option>
                <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php } ?>
            </select><br><br>
            <button class="button button1">Generate Report</button>

        </div>
        <br><br><br>


        </div>
        </div>
    </center>
    </body>
</form>