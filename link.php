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

            <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
            <div class="button-box">
               <a href="#addm" class="kafe-btn kafe-btn-mint-small" data-toggle="modal">Add Link</a>
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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        	<?php while($row = mysqli_fetch_array($links)):?>
                           <tr>
                              <td><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['title']; ?></a></td>
                              <td><?php echo $row['description']; ?></td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                       	<?php endwhile; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Title</th>
                              <th>Description</th>
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
            <h4 class="modal-title">Add Link</h4>
         </div>
         <div class="modal-body">
            <form method="post" action="" id="addform">
               <div class="form-group">	
                  <label>Title</label>
                  <input type="text"  name="title" class="form-control" placeholder="Title" value=""/>
               </div>
               <div class="form-group">	
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="5" placeholder="Description"></textarea>
               </div>
               <div class="form-group">	
                  <label>Link</label>
                  <input type="text" class="form-control" name="link" placeholder="http://" value=""/>
               </div>
               <div class="modal-footer">
                  <input type="hidden" name="token" value="d1f6244156c91a1d77d05e263902a827" />
                  <button type="button" class="kafe-btn kafe-btn-default-small" data-dismiss="modal">Close</button>
                  <button onclick="addmilestone()" class="kafe-btn kafe-btn-mint-small" name="submit">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include_once('layouts/footer.php'); ?>