 <?php session_start();
 include('dbcon.php');
 require('fpdf/fpdf.php');
$year=$_GET['year'];
  $sql = mysqli_query($db , "SELECT * FROM accounts where Position = 'Barangay Captain'");
  while($row = mysqli_fetch_assoc($sql))
  {
    $_SESSION['captain'] = $row['Fullname'];
  }

function fi_result()
{
	include('dbcon.php');
	$year=$_GET['year'];
		

						$res = mysqli_query($db, "SELECT * FROM finance_fundoperation_incomeset fs, finance_fundoperation_income fi WHERE fs.income_id=fi.income_id AND fs.income_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
					$tp += $row["income_amount"];
							$id = $row["income_id"];
							$row["income_type"];
							$row["income_code"];
							$row["income_amount"];					
	}
	return $tp;
}
function PS_result()
{
	include('dbcon.php');
	$year=$_GET['year'];

						$ress = mysqli_query($db, "SELECT * FROM finance_fundoperation_psset ps, finance_fundoperation_ps pp WHERE ps.service_id=pp.service_id AND ps.service_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($ress)){
					$tp += $row["service_amount"];
							$id = $row["service_id"];
							$row["service_type"];
							$row["service_code"];
							$row["service_amount"];
						
	}
	return $tp;
}
function fm_result()
{
	include('dbcon.php');
	$year=$_GET['year'];


	$resss = mysqli_query($db, "SELECT * FROM finance_fundoperation_mooeset ms, finance_fundoperation_mooe mm WHERE ms.mooe_id=mm.mooe_id AND ms.mooe_year LIKE '%$year%'");
						$tp = 0;
						while($row = mysqli_fetch_array($resss)){
						$tp += $row["mooe_amount"];
							$id = $row["mooe_id"];
							$row["mooe_type"];
							$row["mooe_code"];
							$row["mooe_amount"];				
					}
					return $tp;
}
function fn_result()
{
	include('dbcon.php');
	$year=$_GET['year'];


	$ressss = mysqli_query($db, "SELECT * FROM finance_fundoperation_noeset ns, finance_fundoperation_noe nn WHERE ns.noe_id=nn.noe_id AND ns.noe_year LIKE '%$year%'");
						$tp = 0;
						while($row = mysqli_fetch_array($ressss)){
						$tp += $row["noe_amount"];
							$id = $row["noe_id"];
							$row["noe_type"];
							$row["noe_code"];
							$row["noe_amount"];				
					}
					return $tp;
}


class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
    include("dbcon.php");
 	$year=$_GET['year'];
   

    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Move to the right
    $this->Cell(80);
    
}
function Footer()
{

	$this->SetY(-15);
	$this->SetFont('Arial','',8);
	$this->Cell(0,10,'Page' .$this->PageNo()." / {pages}",0,0,'C');
}
       
}




// Instanciation of inherited class

$pdf = new PDF('P','mm','legal');
$pdf->AliasNbPages('{pages}');

