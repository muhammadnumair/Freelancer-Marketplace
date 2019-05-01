<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   if(isset($_GET['job'])){
      $job_id = $_GET['job'];
   }else{
      header('Location: contract');
   }


   $sql = "SELECT * FROM tbl_jobs_assigned WHERE job_id = '$job_id'";
   $assigned_job_data = mysqli_query($conn, $sql);
   $assigned_job = mysqli_fetch_array($assigned_job_data);

   $job = getJobDetail($assigned_job['job_id'], $conn);
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
            <!-- /.prop-info -->		  			
            <div class="work-box">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                     <div class="col-lg-12 top-sec">
                        <h3><?php echo $job['title'];?></h3>
                        <h4><?php echo getCategory($job['category_id'], $conn)['name']; ?></h4>
                     </div>
                     <div class="col-lg-12">
                        <hr class="small-hr" />
                     </div>
                     <div class="col-lg-12 middle-sec">
                        <div class="col-lg-8">
                           <img src="assets/img/users/1.jpg" class="img-circle img-thumbnail" alt="Image"/>
                           <h3><a href="#"><?php echo getAuthor($assigned_job['freelancer_id'], $conn)['full_name']?></a></h3>
                           <h4><span class="label label-mint">Freelancer</span></h4>
                        </div>
                        <!-- .col-lg-3 -->
                        <div class="col-lg-4">
                           <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
                           <a href='extras/complete_job?job=<?php echo $job_id;?>' class="kafe-btn kafe-btn-mint-small"> Is job completed? Click here.</a>
                           <?php endif; ?>
                        </div>
                        <!-- .col-lg-9 -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- .col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- .work-box --> 
            <div class="conversation-box">
               <div class="conversation-header">
                  <div class="user-message-details">
                     <div class="user-message-img">
                        <img src="assets/img/users/1.jpg" class="img-responsive img-circle" alt="">
                     </div>
                     <div class="user-message-info">
                        <h4>Anna Morgan</h4>
                        <p>Online</p>
                     </div>
                     <!--/ user-message-info -->
                  </div>
                  <!--/ user-message-details -->
               </div>
               <!--/ conversation-header -->
               <div class="conversation-container">
                  <div class="convo-box pull-right">
                     <div class="convo-area">
                        <div class="convo-message">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                        </div>
                        <!--/ convo-message-->
                        <span>Sat, Aug 23, 1:08 PM</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/2.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
                  <div class="convo-box convo-left">
                     <div class="convo-area convo-left">
                        <div class="convo-message">
                           <p>Cras ultricies ligula.</p>
                        </div>
                        <!--/ convo-message-->
                        <span>5 minutes ago</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
                  <div class="convo-box pull-right">
                     <div class="convo-area">
                        <div class="convo-message">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                        </div>
                        <!--/ convo-message-->
                        <span>Sat, Aug 23, 1:08 PM</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/2.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
                  <div class="convo-box convo-left">
                     <div class="convo-area convo-left">
                        <div class="convo-message">
                           <p>Lorem ipsum dolor sit amet</p>
                        </div>
                        <!--/ convo-message-->
                        <span>2 minutes ago</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
                  <div class="convo-box pull-right">
                     <div class="convo-area">
                        <div class="convo-message">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                        </div>
                        <!--/ convo-message-->
                        <span>Sat, Aug 23, 1:08 PM</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/2.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
                  <div class="convo-box convo-left">
                     <div class="convo-area convo-left">
                        <div class="convo-message">
                           <p>Typing...</p>
                        </div>
                        <!--/ convo-message-->
                        <span>2 minutes ago</span>
                     </div>
                     <!--/ convo-area -->
                     <div class="convo-img">
                        <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">
                     </div>
                     <!--/ convo-img -->
                  </div>
                  <!--/ convo-box -->
               </div>
               <!--/ conversation-container -->
               <div class="type_messages">
                  <div class="input-field">
                     <textarea placeholder="Type something here..."></textarea>
                     <ul class="imoji">
                        <li><a href="#" class="kafe-btn kafe-btn-mint-small">Send</a></li>
                     </ul>
                     <!--/ imoji -->
                  </div>
                  <!--/ input-field -->
               </div>
               <!--/ type_messages -->
            </div>
            <!--main-conversation-box end-->		
         </div>
         <!-- /.col-md-9 -->	
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>