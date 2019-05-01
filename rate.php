<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   if(isset($_GET['job'])){
      $job_id = $_GET['job'];
   }else{
      header('Location: contract');
   }
   
   if(isset($_POST['submit'])){
   	  $title=$_POST['title'];
      $link = $_POST['link'];
      $description = $_POST['description'];
   
      $sql = "INSERT INTO `tbl_job_links`(`job_id`, `title`, `description`, `link`) VALUES ('$job_id','$title','$description','$link')";
   
      mysqli_query($conn, $sql);
   }
   
   $sql = "SELECT * FROM tbl_job_links WHERE job_id = '$job_id'";
   $links = mysqli_query($conn, $sql);
   ?>
<?php include_once('layouts/header.php'); ?>
<!-- ==============================================
   Dashboard Section
   =============================================== -->
<section class="dashboard section-padding">
   <div class="container">
      <div class="row">
         <?php include_once('layouts/customer_dashboard_sidebar.php'); ?>
         <div class="col-sm-8 col-md-9">
            <?php include_once('layouts/workroom_top_nav.php'); ?>		  
            <div class="rate-box">
               <form method="post" id="addform">
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     Skills
                  </p>
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     Quality of Work
                  </p>
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-half-full rating-star"></i>
                     Availability
                  </p>
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-half-full rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     Adherence to Schedule
                  </p>
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-half-full rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     Communication
                  </p>
                  <p class="p-star"> 
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star rating-star"></i>
                     <i class="fa fa-star-half-full rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     <i class="fa fa-star-o rating-star"></i>
                     Co-operation
                  </p>
                  <br/>
                  <h4>Job success score (Click to change the value)</h4>
                  <input class="knob" data-width="75" data-angleOffset="40" data-linecap="round" data-fgColor="#00C4CF" value="40" style=""/>  
                  <div class="margin-space"></div>
                  <div class="form-group">	
                     <label>Share your experience working with this freelancer</label>
                     <textarea class="form-control" rows="5" placeholder="Description"></textarea>
                  </div>
                  <button class="kafe-btn kafe-btn-mint-small full-width">Submit</button>
               </form>
            </div>
            <!-- /.rate-box -->		  			
         </div>
         <!-- /.col-md-9 -->	
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>