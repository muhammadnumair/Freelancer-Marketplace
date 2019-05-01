<?php 
   // Get Shorter Text From Long Text
   function shorter($text, $chars_limit = 400)
   {
       // Check if length is larger than the character limit
       if (strlen($text) > $chars_limit)
       {
           // If so, cut the string at the character limit
           $new_text = substr($text, 0, $chars_limit);
           // Trim off white space
           $new_text = trim($new_text);
           // Add at end of text ...
           return $new_text . "...";
       }
       // If not just return the text as is
       else
       {
       return $text;
       }
   }

   // Calculate Time Elapsed
   function time_elapsed_string($datetime, $full = false) {
       $now = new DateTime;
       $ago = new DateTime($datetime);
       $diff = $now->diff($ago);

       $diff->w = floor($diff->d / 7);
       $diff->d -= $diff->w * 7;

       $string = array(
           'y' => 'year',
           'm' => 'month',
           'w' => 'week',
           'd' => 'day',
           'h' => 'hour',
           'i' => 'minute',
           's' => 'second',
       );
       foreach ($string as $k => &$v) {
           if ($diff->$k) {
               $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
           } else {
               unset($string[$k]);
           }
       }

       if (!$full) $string = array_slice($string, 0, 1);
       return $string ? implode(', ', $string) . ' ago' : 'just now';
   }

   // Get User Details
   function getAuthor($user_id, $con){
      $sqli = "SELECT * from tbl_user where user_id = '$user_id'";
                //print_r($sql);exit;
      $retvali = mysqli_query($con, $sqli);
      $user_array = mysqli_fetch_array($retvali);
      return $user_array;
   }

   // Get Country Details
   function getCountry($country_id, $con){
      $sqli = "SELECT * from tbl_country where country_id = '$country_id'";
                //print_r($sql);exit;
      $retvali = mysqli_query($con, $sqli);
      $country_array = mysqli_fetch_array($retvali);
      return $country_array;
   }

   // Get Job Applicants
   function getApplicants($job_id, $con){
      $sqli = "SELECT * from tbl_proposals where job_id = '$job_id'";
      $retvali = mysqli_query($con, $sqli);
      $applicants = mysqli_num_rows($retvali);
      return $applicants;
   }

   // Get Category
   function getCategory($category_id, $con){
      $sqli = "SELECT * from tbl_categories where category_id = '$category_id'";
      $retvali = mysqli_query($con, $sqli);
      $category = mysqli_fetch_array($retvali);
      return $category;
   }
 
   // Jobs Posted Count
   function userJobsCount($user_id, $con){
      $sqli = "SELECT * from tbl_jobs where user_id = '$user_id'";
      $retvali = mysqli_query($con, $sqli);
      $jobs_count = mysqli_num_rows($retvali);
      return $jobs_count;
   }

   // Get Single Job Details
   function getJobDetail($job_id, $con){
      $sqli = "SELECT * from tbl_jobs where job_id = '$job_id'";
      $retvali = mysqli_query($con, $sqli);
      $job = mysqli_fetch_array($retvali);
      return $job;
   }

   // Get Proposal Details
   function getProposalDetail($proposal_id, $con){
      $sqli = "SELECT * from tbl_proposals where id = '$proposal_id'";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_fetch_array($retvali);
      return $proposal;
   }

   // Get Job Assignement
   function getJobAssignment($job_id, $con){
      $sqli = "SELECT * from tbl_jobs_assigned where job_id = '$job_id'";
      $retvali = mysqli_query($con, $sqli);
      $assignement = mysqli_fetch_array($retvali);
      return $assignement;
   }

   function getJobAssignmentCount($job_id, $con){
      $sqli = "SELECT * from tbl_jobs_assigned where job_id = '$job_id'";
      $retvali = mysqli_query($con, $sqli);
      $assignement = mysqli_num_rows($retvali);
      return $assignement;
   }

   // Get Milestone By Id
   function getMilestoneById($milestone_id, $con){
      $sqli = "SELECT * from tbl_job_milestone where id = '$milestone_id'";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_fetch_array($retvali);
      return $proposal;
   }

   // Get Milestone By Id
   function getUsersCount($con){
      $sqli = "SELECT * from tbl_user";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_num_rows($retvali);
      return $proposal;
   }

   // Get Milestone By Id
   function getJobsCount($con){
      $sqli = "SELECT * from tbl_jobs";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_num_rows($retvali);
      return $proposal;
   }

   // Get Freelancers Count
   function getFreelancersCount($con){
      $sqli = "SELECT * from tbl_user where user_role = 'freelancer'";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_num_rows($retvali);
      return $proposal;
   }

   function getCustomersCount($con){
      $sqli = "SELECT * from tbl_user where user_role = 'customer'";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_num_rows($retvali);
      return $proposal;
   }

  // Get Proposals Count
   function getProposalsCount($con){
      $sqli = "SELECT * from tbl_proposals";
      $retvali = mysqli_query($con, $sqli);
      $proposal = mysqli_num_rows($retvali);
      return $proposal;
   }

   function getProfilePhoto($user_id, $con){
      $sqli = "SELECT profile_img from tbl_user where user_id = '$user_id'";
      $retvali = mysqli_query($con, $sqli);
      return mysqli_fetch_array($retvali);
   }
?>