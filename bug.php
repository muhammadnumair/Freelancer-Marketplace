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
        $priority = $_POST['priority'];
        $severity = $_POST['severity'];
        $description = $_POST['description'];
   
      $sql = "INSERT INTO `tbl_job_bugs`(`title`, `bug_priority`, `bug_severity`, `description`, `job_id`, `bug_status`) VALUES ('$title', '$priority', '$severity', '$description', '$job_id', 'Not Fixed')";
      mysqli_query($conn, $sql);
   }
   
   $sql = "SELECT * FROM tbl_job_bugs WHERE job_id = '$job_id'";
   $bugs = mysqli_query($conn, $sql);
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

            <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
            <div class="button-box">
               <a href="#addm" class="kafe-btn kafe-btn-mint-small" data-toggle="modal">Add Bug</a>
            </div>
            <?php endif; ?>
            <!-- /.prop-info -->		  
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Links</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Priority</th>
                              <th>Severity</th>
                              <th>Fixed</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_array($bugs)):?>
                           <tr>
                              <td>1</td>
                              <td><?php echo $row['title']; ?></td>
                              <td><span class="label label-mint"><?php echo $row['bug_priority']; ?></span></td>
                              <td><span class="label label-danger"><?php echo $row['bug_severity']; ?></span></td>
                              <td><span class="label label-mint"><?php echo $row['bug_status']; ?></span></td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                           <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Reporter</th>
                              <th>Title</th>
                              <th>Priority</th>
                              <th>Severity</th>
                              <th>Fixed</th>
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
<!-- Modal HTML -->
<div id="addm" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Bug</h4>
         </div>
         <div class="modal-body">
            <form method="post" id="addform" action="">
               <div class="form-group">	
                  <label>Title</label>
                  <input type="text" id="name" class="form-control" placeholder="Title" value="" name="title" />
               </div>
               <div class="form-group">
                  <label>Priority</label>
                  <select class="form-control" name="priority">
                     <option value="Low">Low</option>
                     <option value="Medium">Medium</option>
                     <option value="High">High</option>
                  </select>
               </div>
               <div class="form-group">
                  <label>Severity</label>
                  <select class="form-control" name="severity">
                     <option value="Minor">Minor</option>
                     <option value="Major">Major</option>
                     <option value="Show Stopper">Show Stopper</option>
                     <option value="Must be Fixed">Must be Fixed</option>
                  </select>
               </div>
               <div class="form-group">	
                  <label>Description</label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description"></textarea>
               </div>
               <div class="modal-footer">
                  <button type="button" class="kafe-btn kafe-btn-default-small" data-dismiss="modal">Close</button>
                  <button onclick="addmilestone()"  name="submit" class="kafe-btn kafe-btn-mint-small">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include_once('layouts/footer.php'); ?>