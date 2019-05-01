<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php include_once('layouts/header.php'); ?>
<!-- ==============================================
   Dashboard Section
   =============================================== -->
<section class="dashboard section-padding">
   <div class="container">
      <div class="row">
         <?php include_once('layouts/customer_dashboard_sidebar.php'); ?>
         <div class="col-sm-8 col-md-9">
            <div class="dashboard-info">
               <?php if(getAuthor($user_id, $conn)["user_role"] == 'admin'): ?>
               <div class="row">
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <?php if(getAuthor($user_id, $conn)["user_role"] == 'admin'): ?>
                           <h1><?php echo sprintf('%02d', getFreelancersCount($conn)); ?></h1>
                           <span>Freelancers</span>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <?php if(getAuthor($user_id, $conn)["user_role"] == 'admin'): ?>
                           <h1><?php echo sprintf('%02d', getCustomersCount($conn)); ?></h1>
                           <span>Clients</span>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <?php if(getAuthor($user_id, $conn)["user_role"] == 'admin'): ?>
                           <h1><?php echo sprintf('%02d', getJobsCount($conn)); ?></h1>
                           <span>Jobs Posted</span>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <h1><?php echo sprintf('%02d', getProposalsCount($conn)); ?></h1>
                           <span>Proposal Submissions</span>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
               </div>
               <?php endif;?>
               <!-- ./row -->
            </div>
            <!-- /.dashboard-info -->
            <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer' || getAuthor($user_id, $conn)["user_role"] == 'freelancer'): ?>
            <div class="prop-info text-center">
               <i class="fa fa-align-left fa-5x"></i>
               <h3>You have no recent contracts.</h3>
               <p>Look for work here <a href="work">Home</a></p>
            </div>
            <?php endif; ?>
            <!-- /.prop-info -->
         </div>
         <!-- /.col-md-9 -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>