<?php include_once('extras/database.php'); ?>
<?php include_once('extras/functions.php'); ?>
<?php session_start(); ?>
<?php
   //print_r($total_pages);exit;
   if(isset($_GET['id'])){
      $proposal_id = $_GET['id'];
   }else{
      header('Location: proposals');
   }
   $proposal = getProposalDetail($proposal_id, $conn);
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
            <div class="button-box">
               <a href="proposals" class="kafe-btn kafe-btn-mint-small">Back to Proposals</a>
            </div>
            <!-- /.prop-info -->	  
            <div class="work-box">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                     <div class="col-lg-12 top-sec">
                        <h3><?php echo getJobDetail($proposal['job_id'], $conn)['title']; ?></h3>
                        <h4><?php echo getCategory(getJobDetail($proposal['job_id'], $conn)['category_id'], $conn)['name']; ?></h4>
                     </div>
                     <div class="col-lg-12">
                        <hr class="small-hr" />
                     </div>
                     <div class="col-lg-12 middle-sec">
                        <div class="col-lg-12">
                           <img src="assets/img/users/1.jpg" class="img-circle img-thumbnail" alt="Image"/>
                           <h3><a href="#"><?php echo getAuthor($proposal['user_id'], $conn)['full_name']; ?></a></h3>
                           <h4><span class="label label-mint">Freelancer</span></h4>
                        </div>
                        <!-- .col-lg-3 -->
                     </div>
                     <div class="col-lg-12">
                        <hr class="small-hr" />
                     </div>
                     <div class="col-lg-12 bottom-sec">
                        <div class="col-lg-6">
                           <h5> Freelancer Proposal </h5>
                           <p> $20/hr</p>
                        </div>
                        <div class="col-lg-6">
                           <div class="pull-right">
                              <h5> Job Type </h5>
                              <p>Hourly</p>
                           </div>
                        </div>
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- .col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- .work-box --> 
            <div class="work-box">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                     <div class="col-lg-12 top-sec">
                        <h3>Description</h3>
                        <p><?php echo $proposal['description']; ?></p>
                     </div>
                  </div>
                  <!-- .col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- .work-box --> 
         </div>
         <!-- /.col-md-9 -->	
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>