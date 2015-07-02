<?php
require('fpdf.php');
include '../config/connection.php';

class PDF extends FPDF
{
// Load data
/*function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}
*/
// Simple table
function BasicTable($header, $data)
{
	/*// Header
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();*/
	// Data
	/*foreach($data as $row)
	{
		foreach($row as $col)
			$this->Cell(40,6,$col,1);
		$this->Ln();
	}*/
}

function Header()
	{
					

    // Logo
   	 //$this->Image('logo.jpg',10,10,20);
   				 // Arial bold 8
				 
	
    $this->SetFont('Arial','B',20);
    $this->Cell(20);
	$this->SetTextColor(0,0,0);	
	$this->Cell(40,5,'Radmon Enterprise');
	$this->Cell(90);
	$this->SetFont('Arial','B',10);
	$this->Cell(30,5,'Date :'.date("Y-m-d"));
	
	//$this->SetFont('Arial','B',10);
	//$this->Cell(30,15,'Date :'.date("Y-m-d"));
	$this->Ln(5);
	$this->Cell(30);
	$this->SetFont('Arial','B',10);
	$this->Cell(60,5,'121/D,Roy Bahadur Road');
	$this->Cell(40);
	$this->SetFont('Arial','B',10);
	$this->Cell(30,5,'To:');
//	$this->Ln(3);
	$this->Cell(40);
	//$this->Cell(100,10,'To:',1);
	$this->Ln(4);
	$this->Cell(40);
	$this->Cell(60,5,'Kolkata-700 034');
	//$this->Cell(50,25,'Date :'.date("Y-m-d"),1);
	$this->Ln(12);
	$this->Cell(130);
	
	$this->SetFont('Arial','B',10);
	$this->Cell(20,5,'DL No.');	
	$this->Cell(50);
	$this->Ln(30);
	
	}

	
function generateTable($no)
{
include '../config/connection.php';
$query="SELECT * FROM product  where product_id =1";
$result=mysql_query($query);
$this->SetFont('Arial','B',10);
$this->SetFillColor(0,150,255);
$this->cell(5);
//$this->Ln(10);
$this->cell(15,8,"Item No",1,0,"C",false);
//$this->cell(20,5,"name",1,0,"C",true);
//$this->cell(20,5," exam",1,0,"C",true);
//$this->cell(20,5,"sub",1,0,"C",true);
////$this->cell(35,5,"year",1,1,"C",true); 
//$this->cell(20,5,"class",1,0,"C",true); 
$this->cell(30,8,"Description",1,0,"C",false); 
$this->cell(25,8,"Batch No.",1,0,"C",false);
$this->cell(20,8,"MRP",1,0,"C",false);  
$this->cell(20,8,"Qty",1,0,"C",false);
$this->cell(20,8,"Rate",1,0,"C",false);
$this->cell(25,8,"Amount",1,0,"C",false);   
$this->cell(25,8,"Discount",1,0,"C",false); 
//$this->cell(12,5,"Total",1,1,"C",true); 

//$query="SELECT * FROM `admission_form_i` where form_no='".$_REQUEST['form_no']."'";
//$result=mysql_query($query);
	//$i=0;
	
//$m=0;
while($row=mysql_fetch_array($result))
{

//$total=$row['term1']+$row['term2']+$row['term3']+$row['term4']+$row['term5']+$row['term6']+$row['term7']+$row['term8'];

//$this->cell(30,5,$row['form_no'],1,0,"C");
$this->cell(5);
//$this->cell(20,5,$row['roll'],1,0,"C");
//$this->cell(20,5,$row['name'],1,0,"C"); 
//$this->cell(20,5,$row['exam'],1,0,"C");
//$this->cell(9,5,$row['sno'],1,0,"C");
//$this->cell(20,5,$row['class'],1,0,"C");
//$this->cell(20,5,$row['marks'],1,0,"C");
//$this->cell(9,5,$row['acc_no'],1,0,"C");
//$this->cell(11,5,$row['name'],1,0,"C");
//$this->cell(19,5,$row['tid'],1,0,"C");
//$this->cell(19,5,$row['month'],1,0,"C");
//$this->cell(9,5,$row['basicpay'],1,0,"C");
//$this->cell(10,5,$row['subscription'],1,0,"C");
//$this->cell(9,5,$row['cpf'],1,0,"C");
//$this->cell(10,5,$row['loan'],1,0,"C");
//$this->cell(10,5,$row['installment'],1,0,"C");
//$this->cell(12,5,$row['total'],1,1,"C");
//$this->cell(19,5,$total,1,1,"C");
//$this->cell(19,5,$row['marks'],1,1,"C");
//$m=$m+$total;
//$this->cell(20,5,$m,1,0,"C");
}
/*$this->Ln(7);
$this->cell(146);
$this->SetFont('Arial','BI',12);
$this->cell(5,5,'GRAND TOTAL:					');
$this->cell(29);
$this->SetTextColor(100,200,150);
$this->cell(15,5,$m,1,1,"C");
*/
}



// Better table
/*function ImprovedTable($header, $data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}*/

// Colored table
/*function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
*/}

$pdf = new PDF();
// Column headings
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
//$pdf->AddPage();
//$pdf->BasicTable($header,$data);
//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->generateTable(5);
$pdf->Output();
?>
