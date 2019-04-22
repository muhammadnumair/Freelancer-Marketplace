<?php
    include_once('database.php');
    session_start();
    if(isset($_SESSION['error'])){
        unset($_SESSION['error_msg']);
        unset($_SESSION['error']);
    }
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
                header('Location: ../login.php');
            }else{
                //print_r("Han Bhae Pohacnh Gyaa");exit;
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['user_role'] = $user_role;
                header('Location: ../index.php');
                die();
            }
        }
    }
?>