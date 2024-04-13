<?php

// Start the session
session_start();

// Function to check for login using user id session
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/coachLogin.php");
        die();
    }
}

?>