$pdf->AddPage();
$pdf->SetFont('Times','',11);

   // Title
	$pdf->SetFont('Arial','B',11);
    $pdf->Cell(400,5,"",0,1,'C');
    $pdf->Cell(400,5,"",0,1,'C');
    $pdf->Cell(400,5,"",0,1,'C');
    $pdf->Cell(300,6,"Barangay Budget Preparation Form No. 454",0,1,'C');
    $pdf->Cell(320,6,"",0,1,'C');
    $pdf->Cell(20,6,"Barangay ",0,0,'C');
     $pdf->Cell(29,6,":",0,0,'C');
    $pdf->Cell(20,6,"Tambo Malaki",0,1,'C');
     $pdf->Cell(30,6,"Municipality of ",0,0,'C');
    $pdf->Cell(9,6,":",0,0,'C');
    $pdf->Cell(28,6,"Indang",0,1,'C');
    $pdf->Cell(24,6,"Province of ",0,0,'C');
    $pdf->Cell(21,6,":",0,0,'C');
    $pdf->Cell(15,6,"Cavite",0,1,'C');
    
    $pdf->Ln(10);
    
    $pdf->Cell(200,10,"STATEMENT OF FUND OPERATION ",0,1,'C');
    $pdf->Cell(200,10,"CY $year ",0,1,'C');

    $pdf->Cell(115,10,"PARTICULARS" ,1,0,'C');
    $pdf->Cell(40,10,"ACCOUNT CODE" ,1,0,'C');
    $pdf->Cell(40,10,"AMOUNT" ,1,1,'R');

    //QUERY
    $pdf->SetFont('Arial','',11);
    $res = mysqli_query($db, "SELECT * FROM finance_fundoperation_incomeset fs, finance_fundoperation_income fi WHERE fs.income_id=fi.income_id AND fs.income_year LIKE '%$year%'");
    while($row = mysqli_fetch_array($res)){
    	$pdf->Cell(115,10,$row["income_type"] ,'LR',0,'C');
    	$pdf->Cell(40,10,$row["income_code"] ,'LR',0,'C');
    	$pdf->Cell(40,10,number_format($row["income_amount"],2) ,'LR',1,'R');
    }
    //TOTAL
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(115,10,"Total Income" ,'LR',0,'L');//Maintenance and Other Operating Expenses
    $pdf->Cell(40,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10,number_format(fi_result(),2),'LR',1,'R');
    //SPACING
    $pdf->Cell(115,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10," " ,'LR',0,'C');
    $pdf->Cell(40,10,"" ,'LR',1,'C');
    //TOTAL
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(115,10,"Personal Services" ,'LR',0,'L');
    $pdf->Cell(40,10," " ,'LR',0,'C');
    $pdf->Cell(40,10,number_format(PS_result(),2) ,'LR',1,'R');
    //QUERY
    $pdf->SetFont('Arial','',11);
    $ress = mysqli_query($db, "SELECT * FROM finance_fundoperation_psset ps, finance_fundoperation_ps pp WHERE ps.service_id=pp.service_id AND ps.service_year LIKE '%$year%'");
    while($row = mysqli_fetch_array($ress)){
    	$pdf->Cell(115,10,$row["service_position"] ,'LR',0,'C');
    $pdf->Cell(40,10,$row["service_code"] ,'LR',0,'C');
    $pdf->Cell(40,10,number_format($row["service_amount"],2) ,'LR',1,'R');
    }
    //SPACING

    $pdf->Cell(115,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10," " ,'LR',0,'C');
    $pdf->Cell(40,10,"" ,'LR',1,'C');
    //TOTAL
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(115,10,"Maintenance and Other Operating Expenses " ,'LR',0,'L');
    $pdf->Cell(40,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10,number_format(fm_result(),2),'LR',1,'R');
    //QUERY
    $pdf->SetFont('Arial','',11);
    $resss = mysqli_query($db, "SELECT * FROM finance_fundoperation_mooeset ms, finance_fundoperation_mooe mm WHERE ms.mooe_id=mm.mooe_id AND ms.mooe_year LIKE '%$year%'");
		while($row = mysqli_fetch_array($resss)){
			$pdf->Cell(115,10,$row["mooe_type"] ,'LR',0,'C');
    		$pdf->Cell(40,10,$row["mooe_code"] ,'LR',0,'C');
    		$pdf->Cell(40,10,number_format($row["mooe_amount"],2) ,'LR',1,'R');
    }
    //SPACING
    $pdf->Cell(115,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10," " ,'LR',0,'C');
    $pdf->Cell(40,10,"" ,'LR',1,'C');
    //TOTAL
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(115,10,"Non-Office Expenditures " ,'LR',0,'L');
    $pdf->Cell(40,10,"" ,'LR',0,'C');
    $pdf->Cell(40,10,number_format(fn_result(),2),'LR',1,'R');
    //QUERY
    $pdf->SetFont('Arial','',11);
    $ressss = mysqli_query($db, "SELECT * FROM finance_fundoperation_noeset ns, finance_fundoperation_noe nn WHERE ns.noe_id=nn.noe_id AND ns.noe_year LIKE '%$year%'");
			while($row = mysqli_fetch_array($ressss)){
			$pdf->Cell(115,10,$row["noe_type"] ,'LR',0,'C');
    		$pdf->Cell(40,10,$row["noe_code"] ,'LR',0,'C');
    		$pdf->Cell(40,10,number_format($row["noe_amount"],2) ,'LR',1,'R');

						}
	$pdf->Cell(195,0,'','T',1,'',true);

    $pdf->Ln(10);
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,5,"Prepared by:",0,0,'L');
    $pdf->Cell(60,5,"Approved by:",0,0,'R');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','BU',11);
   // $this->Cell(300,5,"$secname",5,0,'L');
   // $this->Cell(36,5,"$name",5,1,'R');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(0.5,-10, isset($_SESSION['Fullname'])? $_SESSION['Fullname'] : '', 0, 0, 'L');
    $pdf->Cell(60,5, isset($_SESSION['position'])? $_SESSION['position'] : '',0,0,'L');
    $pdf->Cell(120,-10, isset($_SESSION['captain'])? $_SESSION['captain'] : '', 0, 0, 'R');
    $pdf->Cell(-5,5,"Punong Barangay",0,0,'R');

