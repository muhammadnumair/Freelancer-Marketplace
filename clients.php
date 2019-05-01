<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   if(isset($_POST['delete'])){
      $id = $_POST['id'];
      $sql = "DELETE FROM tbl_user where user_id = '$id'";
      mysqli_query($conn, $sql);
   }

   $sql = "SELECT * FROM tbl_user where user_role = 'customer'";
   $Freelancers = mysqli_query($conn, $sql);
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
            <!-- /.prop-info -->		  
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Customers</h3>
                  <a href="reports/clients.php" class="kafe-btn kafe-btn-mint-small" target="_blank">Generate PDF</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Country</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1; ?>
                           <?php while($row = mysqli_fetch_array($Freelancers)):?>
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row['full_name']; ?></td>
                              <td><span class="label label-danger"><?php echo $row['email']; ?></span></td>
                              <td><span class="label label-mint"><?php echo $row['phone']; ?></span></td>
                              <td><?php echo getCountry($row['country_id'], $conn)['country_name']; ?></td>
                              <td>
                                 <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
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
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Country</th>
                              <th>Actions</th>
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