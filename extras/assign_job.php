<?php include_once('database.php'); ?>
<?php 
	$proposal_id = $_GET['proposal_id'];
	$job_id = $_GET['job_id'];
	$freelancer_id = $_GET['freelancer_id'];
	$client_id = $_GET['client_id'];
	$sql = "INSERT INTO `tbl_jobs_assigned`(`proposal_id`, `job_id`, `freelancer_id`, `client_id`, `job_status`) VALUES ($proposal_id, $job_id, $freelancer_id, $client_id, 'incomplete')";
	mysqli_query($conn, $sql);
	$sql2 = "UPDATE `tbl_proposals` SET `status`= 'Assigned' WHERE id = '$proposal_id'";
	mysqli_query($conn, $sql2);
	header('Location: ../proposals');
?>