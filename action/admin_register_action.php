<?php

include '../settings/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $passwordRetype = mysqli_real_escape_string($connection, $_POST['password2']);
    

    //Encrypting the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Admin (Email, Password) VALUES ('$email', '$hashedPassword')";

    if (mysqli_query($connection, $query)) {
        header("Location: ../login/adminLogin.php");
        exit(); 
    } else {
        echo "error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    header("Location: ../login/adminRegister.php");
    exit(); 
}
mysqli_close($connection);

?>
