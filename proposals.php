<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('layouts/header.php'); ?>
<?php
   //print_r($total_pages);exit;
   $user_id = $_SESSION['user_id'];
   if(isset($_GET['job'])){
      $job_id = $_GET['job'];
      $sql = "SELECT * FROM `tbl_proposals` where job_id = '$job_id'";
   }else{
      $sql = "SELECT * FROM `tbl_proposals` where job_id in (SELECT job_id FROM tbl_jobs WHERE user_id = '$user_id')";
   }
   $retval = mysqli_query($conn, $sql);
?>
<?php include_once('extras/functions.php'); ?>
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
                  <h3 class="box-title">Proposals from Freelancers</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Freelancer</th>
                              <th>Job Title</th>
                              <th>Assigned</th>
                              <th>Proposal</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_array($retval)):?>
                              <tr>
                                 <td>
                                    <img src="assets/img/users/10.jpg" class="img-responsive img-circle pull-left" width="45" height="45" alt="Image"/>
                                    <a href="profile.html"><?php echo getAuthor($row['user_id'], $conn)['full_name']; ?></a>
                                 </td>
                                 <td><a href="job?id=<?php echo $row['job_id']; ?>"><?php echo getJobDetail($row['job_id'], $conn)['title']; ?></a></td>
                                 <td><span class="label label-mint"><?php echo $row['status']; ?></span></td>
                                 <td><a href="viewproposal?id=<?php echo $row['id'];?>" class="kafe-btn kafe-btn-mint-small"> View Proposal</a></td>
                                 <?php if($row['status'] == "Assigned"): ?>
                                 <td><a href="workroom.html" class="kafe-btn kafe-btn-mint-small"> Go to Workroom</a></td>
                                 <?php else:?>
                                 <td>
                                 <a href="extras/assign_job?proposal_id=<?php echo $row['id'];?>&&job_id=<?php echo $row['job_id'];?>&&freelancer_id=<?php echo $row['user_id'];?>&&client_id=<?php echo $user_id;?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Assign the Job"><span class="fa fa-check"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                                 </td>
                                 <?php endif;?>
                              </tr>
                           <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Freelancer</th>
                              <th>Job Title</th>
                              <th>Assigned</th>
                              <th>Proposal</th>
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