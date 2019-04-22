<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   unset($_SESSION['error_msg']);
   unset($_SESSION['success_msg']);
   unset($_SESSION['error']); 
   if(isset($_POST['submit'])){
      $error = 0;
      $error_msg = "";
      $current_password = $_POST['prev_pass'];
      $new_password = $_POST['new_pass'];
      $confirm_password = $_POST['confirm_pass'];
      if($current_password != "" && $new_password != "" && $confirm_password != ""){
         $user_id = $_SESSION['user_id'];

         if($new_password != $confirm_password){
            $error = 1;
            $error_msg = "Password Do Not Match! New Password & Confirm Password Must Same";
         }

         //print_r(getAuthor($user_id, $conn)['password'] == $current_password); exit;
         if(getAuthor($user_id, $conn)['password'] != $current_password){
            $error = 1;
            $error_msg = "Your Current Password Is Not Correct";
         }

         //print_r(getAuthor($user_id, $conn)['password']);exit;

         if($error == 0){
            $sql = "UPDATE `tbl_user` SET `password`= '$new_password' WHERE user_id = '$user_id'";
            if ($conn->query($sql) === TRUE) {
               $_SESSION['success_msg'] = "Password Changed Successfully";
            }
         }

      }else{
            $error = 1;
            $error_msg = "Please Fill In All Required Fields";
      }

      if($error == 1){
         $_SESSION['error'] = true;
         $_SESSION['error_msg'] = $error_msg;
      }

   }
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
            <div class="job-box">
               <div class="job-header">
                  <h4>Change your Password</h4>
               </div>
               <?php if(isset($_SESSION['error_msg'])):?>
               <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['error_msg']; ?>               
               </div>
               <?php endif;?>
               <?php if(isset($_SESSION['success_msg'])):?>
               <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['success_msg']; ?>               
               </div>
               <?php endif;?>
               <form method="POST" id="addform" action="">
                  <div class="form-group">	
                     <label>Current Password</label>
                     <input name="prev_pass" type="text" class="form-control" placeholder="Current Password" value=""/>
                  </div>
                  <div class="form-group">	
                     <label>New Password</label>
                     <input name="new_pass" type="text" class="form-control" placeholder="New Password" value=""/>
                  </div>
                  <div class="form-group">	
                     <label>Confirm Password</label>
                     <input name="confirm_pass" type="text" class="form-control" placeholder="Confirm Password" value=""/>
                  </div>
                  <button class="kafe-btn kafe-btn-mint-small full-width" type="submit" name="submit">Submit</button>
               </form>
            </div>
            <!-- /.job-box -->		
         </div>
         <!-- /.col-md-9 -->	
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>