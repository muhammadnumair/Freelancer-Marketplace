<?php
	session_start();
	session_unset();
	session_destroy();
	unset($_SESSION['login']);
	unset($_SESSION['username']);
	unset($_SESSION['user_role']);
	header("location:../index.php");
	exit();
?>