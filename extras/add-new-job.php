<?php include_once('database.php'); ?>
<?php
    session_start();
    unset($_SESSION['error_msg']);
    unset($_SESSION['error']);

    if(isset($_POST['submit'])){
        $error = 0;
        $error_msg = "";
        $title = $_POST['title'];
        $category = $_POST['category'];
        $country = $_POST['country'];
        $payment_procedure = $_POST['payment_procedure'];
        $budget = $_POST['budget'];
        $experience_level = $_POST['experience_level'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];

        if($title != "" && $description != "" && $budget != ""){
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO tbl_jobs (title, category_id, country_id, user_id, payment_procedure, budget, experience_level, duration, job_description) VALUES ('$title', '1', '2', '$user_id', '$payment_procedure', '$budget', '$experience_level', '$duration', '$description')";
            //print_r($sql);exit;
                   //print_r($sql);exit;
            if ($conn->query($sql) === TRUE) {
                header('Location: ../jobs.php');
            }
        }else{
            $error = 1;
            $error_msg = "Please Fill In All Required Fields";
        }

        if($error == 1){
                $_SESSION['error'] = true;
                $_SESSION['error_msg'] = $error_msg; 
                header('Location: ../add-job.php');
        }
   }
?>