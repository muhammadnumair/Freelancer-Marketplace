<?php include_once('extras/database.php'); ?>
<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: index.php');
    }
    unset($_SESSION['error_msg']);
    unset($_SESSION['error']);
    if(isset($_POST['register'])){
        $error = 0;
        $error_msg = "";
        if(isset($_POST['agree'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            if(isset($_POST['user_role'])){
                $user_role = $_POST['user_role'];
            }

            if($name != "" && $email != "" && $username != "" && $password != "" && $confirmPassword != "" && isset($_POST['user_role'])){

                // Errors Handling
                if($password != $confirmPassword){
                    $error = 1;
                    $error_msg = "Password and Retype Password Do not Match";
                }

                $sql = "SELECT * from tbl_user where username = '$username'";
                //print_r($sql);exit;
                $retval = mysqli_query($conn, $sql);
                if(mysqli_num_rows($retval) > 0){
                    $error = 1;
                    $error_msg = "Username not avaiable! Please choose a different username";
                }

                $sql = "SELECT * from tbl_user where email = '$email'";
                $retval = mysqli_query($conn, $sql);
                if(mysqli_num_rows($retval) > 0){
                    $error = 1;
                    $error_msg = "Email not avaiable! Please enter a different email address";
                }
                // Errors Handling End

                if($error == 0){
                    $sql = "INSERT INTO tbl_user (full_name, email, username, password, user_role)
                    VALUES ('$name', '$email', '$username', '$password', '$user_role')";
                    //print_r($sql);exit;
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['success_msg'] = "Registeration Successfull, Now You Can Login To Your Account";
                        header('Location: login.php');
                        die();
                    }
                }
            }else{
                $error = 1;
                $error_msg = "Please Fill In All The Required Fields";
            }

        }else{
            $error = 1;
            $error_msg = "Please agree to our terms and services first";
        }

        if($error == 1){
                $_SESSION['error'] = true;
                $_SESSION['error_msg'] = $error_msg; 
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
                                    <h3>Register</h3>

                                    <?php if(isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger" role="alert" style="font-family: 'Varela Round', sans-serif;">
                                      <?php echo $_SESSION['error_msg']; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success" role="alert" style="font-family: 'Varela Round', sans-serif;">
                                      <?php echo $_SESSION['success_msg']; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.form-head -->
                                <div class="form-body">

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input type="text" name="name" class="field" placeholder="Full Name">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input type="text" name="email" class="field" placeholder="Email">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input type="text" name="username" class="field" placeholder="Username">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input type="password" name="password" class="field" placeholder="Password">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                    <div class="form-row">
                                        <div class="form-controls">
                                            <input type="password" name="confirmPassword" class="field" placeholder="Confirm Password">
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>
                                    <!-- /.form-row -->

                                     <div class="form-row">
                                        <div class="form-controls">
                                            <select class="field" name="user_role">
                                                <option value="choose" disabled="" selected="">Register yourself as</option>
                                                <option value="freelancer">Freelancer</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                        </div>
                                        <!-- /.form-controls -->
                                    </div>


                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree"> Agree to the <a href="#">terms and policy</a> </label>
                                    </div>

                                </div>
                                <!-- /.form-body -->

                                <div class="form-foot">
                                    <div class="form-actions">
                                        <input type="hidden" name="token" value="" />
                                        <input type="submit" name="register" value="Register" class="kafe-btn kafe-btn-default full-width">
                                    </div>
                                    <!-- /.form-actions -->
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