<?php include_once('extras/database.php'); ?>
<?php
    session_start();
    unset($_SESSION['error_msg']);
    unset($_SESSION['error']);

    if(isset($_POST['submit'])){
        $error = 0;
        $error_msg = "";
        $title = $_POST['title'];
        $category = $_POST['category'];
        $country = $_POST['country'];
        $payment_procedure = $_POST['payment_procedure'];
        $budget = $_POST['budget'];
        $experience_level = $_POST['experience_level'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];

        if($title != "" && $description != "" && $budget != ""){
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO tbl_jobs (title, category_id, country_id, user_id, payment_procedure, budget, experience_level, duration, job_description) VALUES ('$title', '1', '2', '$user_id', '$payment_procedure', '$budget', '$experience_level', '$duration', '$description')";
            //print_r($sql);exit;
                   //print_r($sql);exit;
            if ($conn->query($sql) === TRUE) {
                header('Location: jobs.php');
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
                  <h4>Add Job</h4>
               </div>
               <?php if(isset($_SESSION['error_msg'])):?>
               <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['error_msg']; ?>               
               </div>
               <?php endif;?>
               <form method="POST" id="addform" action="">
                  <div class="form-group">	
                     <label>Title</label>
                     <input type="text" name="title" class="form-control" placeholder="Title" value=""/>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control" name="category">
                           <option value="">Admin Support</option>
                           <option value="">Web, Software &amp; IT</option>
                           <option value="">Design, Art &amp; Multimedia</option>
                           <option value="">Writing &amp; Translation</option>
                           <option value="">Management &amp; Finance</option>
                           <option value="">Sales &amp; Marketing</option>
                           <option value="">Engineering &amp; Architecture</option>
                           <option value="">Legal</option>
                           <option value="">Other</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 job-sec">
                     <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="country">
                           <option value="">USA</option>
                           <option value="">UK</option>
                           <option value="">Russia</option>
                           <option value="">Kenya</option>
                        </select>
                     </div>
                  </div>
                  
                  <div class="form-group">
                        <label>How would you like to pay?</label>
                        <select class="form-control" name="payment_procedure">
                           <option value="By Hour">By Hour</option>
                           <option value="Fixed Cost">Fixed Cost</option>
                        </select>
                  </div>

                  <div class="form-group">	
                     <label>Budget</label>
                     <input type="text" name="budget" class="form-control" placeholder="Budget" value=""/>
                  </div>

                  <div class="form-group">
                        <label>Desired Experience Level</label>
                        <select class="form-control" name="experience_level">
                           <option value="Entry Level">$ Entry Level</option>
                           <option value="Intermediate">$$ Intermediate</option>
                           <option value="Expert">$$$ Expert</option>
                        </select>
                  </div>
                  
                  <div class="form-group">
                        <label>Job Duration</label>
                        <select class="form-control" name="duration">
                           <option value="Not Sure">Not Sure</option>
                           <option value="6+ Months">6+ Months</option>
                           <option value="3 to 6 Months">3 to 6 Months</option>
                           <option value="1 to 3 Months">1 to 3 Months</option>
                           <option value="Less than 1 Month">Less than 1 Month</option>
                           <option value="Less than 1 Week">Less than 1 Week</option>
                        </select>
                  </div>

                  <div class="form-group">	
                     <label>Description</label>
                     <textarea name="description" class="form-control" rows="5" placeholder="Provide a more detailed description of your job to get better proposals."></textarea>
                  </div>
                  <button class="kafe-btn kafe-btn-mint-small full-width" name="submit">Submit</button>
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