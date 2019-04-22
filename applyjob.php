<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php
   if(isset($_GET['id'])){
      $job_id = $_GET['id'];
   }else{
      header('Location: work.php');
   }
   
   $user_id = $_SESSION['user_id'];
   $sql = "SELECT * from tbl_jobs where job_id = '$job_id'";
   $retval = mysqli_query($conn, $sql);
   if(mysqli_num_rows($retval) == 0){
      print_r("404 Error");exit;
   }
   
   $job = mysqli_fetch_array($retval);
   // Calculate Time Elapsed
   $sqli = "SELECT * from tbl_proposals where job_id = '$job_id'";
   $proposals = mysqli_query($conn, $sqli);
   ?>
   <?php 
      unset($_SESSION['error_msg']);
      unset($_SESSION['success_msg']);
      unset($_SESSION['error']); 
      if(isset($_POST['submit'])){
         $error = 0;
         $error_msg = "";
         $description = $_POST['description'];
         if($description != ""){
            if($error == 0){
               $sql = "INSERT INTO `tbl_proposals`(`job_id`, `user_id`, `status`, `description`) VALUES ('$job_id', '$user_id', 'Not Assigned', '$description')";
               //print_r($sql);exit;
               //print_r($sql);exit;
               if ($conn->query($sql) === TRUE) {
                  $_SESSION['success_msg'] = "Successfully Submitted Your Proposal";
               }
            }
         }else{
            $error = 1;
            $error_msg = "Please Fill In All Required Fields";
            $_SESSION['error'] = true;
            $_SESSION['error_msg'] = $error_msg;
         }
      }
   ?>
<?php include_once('extras/functions.php'); ?>
<?php include_once('layouts/header.php'); ?>
<!-- ==============================================
   Frelance Post Section
   =============================================== -->
<section class="jobpost">
   <div class="container">
      <div class="row">
         <div class="card-box-profile">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
               <div class="row bottom-sec">
                  <div class="col-lg-12">
                     <h3><?php echo $job['title'];?></h3>
                     <h4><?php echo getCategory($job["category_id"], $conn)["name"]; ?></h4>
                     <div class="col-lg-12">
                        <hr class="small-hr">
                     </div>
                     <div class="col-lg-2">
                        <h5> Posted </h5>
                        <p><?php echo time_elapsed_string($job["posted_on"]); ?></p>
                     </div>
                     <div class="col-lg-2">
                        <h5> Location </h5>
                        <p><i class="fa fa-map-marker"></i> Kenya</p>
                     </div>
                     <div class="col-lg-2">
                        <h5> Budget </h5>
                        <p>$<?php echo $job['budget'];?></p>
                     </div>
                     <div class="col-lg-2">
                        <h5> Duration </h5>
                        <p><?php echo $job['duration'];?></p>
                     </div>
                     <div class="col-lg-2">
                        <h5> Applicants </h5>
                        <p><?php echo getApplicants($job["job_id"], $conn);?></p>
                     </div>
                     <div class="col-lg-2">
                        <a href="<?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'){echo '#';}else{echo 'applyjob';}?>" style="<?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'){echo 'color: currentColor; cursor: not-allowed; opacity: 0.5; text-decoration: none;';}?>" class="kafe-btn kafe-btn-mint-small"><i class="fa fa-align-left"></i> Apply</a>
                     </div>
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- .col-lg-12 -->
         </div>
         <!-- .card-box-profile --> 
      </div>
      <!-- .row -->    
   </div>
   <!-- .container -->  
</section>
<!-- ==============================================
   Post Section
   =============================================== -->
<section class="profile-details">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
            <div class="card-box-profile-details">
               <div class="description-profile">
                  <ul class="tr-list resume-info">
                     <li>
                        <div class="icon">
                           <p class="tr-title"><i class="fa fa-black-tie" aria-hidden="true"></i> Apply For Job</p>
                        </div>
                        <div class="media-body">
                           <?php if(isset($_SESSION['error_msg'])):?>
                           <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['error_msg']; ?>               
                           </div>
                           <?php endif;?>
                           <?php if(isset($_SESSION['success_msg'])):?>
                           <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['success_msg']; ?>  
                           </div>
                           <?php endif;?>
                           <form method="POST" id="addform" action="">
                              <div class="form-group">   
                                 <label>Proposal Description</label>
                                 <textarea name="description" class="form-control" rows="5" placeholder="Provide a more detailed description of your proposal to get better offers."></textarea>
                              </div>
                              <button class="kafe-btn kafe-btn-mint-small full-width" name="submit">Apply</button>
                           </form>
                        </div>
                     </li>
                     <!-- /.career-objective-->       
                  </ul>
                  <!-- /.ul -->        
               </div>
               <!-- /.description-profile -->   
            </div>
            <!-- .card-box-profile-details -->
            <!--/ .work -->       
         </div>
         <!-- .col-lg-9 -->
         <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
            <div class="stats">
               <div class="row">
                  <h5>Requirements</h5>
                  <div class="col-sm-6">
                     <h6><?php echo $job['experience_level'];?></h6>
                     <p class="bottom">Required Level</p>
                  </div>
                  <div class="col-sm-6">
                     <h6>4.5+ Stars</h6>
                     <p class="bottom">Feedback Score</p>
                  </div>
               </div>
            </div>
            <!-- .stats -->   
            <div class="stats">
               <div class="row">
                  <h5>Activity</h5>
                  <div class="col-sm-4">
                     <h6>3</h6>
                     <p class="bottom">Proposals</p>
                  </div>
                  <div class="col-sm-4">
                     <h6>0</h6>
                     <p class="bottom">Interviewing</p>
                  </div>
                  <div class="col-sm-4">
                     <h6>0</h6>
                     <p class="bottom">Hired</p>
                  </div>
                  <p class="bottom"> Last viewed by client: <b> <?php echo time_elapsed_string($job["updated_on"]); ?> </b></p>
               </div>
            </div>
            <!-- .stats -->   
            <div class="card-box text-center">
               <div class="clearfix"></div>
               <div class="member-card">
                  <div class="thumb-xl member-thumb m-b-10 center-block">
                     <img src="assets/img/users/4.jpg" class="img-circle img-thumbnail" alt="profile-image">
                     <i class="fa fa-star member-star text-success" title="verified user"></i>
                  </div>
                  <h5><?php echo getAuthor($job["user_id"], $conn)["full_name"]?></h5>
                  <div class="row">
                     <div class="col-sm-6">
                        <h4 class="top"><?php echo userJobsCount($job['user_id'], $conn); ?></h4>
                        <p class="bottom">Jobs Posted</p>
                     </div>
                     <div class="col-sm-6">
                        <h4 class="top">$0.00</h4>
                        <p class="bottom">Spent</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- .col-lg-3 -->
      </div>
      <!-- .row -->    
   </div>
   <!-- .container -->
</section>
<?php include_once('layouts/footer.php'); ?>