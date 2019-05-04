<?php include_once('extras/database.php'); ?>
<?php
    session_start();
    unset($_SESSION['error_msg']);
    unset($_SESSION['error']);
    if(isset($_POST['login'])){
        $error = 0;
        $error_msg = "";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_id = 1;
        if($email != "" && $password != ""){
            $sql = "SELECT * from tbl_user where (email = '$email' AND password = '$password') OR (username = '$email' AND password = '$password')";
                //print_r($sql);exit;
            $retval = mysqli_query($conn, $sql);
            $user_array = mysqli_fetch_array($retval);
            $user_id = $user_array["user_id"];
            if(mysqli_num_rows($retval) == 0){
                $error = 1;
                $error_msg = "Username or Password is not correct";
                $_SESSION['error'] = true;
                $_SESSION['error_msg'] = $error_msg;
            }else{
                //print_r("Han Bhae Pohacnh Gyaa");exit;
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['user_role'] = $user_role;
                header('Location: index.php');
                die();
            }
        }
    }
?>
<?php include_once('layouts/header.php'); ?>
    <!-- ==============================================
     Banner Login Section
     =============================================== -->
    <section class="banner-login">
        <div class="container">

            <div class="row">

                <div class="main main-signup col-lg-12">
                    <div class="col-lg-6 col-lg-offset-3 text-center">

                        <div class="form-sign">
                            <form method="POST" action="">
                                <div class="form-head">
                                    <h3>Login</h3>
                                    <?php if(isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;">
                                      <?php echo $_SESSION['error_msg']; ?>
                                    </div>
                                    <?php unset($_SESSION['error_msg']); ?>
                                    <?php endif; ?>
                                    <?php if(isset($_SESSION['success_msg'])):?>
                                    <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;"><?php echo $_SESSION['success_msg']; ?>               
                                    </div>
                                    <?php endif;?>
                                    <?php unset($_SESSION['success_msg']); ?>
                                </div>
                                <!-- /.form-head -->
                                <div class="form-body">

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input name="email" placeholder="Email" class="field" type="text">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input name="password" placeholder="Password" class="field" type="password">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="material-switch pull-left">
                                            <input id="someSwitchOptionSuccess" name="remember" type="checkbox" />
                                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                                            <span>Remember Me</span>
                                        </div>
                                    </div>
                                    <!-- /.form-row -->

                                </div>
                                <!-- /.form-body -->

                                <div class="form-foot">
                                    <div class="form-actions">
                                        <input type="hidden" name="token" value="" />
                                        <input value="Login" class="kafe-btn kafe-btn-default full-width" type="submit" name="login">
                                        <div class="margin-space"></div>
                                        <a href="register.php" class="kafe-btn kafe-btn-danger full-width">Register</a>
                                    </div>
                                    <!-- /.form-actions -->
                                    <div class="form-head">
                                        <a href="#" class="more-link">Forgot Password?</a>
                                    </div>
                                </div>
                                <!-- /.form-foot -->
                            </form>

                        </div>
                        <!-- /.form-sign -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <?php include_once('layouts/footer.php'); ?>