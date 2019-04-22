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
               <p>Look for work here <a href="#">Home</a></p>
            </div>
            <!-- /.prop-info -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Contracts</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Freelancer</th>
                              <th>Job Title</th>
                              <th>Workroom</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image" />
                                 <a href="company.html">Anna Morgan</a>
                              </td>
                              <td><a href="workroom.html">I need a designer to design a logo & questionnaire for a Nutrition Company</a></td>
                              <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/3.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image" />
                                 <a href="company.html">Benjamin Robinson</a>
                              </td>
                              <td><a href="workroom.html">Professional writer required</a></td>
                              <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/4.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image" />
                                 <a href="company.html">Sean Coleman</a>
                              </td>
                              <td><a href="workroom.html">Content Writers Needed</a></td>
                              <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/5.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image" />
                                 <a href="company.html">Vanessa Wells</a>
                              </td>
                              <td><a href="workroom.html">Website Design</a></td>
                              <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Client</th>
                              <th>Job Title</th>
                              <th>Freelancer</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.table-responsive -->
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col-md-9 -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>