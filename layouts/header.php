<?php include_once('extras/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- ==============================================
         Title and Meta Tags
         =============================================== -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>The Kafe - Ultimate Freelance Marketplace</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Add your business website description here">
      <meta name="keywords" content="Add your, business, website, keywords, here">
      <meta name="author" content="Add your business, website, author here">
      <!-- ==============================================
         Favicons
         =============================================== -->
      <link rel="icon" href="assets/img/logo.jpg">
      <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.html">
      <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.html">
      <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.html">
      <!-- ==============================================
         CSS
         =============================================== -->
      <!-- Style-->
      <link type="text/css" href="assets/css/style.css" rel="stylesheet" />
      <link type="text/css" href="assets/css/login.css" rel="stylesheet" />
      <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      <!-- ==============================================
         Feauture Detection
         =============================================== -->
      <script src="assets/js/modernizr-custom.html"></script>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!-- ==============================================
         Navigation Section
         =============================================== -->
      <header class="tr-header">
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="assets/img/logo.jpg" alt="Image" />The Kafe</a>
               </div>
               <!-- /.navbar-header -->
               <div class="navbar-left">
                  <div class="collapse navbar-collapse" id="navbar-collapse">
                     <ul class="nav navbar-nav">
                        <li><a href="hire.html">GoHire</a></li>
                        <li><a href="work.php">GoWork</a></li>
                        <li><a href="how.html">How it works</a></li>
                     </ul>
                  </div>
               </div>
               <!-- /.navbar-left -->
               <div class="navbar-right">
                  <ul class="nav navbar-nav">
                     <?php if(!isset($_SESSION['login'])):?>
                     <li><i class="fa fa-user"></i></li>
                     <li><a href="login.php">Sign In/ Register </a></li>
                     <?php endif; ?>
                     <?php if(isset($_SESSION['login'])): ?>
                     <li class="dropdown mega-avatar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                           <span class="avatar w-32"><img src="assets/img/users/2.jpg" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
                           <!-- hidden-xs hides the username on small devices so only the image appears. -->
                           <span>

                           <?php $user_id = $_SESSION['user_id'];?>
                           <?php echo getAuthor($user_id, $conn)["full_name"]?>
                           </span>
                        </a>
                        <div class="dropdown-menu w dropdown-menu-scale pull-right">
                           <a class="dropdown-item" href="dashboard.php"><span>Dashboard</span></a>
                           <a class="dropdown-item" href="profile.html"><span>Profile</span></a>
                           <a class="dropdown-item" href="editprofile.html"><span>Settings</span></a>
                           <a class="dropdown-item" href="extras/logout.php">Sign out</a>
                        </div>
                     </li>
                     <?php endif; ?>
                     <!-- /navbar-item -->
                  </ul>
                  <?php if(isset($_SESSION['login']) AND getAuthor($user_id, $conn)["user_role"] == 'customer'): ?>
                  <!-- /.sign-in -->
                  <a href="add-job" class="kafe-btn kafe-btn-mint-small">Post a Job</a>
                  <?php endif; ?>
               </div>
               <!-- /.nav-right -->
            </div>
            <!-- /.container -->
         </nav>
         <!-- /.navbar -->
      </header>
      <!-- Page Header -->