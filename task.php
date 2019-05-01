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
      $name = $_POST['name'];
      $milestone = $_POST['milestone'];
      $description = $_POST['description'];
      $budget = $_POST['budget'];
      $start_time = strtotime($_POST['start_date']);
      $start_date = date('Y-m-d',$start_time);
   
      $end_time = strtotime($_POST['end_date']);
      $end_date = date('Y-m-d',$end_time);
   
      $sql = "INSERT INTO `tbl_job_tasks`(`job_id`, `name`, `milestone_id`, `description`,`budget`, `start_date`, `end_date`) VALUES ('$job_id', '$name', '$milestone', '$description', '$budget', '$start_date', '$end_date')";
   
      mysqli_query($conn, $sql);
   }
   
   $sql = "SELECT * FROM tbl_job_milestone WHERE job_id = '$job_id'";
   $milestones = mysqli_query($conn, $sql);

   $sql = "SELECT * FROM tbl_job_tasks WHERE job_id = '$job_id'";
   $tasks = mysqli_query($conn, $sql);
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
            <!-- /.pro-nav -->
            <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
            <div class="button-box">
               <a href="#addm" class="kafe-btn kafe-btn-mint-small" data-toggle="modal">Add Task</a>
            </div>
            <?php endif; ?>
            <!-- /.prop-info -->		  
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Tasks</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Milestone</th>
                              <th>Date to start</th>
                              <th>Date to end</th>
                              <th>Progress</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_array($tasks)):?>
                           <tr>
                              <td><?php echo $row['name'];?></td>
                              <td><?php echo getMilestoneById($row['milestone_id'], $conn)['name']; ?></td>
                              <td><?php echo $row['start_date'];?></td>
                              <td><?php echo $row['end_date'];?></td>
                              <td>
                                 <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 100%; margin-right: 5px">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;" data-toggle="tooltip" title="30%"></div>
                                 </div>
                              </td>
                              <td>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><span class="fa fa-eye"></span></a>
                                 <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                              </td>
                           </tr>
                           <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Name</th>
                              <th>Milestone</th>
                              <th>Date to start</th>
                              <th>Date to end</th>
                              <th>Progress</th>
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
            <h4 class="modal-title">Add Task</h4>
         </div>
         <div class="modal-body">
            <form method="post" id="addform">
               <div class="form-group">	
                  <label>Name</label>
                  <input type="text" id="name" class="form-control" placeholder="Name" value="" name="name" />
               </div>
               <div class="form-group">
                  <label>Milestone Name</label>
                  <select id="milestoneid" class="form-control" name="milestone">
                     <?php while($row = mysqli_fetch_array($milestones)): ?>
                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                     <?php endwhile; ?>
                  </select>
               </div>
               <div class="form-group">	
                  <label>Description</label>
                  <textarea id="description" class="form-control" rows="5" placeholder="Description" name="description"></textarea>
               </div>
               <div class="form-group">	
                  <label>Budget</label>
                  <input type="text" id="budget" class="form-control" placeholder="Budget" value="" name="budget" />
               </div>
               <div class="form-group">
                  <label>Progress</label>
                  <div class="slider sliderMin sliderMint" id="progress"></div>
                  <div class="field_notice">Percent: <span class="must sliderMinLabel">0%</span></div>
               </div>
               <div class="form-group">
                  <label>Start Date</label>
                  <div class="input-group date start" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                     <input name="start_date" id="start_date" class="form-control" type="text" value="" readonly>
                     <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                     <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  </div>
                  <input type="hidden" id="dtp_input1" value="" /><br/>
               </div>
               <div class="form-group">
                  <label>End Date</label>
                  <div class="input-group date end" data-date-format="dd MM yyyy" data-link-field="dtp_input2">
                     <input name="end_date" id="end_date" class="form-control" type="text" value="" readonly>
                     <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                     <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  </div>
                  <input type="hidden" id="dtp_input2" value="" /><br/>
               </div>
               <div class="modal-footer">
                  <button type="button" class="kafe-btn kafe-btn-default-small" data-dismiss="modal">Close</button>
                  <button onclick="addmilestone()"  class="kafe-btn kafe-btn-mint-small" name="submit">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include_once('layouts/footer.php'); ?>