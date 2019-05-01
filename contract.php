<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php 
   $user_id = $_SESSION['user_id'];
   $sql = "SELECT * FROM tbl_jobs_assigned where client_id = '$user_id'";
   $retval = mysqli_query($conn, $sql);
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
                           <?php while($row = mysqli_fetch_array($retval)): ?>
                           <tr>
                              <td>
                                 <img src="assets/img/users/1.jpg" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image" />
                                 <a href="company.html"><?php echo getAuthor($row['freelancer_id'], $conn)['full_name']; ?></a>
                              </td>
                              <td><a href="job?id=<?php echo getJobDetail($row['job_id'], $conn)['id']; ?>"><?php echo getJobDetail($row['job_id'], $conn)['title']; ?></a></td>
                              <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                           </tr>
                           <?php endwhile;?>
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