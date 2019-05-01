<?php require('fpdf.php'); ?>
<?php include_once('../extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('../extras/functions.php'); ?>
<?php 
   $user_id = $_SESSION['user_id'];
   $user_id = $_SESSION['user_id'];
   $sql = "SELECT * FROM tbl_jobs where user_id = '$user_id'";
   $retval = mysqli_query($conn, $sql);

    $GLOBALS['retval'] = $retval;
    $GLOBALS['conn'] = $conn;
   
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
    $this->Cell(90,10,'Customer Jobs Listing',1,0,'C');
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
    $w = array(40, 35, 40, 45);
    $this->Cell($w[0],7,$header[0],1,0,'C',true);
    $this->Cell(120,7,$header[1],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
   
    $fill = false;
    while($row = mysqli_fetch_array($GLOBALS['retval'])){
        $freelancer = "Not Assigned";
        if(getJobAssignment($row['job_id'], $GLOBALS['conn'])){
          $freelancer = getAuthor(getJobAssignment($row['job_id'], $GLOBALS['conn'])['freelancer_id'], $GLOBALS['conn'])['full_name']; 
        }

        $this->Cell($w[0],6,$freelancer,'LR',0,'L',$fill);
        $this->Cell(120,6,$row['title'],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
   
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
   }
   }
   
   $pdf = new PDF();
   // Column headings
   $header = array('Freelancer', 'Job Title');
   $pdf->SetFont('Arial','',10);
   $pdf->AddPage();
   $pdf->FancyTable($header);
   $pdf->Output();
?>