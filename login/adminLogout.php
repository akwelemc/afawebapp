<?php session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["role_id"]);
unset($_SESSION["user_fname"]);
unset($_SESSION["user_lname"]);
header("Location: ../login/homepage.php");
exit();