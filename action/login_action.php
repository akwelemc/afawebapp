<?php
session_start();
include('../settings/connection.php');

if (isset($_POST['signInbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // checking if email exists
    $get_user = $connection->prepare('SELECT * FROM Players WHERE email = ?');
    $get_user->bind_param('s', $email);
    $get_user->execute();
    $result = $get_user->get_result();

    if ($result->num_rows > 0) {
        $result = $result->fetch_assoc();
        if (password_verify($password, $result['Password'])) {
            $_SESSION['user_id'] = $result['pid'];
            $_SESSION['user_fname'] = $result['fname'];
            $_SESSION['user_lname'] = $result['lname'];
            $_SESSION['role_id'] = $result['rid'];
            if ($_SESSION['role_id'] == 2) {
                header('Location: ../view/playerHomepage.php');
                $connection->close();
                exit();
            } else if ($_SESSION['role_id'] == 3) {
                header('Location: ../view/playerHomepage.php');
                $connection->close();
                exit();   
            } else {
                header('Location: ../view/playerHomepage.php');
                $connection->close();
                exit();
            }
        } else {
            echo "<script>alert('Incorrect password or email')</script>";
            echo "<script>windwow.href = '../login/playerLogin.php';</script>";
            exit;
        
        }
    } else {
        $_SESSION["login_msg"] = "Account does not exist!";
        $_SESSION['login'] = false;
        header('Location: ../login/playerLogin.php');
        $connection->close();
        exit();
    }
} else {
    // redirect to login
    $_SESSION["login_msg"] = "Unable to log in";
    $_SESSION['login']= false;
    header('Location: ../login/playerLogin.php');
    $connection->close();
    exit();
}

?>
