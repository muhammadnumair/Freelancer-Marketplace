<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
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
               <div class="row">
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <h1>$0.00</h1>
                           <span>Total Amount</span>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <h1>0</h1>
                           <span>Contracts</span>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <h1>0:00:00</h1>
                           <span>Total Logged</span>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
                  <div class="col-sm-3">
                     <div class="fun-fact">
                        <div class="media-body">
                           <h1>0</h1>
                           <span>Total Milestones</span>
                        </div>
                     </div>
                     <!-- /.fun-fact -->
                  </div>
                  <!-- /.col-sm-4 -->
               </div>
               <!-- ./row -->
            </div>
            <!-- /.dashboard-info -->
            <div class="prop-info text-center">
               <i class="fa fa-align-left fa-5x"></i>
               <h3>You have no recent contracts.</h3>
               <p>Look for work here <a href="work">Home</a></p>
            </div>
            <!-- /.prop-info -->
         </div>
         <!-- /.col-md-9 -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>