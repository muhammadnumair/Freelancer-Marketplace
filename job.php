<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('layouts/header.php'); ?>
<?php
   if(isset($_GET['id'])){
      $job_id = $_GET['id'];
   }else{
      header('Location: work.php');
   }
   
   $sql = "SELECT * from tbl_jobs where job_id = '$job_id'";
   $retval = mysqli_query($conn, $sql);
   if(mysqli_num_rows($retval) == 0){
      print_r("404 Error");exit;
   }
   
   $job = mysqli_fetch_array($retval);
   // Calculate Time Elapsed
   $sqli = "SELECT * from tbl_proposals where job_id = '$job_id'";
   $proposals = mysqli_query($conn, $sqli);

   $assigbment = getJobAssignment($job_id, $conn);
   $hired = getJobAssignmentCount($job_id, $conn);
?>
<?php include_once('extras/functions.php'); ?>
<!-- ==============================================
   Frelance Post Section
   =============================================== -->
<section class="jobpost">
   <div class="container">
      <div class="row">
         <?php if(isset($_SESSION['error_msg'])): ?>
         <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;">
            <?php echo $_SESSION['error_msg']; ?>                                
         </div>
         <?php endif; ?>
         <?php unset($_SESSION['error_msg']); ?>
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
                        <a href="<?php echo 'applyjob?id='.$job_id;?>" class="kafe-btn kafe-btn-mint-small"><i class="fa fa-align-left"></i> Apply</a>
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
            <?php if($assigbment['job_status'] == "complete"): ?>
            <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;">
               <?php echo "Job is completed successfully"; ?>                                
            </div>
         <?php endif; ?>
            <div class="card-box-profile-details">
               <div class="description-profile">
                  <ul class="tr-list resume-info">
                     <li>
                        <div class="icon">
                           <p class="tr-title"><i class="fa fa-black-tie" aria-hidden="true"></i> Job Description</p>
                        </div>
                        <div class="media-body">
                           <?php echo $job['job_description']; ?>
                        </div>
                     </li>
                     <!-- /.career-objective-->       
                  </ul>
                  <!-- /.ul -->        
               </div>
               <!-- /.description-profile -->   
            </div>
            <!-- .card-box-profile-details -->  
            <div class="work">
               <div class="col-lg-12">
                  <div class="icon">
                     <p class="tr-title"><i class="fa fa-users" aria-hidden="true"></i> Applicants (<?php echo getApplicants($job["job_id"], $conn);?>)</p>
                  </div>
               </div>
               <?php if(getApplicants($job["job_id"], $conn) == 0):?>
                     <!-- <p class="tr-title">No Applicants For Now</p> -->
               <?php else:?>
                  <?php while($row = mysqli_fetch_array($proposals)):?>
                     <div class="job">
                        <div class="row bottom-sec">
                           <div class="col-lg-12">
                              <div class="col-lg-12">
                                 <hr class="small-hr">
                              </div>
                              <div class="col-lg-12">
                                 <div class="pull-left">
                                    <?php if(strlen(getProfilePhoto($row["user_id"], $conn)['profile_img']) > 2) : ?>
                                    <a href="freelancer.html">
                                    <img class="img-responsive" src="<?php echo getProfilePhoto($row['user_id'], $conn)['profile_img']; ?>" alt="Image">
                                    </a>
                                    <?php else: ?>
                                    <a href="freelancer.html">
                                    <img class="img-responsive" src="uploads/profiles/default.jpg" alt="Image">
                                    </a>
                                    <?php endif; ?>
                                 </div>
                                 <!-- /.col-lg-2 -->
                                 <h5><a href="#">  <?php echo getAuthor($row["user_id"], $conn)["full_name"]?> </a> </h5>
                                 <?php $country = getCountry(getAuthor($row["user_id"], $conn)["country_id"],$conn)["country_name"]; ?>
                                 <p><i class="fa fa-map-marker"></i> <?php if($country == ""){echo 'Not Specified'; }else{echo $country; }?></p>
                                 <p class="p-star"> 
                                    <i class="fa fa-star rating-star"></i>
                                    <i class="fa fa-star rating-star"></i>
                                    <i class="fa fa-star rating-star"></i>
                                    <i class="fa fa-star rating-star"></i>
                                    <i class="fa fa-star-o rating-star"></i>
                                 </p>
                              </div>
                           </div>
                           <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                        <div class="row mid-sec">
                           <div class="col-lg-12">
                              <div class="col-lg-12">
                                 <hr class="small-hr">
                                 <p><?php echo shorter($row["description"]); ?></p>
                                 <span class="label label-success">HTML 5</span>
                                 <span class="label label-success">CSS3</span>
                                 <span class="label label-success">PHP 5.4</span>
                                 <span class="label label-success">Mysql</span>
                                 <span class="label label-success">Bootstrap</span>
                              </div>
                              <!-- /.col-lg-12 -->
                           </div>
                           <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                     </div>
                  <?php endwhile;?>
               <?php endif; ?>
            </div>
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
                     <h6><?php echo $hired; ?></h6>
                     <p class="bottom">Hired</p>
                  </div>
                  <p class="bottom"> Last viewed by client: <b> <?php echo time_elapsed_string($job["updated_on"]); ?> </b></p>
               </div>
            </div>
            <!-- .stats -->   
            <div class="card-box text-center">
               <div class="clearfix"></div>
               <div class="member-card">
                  <?php if(strlen(getProfilePhoto($row["user_id"], $conn)['profile_img']) > 2) : ?>
                     <a href="profile.html">
                     <div class="thumb-xl member-thumb m-b-10 center-block">
                        <img src="<?php echo getProfilePhoto($job['user_id'], $conn)['profile_img']; ?>" class="img-circle img-thumbnail" alt="profile-image">
                        <i class="fa fa-star member-star text-success" title="verified user"></i>
                     </div>
                     </a>
                     <?php else: ?>
                     <a href="profile.html">
                     <div class="thumb-xl member-thumb m-b-10 center-block">
                        <img src="uploads/profiles/default.jpg" class="img-circle img-thumbnail" alt="profile-image">
                        <i class="fa fa-star member-star text-success" title="verified user"></i>
                     </div>
                     </a>
                  <?php endif; ?>
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