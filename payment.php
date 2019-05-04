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
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Payments paid for this Job</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Freelancer</th>
                              <th>Name</th>
                              <th>Type of Payment</th>
                              <th>Payment</th>
                              <th>Complete</th>
                              <th>Date Paid</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image"/>
                                 <a href="workroom.html">Anna Morgan</a>
                              </td>
                              <td>Research</td>
                              <td><span class="label label-mint">Milestones</span></td>
                              <td>$60</td>
                              <td><span class="label label-mint">Complete</span></td>
                              <td>31th July 2018</td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image"/>
                                 <a href="workroom.html">Anna Morgan</a>
                              </td>
                              <td>Time 00:47:50</td>
                              <td><span class="label label-mint">Timesheets</span></td>
                              <td>$100</td>
                              <td><span class="label label-mint">Complete</span></td>
                              <td>31th July 2018</td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image"/>
                                 <a href="workroom.html">Anna Morgan</a>
                              </td>
                              <td>Design</td>
                              <td><span class="label label-mint">Milestones</span></td>
                              <td>$250</td>
                              <td><span class="label label-mint">Complete</span></td>
                              <td>31th July 2018</td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image"/>
                                 <a href="workroom.html">Anna Morgan</a>
                              </td>
                              <td>Time 01:50:24</td>
                              <td><span class="label label-mint">Timesheets</span></td>
                              <td>$2000</td>
                              <td><span class="label label-mint">Complete</span></td>
                              <td>31th July 2018</td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Freelancer</th>
                              <th>Name</th>
                              <th>Type of Payment</th>
                              <th>Payment</th>
                              <th>Complete</th>
                              <th>Date Paid</th>
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