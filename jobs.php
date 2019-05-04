<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php 
   $user_id = $_SESSION['user_id'];
   $sql = "SELECT * FROM tbl_jobs where user_id = '$user_id'";
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
                  <h3 class="box-title">Jobs Posted</h3>
                  <a href="reports/jobs.php" class="kafe-btn kafe-btn-mint-small" target="_blank">Generate PDF</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Job Title</th>
                              <th>Freelancer</th>
                              <th>Proposals</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_array($retval)): ?>
                           <tr>
                              <td><a href="job?id=<?php echo $row['job_id']; ?>"><?php echo $row['title']; ?></a></td>
                              <?php if(getJobAssignment($row['job_id'], $conn)):?>
                              <td>
                                 <img src="<?php echo getAuthor(getJobAssignment($row['job_id'], $conn)['freelancer_id'], $conn)['profile_img']; ?>" class="img-responsive img-circle pull-left" width="50" height="50" alt="Image"/>
                                 <a href="profile.html"><?php echo getAuthor(getJobAssignment($row['job_id'], $conn)['freelancer_id'], $conn)['full_name']; ?></a>
                              </td>
                              <?php else: ?>
                                 <td><span class="label label-mint">Not Assigned</span></td>
                              <?php endif;?>
                              <td><a href="proposals?job=<?php echo $row['job_id'];?>" class="kafe-btn kafe-btn-mint-small"> View Proposals</a></td>
                              <?php if(getJobAssignmentCount($row['job_id'], $conn) > 0):?>
                              <td><a href="workroom?job=<?php echo $row['job_id']; ?>" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                              <?php else: ?>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Hide from Public"><span class="fa fa-lock"></span></a>
                              </td>
                              <?php endif;?>
                           </tr>
                        <?php endwhile;?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Job Title</th>
                              <th>Freelancer</th>
                              <th>Proposals</th>
                              <th>Action</th>
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