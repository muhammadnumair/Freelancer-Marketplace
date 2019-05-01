<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('layouts/header.php'); ?>
<?php
   // Pagination
   $page = 1;
   if(isset($_GET['page'])){
      $page = $_GET['page'];
   }

   $no_of_records_per_page = 1;
   $offset = ($page-1) * $no_of_records_per_page; 
   $total_pages_sql = "SELECT COUNT(*) FROM tbl_jobs";
   $result = mysqli_query($conn,$total_pages_sql);
   $total_rows = mysqli_fetch_array($result)[0];
   $total_pages = ceil($total_rows / $no_of_records_per_page);

   $sql = "SELECT * from tbl_jobs LIMIT $offset, $no_of_records_per_page";
   if(isset($_GET['search'])){
      $search = $_GET['search'];
      $sql = "SELECT * from tbl_jobs Where title Like '$search%' LIMIT $offset, $no_of_records_per_page";
      //print_r($sql); exit;
   }

   //print_r($total_pages);exit;
   $retval = mysqli_query($conn, $sql);
?>
<?php include_once('extras/functions.php'); ?>
<!-- ==============================================
   Feautured Car Section
   =============================================== -->
<section class="featured-users">
   <div class="container">
      <div class="section-title" style="padding-top: 20px;">
         <h1>Jobs</h1>
      </div>
      <div class="row">
         <div class="col-lg-9">
            <div class="work">
               <?php while($row = mysqli_fetch_array($retval)): ?>
               <div class="job">
                  <div class="row top-sec">
                     <div class="col-lg-12">
                        <div class="col-lg-12 col-xs-12">
                           <h4><a href="job?id=<?php echo $row["job_id"]; ?>"><?php echo $row["title"]; ?></a></h4>
                           <h5><?php echo getCategory($row["category_id"], $conn)["name"]; ?></h5>
                           <h6>Hourly $$ (intermediate) 40+ hours per week</h6>
                           <p><small>Posted <?php echo time_elapsed_string($row["posted_on"]); ?></small></p>
                        </div>
                        <!-- /.col-lg-10 -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
                  <div class="row mid-sec">
                     <div class="col-lg-12">
                        <div class="col-lg-12">
                           <hr class="small-hr">
                           <p><?php echo shorter($row["job_description"]); ?></p>
                           <span class="label label-success">HTML 5</span>
                           <span class="label label-success">CSS3</span>
                           <span class="label label-success">PHP 5.4</span>
                           <span class="label label-success">Mysql</span>
                           <span class="label label-success">Bootstrap</span>
                        </div>
                        <!-- /.col-lg-12 -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
                  <div class="row bottom-sec">
                     <div class="col-lg-12">
                        <div class="col-lg-12">
                           <hr class="small-hr">
                        </div>
                        <div class="col-lg-6">
                           <div class="pull-left">
                              <?php if(strlen(getProfilePhoto($row["user_id"], $conn)['profile_img']) > 2) : ?>
                              <a href="profile.html">
                              <img class="img-responsive" src="<?php echo getProfilePhoto($row['user_id'], $conn)['profile_img']; ?>" alt="Image">
                              </a>
                              <?php else: ?>
                              <a href="profile.html">
                              <img class="img-responsive" src="uploads/profiles/default.jpg" alt="Image">
                              </a>
                              <?php endif; ?>
                           </div>
                           <!-- /.col-lg-2 -->
                           <h5> <?php echo getAuthor($row["user_id"], $conn)["full_name"]?></h5>
                           <p><i class="fa fa-map-marker"></i> <?php echo getCountry(getAuthor($row["user_id"], $conn)["country_id"],$conn)["country_name"]?></p>
                           <p class="p-star"> 
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                           </p>
                        </div>
                        <div class="col-lg-6">
                           <div class="pull-right">
                              <h4> <?php echo getApplicants($row["job_id"], $conn);?> </h4>
                              <p> Applicants</p>
                           </div>
                        </div>
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
               </div>
               <?php endwhile; ?>
               <!-- /.job -->
               <!-- /.Pagination -->	   
               <div class="paginationCommon blogPagination text-center">
                  <nav aria-label="Page navigation">
                     <ul class="pagination" style="font-family: 'Varela Round', sans-serif;">
                        <li>
                           <a href="<?php if($page > 1){ echo '?page='.($page-1); }else{ echo '#'; } ?>" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                           </a>
                        </li>
                        <?php for ($i = 0; $i < $total_pages; $i++): ?>
                              <li <?php if(($i + 1) == $page){echo 'class="active"';}?>><a href="?page=<?php echo $i+1;?>"><?php echo $i + 1; ?></a></li>
                        <?php endfor; ?>
                        <li>
                           <a href="<?php if($page < $total_pages){ echo '?page='.($page+1); }else{ echo '#'; } ?>" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                           </a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <!-- ./work -->		
         </div>
         <!-- col-md-9 -->	
         <div class="col-sm-4 col-md-3">
            <div class="widget">
               <h3 class="widget_title">Category</h3>
               <ul class="tr-list">
                  <li><a href="#" class="active"><i class="fa fa-code"></i> Web & Mobile Development</a></li>
                  <li><a href="#"><i class="fa fa-eye"></i>  Design, Arts & Multimedia</a></li>
                  <li><a href="#"><i class="fa fa-edit"></i>  Writing & Translation</a></li>
                  <li><a href="#"><i class="fa fa-cog"></i>  Admin Support</a></li>
                  <li><a href="#"><i class="fa fa-table"></i>  Management & Finance</a></li>
                  <li><a href="#"><i class="fa fa-bullhorn"></i>  Sales & Marketing</a></li>
               </ul>
               <div class="margin-space"></div>
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="widget_title_small">Payment Type</h3>
                     <ul class="tr-list">
                        <li><a href="#" class="active">Any</a></li>
                        <li><a href="#">By Hour</a></li>
                        <li><a href="#">Fixed Cost</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-6">
                     <h3 class="widget_title_small">Experience Level</h3>
                     <ul class="tr-list">
                        <li><a href="#">Entry Level</a></li>
                        <li><a href="#">Intermediate</a></li>
                        <li><a href="#">Expert</a></li>
                     </ul>
                  </div>
               </div>
               <div class="margin-space"></div>
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="widget_title_small">Job Duration</h3>
                     <ul class="tr-list">
                        <li><a href="#">6+ Months</a></li>
                        <li><a href="#">3 - 6 Months</a></li>
                        <li><a href="#">1 - 3 Months</a></li>
                        <li><a href="#">Below 1 Month</a></li>
                        <li><a href="#">Below 1 Week</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-6">
                     <h3 class="widget_title_small">Hours Per Week</h3>
                     <ul class="tr-list">
                        <li><a href="#">30 - 39</a></li>
                        <li><a href="#">20 - 29</a></li>
                        <li><a href="#">10 - 19</a></li>
                        <li><a href="#">1 - 9</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- /.widget --> 
         </div>
      </div>
   </div>
</section>
<?php include_once('layouts/footer.php'); ?>