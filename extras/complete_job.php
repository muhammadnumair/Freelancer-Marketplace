<?php include_once('database.php'); ?>
<?php
	$job_id = $_GET['job'];
	$sql = "UPDATE `tbl_jobs_assigned` SET `job_status`= 'complete' WHERE job_id = '$job_id'";
	mysqli_query($conn, $sql);
	header('Location: ../workroom?job='.$job_id);
?>