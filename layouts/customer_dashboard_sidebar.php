<?php 
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $currentPage = $uri_segments[2];
?>
<div class="col-sm-4 col-md-3">
   <ul class="sidebar-menu" data-widget="tree">
      <li <?php if($currentPage == "dashboard"){echo "class='active'";}?>>
         <a href="dashboard">
         <i class="fa fa-life-ring"></i> <span>Dashboard</span>
         </a>
      </li>
      <?php if(getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
      <li <?php if($currentPage == "contract"){echo "class='active'";}?>>
         <a href="contract">
         <i class="fa fa-align-left"></i> <span>Contracts</span>
         </a>
      </li>
      <li class='<?php if($currentPage == "jobs" || $currentPage == "add-job"){echo "treeview active menu-open";}else{echo "treeview";}?>'>
         <a href="#">
         <i class="fa fa-files-o"></i> <span>Jobs</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu">
            <li><a href="jobs"><i class="fa fa-circle-o"></i> Jobs</a></li>
            <li><a href="add-job"><i class="fa fa-circle-o"></i> Add new Job</a></li>
         </ul>
      </li>
      <?php endif; ?>
      <li <?php if($currentPage == "proposals"){echo "class='active'";}?>>
         <a href="proposals">
         <i class="fa fa-clone"></i> <span>Proposals</span>
         </a>
      </li>
   </ul>
   <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
         <a href="#">
         <i class="fa fa-exchange"></i> <span>Wallet</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu">
            <li><a href="deposits.html"><i class="fa fa-circle-o"></i> Deposits</a></li>
            <li><a href="withdrawals.html"><i class="fa fa-circle-o"></i> Withdrawals</a></li>
         </ul>
      </li>
      <li>
         <a href="payment_method.html">
         <i class="fa fa-dot-circle-o"></i> <span>Payment Method</span>
         </a>
      </li>
      <li>
         <a href="membership.html">
         <i class="fa fa-credit-card"></i> <span>Membership</span>
         </a>
      </li>
   </ul>

   <ul class="sidebar-menu" data-widget="tree">
      <li>
         <a href="editprofile.html">
         <i class="fa fa-user"></i> <span>Edit Profile</span>
         </a>
      </li>
      <li>
         <a href="profileimage.html">
         <i class="fa fa-image"></i> <span>Change Profile Image</span>
         </a>
      </li>
      <li>
         <a href="password">
         <i class="fa fa-lock"></i> <span>Change Password</span>
         </a>
      </li>
   </ul>
</div>