<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('extras/functions.php'); ?>
<?php
   	$user_id = $_SESSION['user_id'];
	if(getProfilePhoto($user_id, $conn)){
		//print_r(getProfilePhoto($user_id, $conn)['profile_img']); exit;
	}

   unset($_SESSION['success_msg']);
   unset($_SESSION['error_msg']);
   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
   	$target_dir = "uploads/profiles/";
   	$target_file = $target_dir . date("h-i-s", time()). basename($_FILES["fileToUpload"]["name"]);
   	$uploadOk = 1;
   	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       if($check !== false) {
           $uploadOk = 1;
       } else {
           $_SESSION['error_msg'] = "File is not an image";
           $uploadOk = 0;
       }
   
       // Check file size
   	if ($_FILES["fileToUpload"]["size"] > 20000) {
   		$_SESSION['error_msg'] = "Sorry, your file is too large";
   	    $uploadOk = 0;
   	}
   	// Allow certain file formats
   	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   	&& $imageFileType != "gif" ) {
   		$_SESSION['error_msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   	    $uploadOk = 0;
   	}
   
   	// Check if $uploadOk is set to 0 by an error
   	if ($uploadOk == 0) {
   		$_SESSION['error_msg'] = "Sorry, your image was not uploaded. Try Again";
   	// if everything is ok, try to upload file
   	} else {
   	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   	    	$_SESSION['success_msg'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
   	    } else {
   	    	$_SESSION['error_msg'] = "Sorry, there was an error uploading your file.";
   	    }
   	}
   	$sql = "UPDATE `tbl_user` SET `profile_img`= '$target_file' WHERE user_id = '$user_id'";
   	mysqli_query($conn, $sql);
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
         	<?php if(isset($_SESSION['error_msg'])): ?>
            <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;">
               <?php echo $_SESSION['error_msg']; ?>                                  
            </div>
        	<?php endif; ?>
        	<?php if(isset($_SESSION['success_msg'])): ?>
            <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;">
              	<?php echo $_SESSION['success_msg']; ?>                                      
            </div>
        	<?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
               <div class="button-box">
                  <div class="change-photo">
                     <div class="user-image">
                     	<?php if(strlen(getProfilePhoto($user_id, $conn)['profile_img']) > 2) : ?>
                        <img src="<?php echo getProfilePhoto($user_id, $conn)['profile_img']; ?>" alt="Image" class="img-responsive">
                    	<?php else: ?>
						<img src="uploads/profiles/default.jpg" alt="Image" class="img-responsive">
                    	<?php endif; ?>
                     </div>
                     <div class="upload-photo">
                        <label class="kafe-btn kafe-btn-danger-small" for="upload-photo">
                        <input id="upload-photo" type="file" name="fileToUpload">Change Photo
                        </label>
                        <h4 class="max-size">Max 20 MB</h4>
                     </div>
                  </div>
                  <!-- /.change-photo -->
                  <div class="box-footer">
                     <button type="submit" class="kafe-btn kafe-btn-mint full-width" name="submit">Submit</button>
                  </div>
               </div>
               <!-- /.prop-info -->	
            </form>
         </div>
         <!-- /.col-md-9 -->	
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<?php include_once('layouts/footer.php'); ?>