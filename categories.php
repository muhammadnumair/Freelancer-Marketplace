<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   if(isset($_POST['submit'])){
   	  $name=$_POST['name'];
        $icon = $_POST['icon'];
        $description = $_POST['description'];
   
      $sql = "INSERT INTO `tbl_categories`(`name`, `description`, `icon`) VALUES ('$name', '$description', '$icon')";
      mysqli_query($conn, $sql);
   }
   
   if(isset($_POST['delete'])){
      $id = $_POST['id'];
      $sql = "DELETE FROM tbl_categories where category_id = '$id'";
      mysqli_query($conn, $sql);
   }

   $sql = "SELECT * FROM tbl_categories";
   $categories = mysqli_query($conn, $sql);
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
               <a href="#addm" class="kafe-btn kafe-btn-mint-small" data-toggle="modal">Add Category</a>
            </div>

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
                              <th>Name</th>
                              <th>Description</th>
                              <th>Icon</th>
                              <th>Actions</th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while($row = mysqli_fetch_array($categories)):?>
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><span class="label label-danger"><?php echo $row['description']; ?></span></td>
                              <td><span class="label label-mint"><?php echo $row['icon']; ?></span></td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                                 <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" value="<?php echo $row['category_id']; ?>" name="id">
                                    <button style="font-size: 16px;" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" name="delete"><span class="fa fa-trash"></button>
                                 </form>
                              </td>
                           </tr>
                           <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Icon</th>
                              <th>Actions</th>
                              <th></th>
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
                  <label>Name</label>
                  <input type="text" id="name" class="form-control" placeholder="Name" value="" name="name" />
               </div>

               <div class="form-group">	
                  <label>Description</label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description"></textarea>
               </div>

               <div class="form-group">   
                  <label>Category Icon Code</label>
                  <input type="text" id="icon" class="form-control" placeholder="Category Icon (eg: fa fa-home)" value="" name="icon" />
                  <p style="font-size: 14px; font-family: 'Abhaya Libre', serif;">You can get icon code from <b><a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a></b></p>
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