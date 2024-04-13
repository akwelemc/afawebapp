<?php
// Include the connection file
include_once('../settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $playerName = $_POST['playerName'];
    $position = $_POST['position'];
    $appearances = $_POST['appearances'];
    $goalsScored = $_POST['goalsScored'];
    $assists = $_POST['assists'];
    $passAccuracy = $_POST['passAccuracy'];
    $shotAccuracy = $_POST['shotAccuracy'];
    $tackles = $_POST['tackles'];
    $yellowCard = $_POST['yellowCard'];
    $redCard = $_POST['redCard'];



    // Prepare and execute the update query
    $stmt = $connection->prepare("UPDATE PlayersStats 
                                  SET position=?, appearances=?, goalsScored=?, assists=?, passAccuracy=?, shotAccuracy=?, tackles=?, yellowCard=?, redCard=?
                                  WHERE playerName=?");
    $stmt->bind_param("siiiddiiis", $position, $appearances, $goalsScored, $assists, $passAccuracy, $shotAccuracy, $tackles, $yellowCard, $redCard, $playerName);

    if ($stmt->execute()) {
        // Redirect to the player stats page with a success message
        header("Location: ../view/playerStats.php?success=stats_updated");
        exit();
    } else {
        // Redirect to the player stats page with an error message
        header("Location: ../view/playerStats.php?error=stats_update_failed");
        exit();
    }


    
    // Close the prepared statement and database connection
    $stmt->close();
    $connection->close();
} else {
    // Redirect to the player stats page if the form is not submitted
    header("Location: ../view/playerStats.php");
    exit();
}
?>