$pdf->Output();

?>

<html>
	<head>

<link rel="stylesheet" type="text/css" href="tabledesign.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" / >

	</head>
<body>
<div class="container">
<center>
<p>STATEMENT OF FUND OPERATION</p>



<?php
echo "CY ";
echo $year;
 		
?>

    <div class="table-responsive">  
     <table class="table table-bordered">
 	<tr>
 	 	<td><center>PARTICULARS</center></td>
 		<td><center>ACCOUNT CODE</center></td>		
  		<td><center>AMOUNT</center></td>
  	</tr>
<tr>
	<?php
 include('dbcon.php');
		

						$res = mysqli_query($db, "SELECT * FROM finance_fundoperation_incomeset fs, finance_fundoperation_income fi WHERE fs.income_id=fi.income_id AND fs.income_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
					$tp += $row["income_amount"];
							$id = $row["income_id"];
							echo "<tr>
							<td>".$row["income_type"]."</td>
							<td>".$row["income_code"]."</td>
							<td>".number_format($row["income_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td>
							<td>Total Income</td>
							<td>".number_format($tp,2)."</td></td><tr>";

						$ress = mysqli_query($db, "SELECT * FROM finance_fundoperation_psset ps, finance_fundoperation_ps pp WHERE ps.service_id=pp.service_id AND ps.service_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($ress)){
					$tp += $row["service_amount"];
							$id = $row["service_id"];
							echo "<tr>
							<td>".$row["service_position"]."</td>							
							<td>".$row["service_code"]."</td>
							<td>".number_format($row["service_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td>
							<td>Total Personal Services</td>
							<td>".number_format($tp,2)."</td></td><tr>";
					

					$resss = mysqli_query($db, "SELECT * FROM finance_fundoperation_mooeset ms, finance_fundoperation_mooe mm WHERE ms.mooe_id=mm.mooe_id AND ms.mooe_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($resss)){
					$tp += $row["mooe_amount"];
							$id = $row["mooe_id"];
							echo "<tr>
							<td>".$row["mooe_type"]."</td>
							<td>".$row["mooe_code"]."</td>
							<td>".number_format($row["mooe_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td>
							<td>Total Maintenance and Other Expenses</td>
							<td>".number_format($tp,2)."</td></td><tr>";


					$ressss = mysqli_query($db, "SELECT * FROM finance_fundoperation_noeset ns, finance_fundoperation_noe nn WHERE ns.noe_id=nn.noe_id AND ns.noe_year LIKE '%$year%'");

						$tp = 0;				
					while($row = mysqli_fetch_array($ressss)){
					$tp += $row["noe_amount"];
							$id = $row["noe_id"];
							echo "<tr>
							<td>".$row["noe_type"]."</td>
							<td>".$row["noe_code"]."</td>
							<td>".number_format($row["noe_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td>
							<td>Total Non-Office Expenditures</td>
							<td>".number_format($tp,2)."</td></td><tr>";

					?>

					
					              </tr>


 </table>
 <br>
  					<form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-info" value="Create PDF">  
                     </form>



</center>
 </div>
 </body>
</html>