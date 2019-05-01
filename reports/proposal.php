<?php include_once('../extras/database.php'); ?>
<?php include_once('../extras/functions.php'); ?>
<?php session_start(); ?>
<?php
   //print_r($total_pages);exit;
   if(isset($_GET['id'])){
      $proposal_id = $_GET['id'];
   }else{
      header('Location: proposals');
   }
   $proposal = getProposalDetail($proposal_id, $conn);

   $GLOBALS['proposal'] = $proposal;
   $GLOBALS['conn'] = $conn;
?>

<?php
require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function PrintChapter()
{
    $this->AddPage();
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"Job Information",0,1,'L',true);
    // Line break
    $this->Ln(4);

    $this->SetFont('Times','',12);
    $this->SetFillColor(255,255,255);
    $this->Cell(0,6,"Job Title: ". getJobDetail($GLOBALS['proposal']['job_id'], $GLOBALS['conn'])['title'],0,1,'L',true);
    $this->Cell(0,6,"Job Category: ".  getCategory(getJobDetail($GLOBALS['proposal']['job_id'], $GLOBALS['conn'])['category_id'], $GLOBALS['conn'])['name'],0,1,'L',true);

    $this->Ln(4);

    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"Applier Information",0,1,'L',true);
    // Line break
    $this->Ln(4);

    $this->SetFont('Times','',12);
    $this->SetFillColor(255,255,255);
    $this->Cell(0,6,"Name: ". getAuthor($GLOBALS['proposal']['user_id'], $GLOBALS['conn'])['full_name'],0,1,'L',true);

    $this->Ln(4);

    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"Proposal Description",0,1,'L',true);
    // Line break
    $this->Ln(4);

    $this->SetFont('Times','',12);
    $this->SetFillColor(255,255,255);
    $this->MultiCell(0,5,$GLOBALS['proposal']['description']);
}
}

$pdf = new PDF();
$title = 'Job Proposal Document';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
$pdf->Output();
?>