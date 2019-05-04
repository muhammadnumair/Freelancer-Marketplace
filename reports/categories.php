<?php include_once('../extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('../extras/functions.php'); ?>
<?php
   $sql = "SELECT * FROM tbl_categories";
   $retval = mysqli_query($conn, $sql);
?>

<?php require('fpdf.php');
   class PDF extends FPDF
   {
   
   function Header()
   {
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(90,10,'Categories',1,0,'C');
    // Line break
    $this->Ln(20);
   }
   
   // Colored table
   function FancyTable($header)
   {
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(60, 60, 70, 45);
    $this->Cell($w[0],7,$header[0],1,0,'C',true);
    $this->Cell($w[1],7,$header[1],1,0,'C',true);
    $this->Cell($w[2],7,$header[2],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
   
    $fill = false;
    while($row = mysqli_fetch_array($GLOBALS['retval'])){
        $this->Cell($w[0],6,$row['name'],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row['description'],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row['icon'],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
   
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
   }
   }
   
   $pdf = new PDF();
   // Column headings
   $header = array('Name', 'Description', 'Icon Code');
   $pdf->SetFont('Arial','',10);
   $pdf->AddPage();
   $pdf->FancyTable($header);
   $pdf->Output();
?>