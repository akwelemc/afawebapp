<?php

include '../settings/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $playerName = mysqli_real_escape_string($connection, $_POST['playerName']);
    $teamName = mysqli_real_escape_string($connection, $_POST['teamName']);
    $player_dob = mysqli_real_escape_string($connection, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($connection, $_POST['Gender']);
    $height = mysqli_real_escape_string($connection, $_POST['height']);
    $weight = mysqli_real_escape_string($connection, $_POST['weight']);
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $passwordRetype = mysqli_real_escape_string($connection, $_POST['password2']);
    

    //Encrypting the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Players (tID, playerName, Dob, Gender, Email, Height, Weight, Position, Password) VALUES ('$teamName', '$playerName', '$player_dob', '$gender', '$email', '$height', '$weight', '$position', '$hashedPassword')";

    if (mysqli_query($connection, $query)) {
        header("Location: ../login/playerLogin.php");
        exit(); 
    } else {
        echo "error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    header("Location: ../login/playerRegister.php");
    exit(); 
}
mysqli_close($connection);

?>
