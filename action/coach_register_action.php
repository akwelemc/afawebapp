<?php

include '../settings/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $coachName = mysqli_real_escape_string($connection, $_POST['coachName']);
    $teamName = mysqli_real_escape_string($connection, $_POST['teamName']);
    $coach_dob = mysqli_real_escape_string($connection, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($connection, $_POST['Gender']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $passwordRetype = mysqli_real_escape_string($connection, $_POST['password2']);
    

    //Encrypting the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Coaches (teamName, coachName, Dob, Gender, Email, Password) VALUES ('$teamName', '$coachName', '$coach_dob', '$gender', '$email', '$hashedPassword')";

    if (mysqli_query($connection, $query)) {
        header("Location: ../login/coachLogin.php");
        exit(); 
    } else {
        echo "error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    header("Location: ../login/coachRegister.php");
    exit(); 
}
mysqli_close($connection);

?>
