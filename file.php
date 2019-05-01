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
               <a href="#addm" class="kafe-btn kafe-btn-mint-small" data-toggle="modal">Add File</a>
            </div>
            <?php endif; ?>
            <!-- /.prop-info -->		  
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Files</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Preview</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Type</th>
                              <th>Size</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><i class="fa fa-file-pdf-o fa-5x"></i></td>
                              <td>PDF File</td>
                              <td>This is a PDF file you requested for this project</td>
                              <td><span class="label label-mint">pdf</span></td>
                              <td>43 KB</td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Download"><span class="fa fa-download"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                           <tr>
                              <td><i class="fa fa-file-image-o fa-5x"></i></td>
                              <td>Image File</td>
                              <td>This is a Image file you requested for this project</td>
                              <td><span class="label label-mint">img</span></td>
                              <td>110 KB</td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Download"><span class="fa fa-download"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                           <tr>
                              <td><i class="fa fa-file-word-o fa-5x"></i></td>
                              <td>Word Document</td>
                              <td>This is a Word document you requested for this project</td>
                              <td><span class="label label-mint">word</span></td>
                              <td>240 KB</td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Download"><span class="fa fa-download"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                           <tr>
                              <td><i class="fa fa-file-zip-o fa-5x"></i></td>
                              <td>Zip File</td>
                              <td>This is the Zip for the whole project.</td>
                              <td><span class="label label-mint">zip</span></td>
                              <td>840 KB</td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Download"><span class="fa fa-download"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                              </td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Preview</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Type</th>
                              <th>Size</th>
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
            <h4 class="modal-title">Add File</h4>
         </div>
         <div class="modal-body">
            <form method="post" id="addform">
               <div class="form-group">	
                  <label>Title</label>
                  <input type="text" id="name" class="form-control" placeholder="Title" value=""/>
               </div>
               <div class="form-group">	
                  <label>Description</label>
                  <textarea id="description" class="form-control" rows="5" placeholder="Description"></textarea>
               </div>
               <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
               <label for="file-1" class="label-file"> <span>Choose a file&hellip;</span></label>
               <br/>
               <div class="modal-footer">
                  <input type="hidden" name="token" value="d1f6244156c91a1d77d05e263902a827" />
                  <button type="button" class="kafe-btn kafe-btn-default-small" data-dismiss="modal">Close</button>
                  <button onclick="addmilestone()"  class="kafe-btn kafe-btn-mint-small">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include_once('layouts/footer.php'); ?>