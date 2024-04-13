<?php
// Include the connection file
include_once "../settings/connection.php";

if (isset($_POST["scheduleMatchBtn"])) {
    // Check if all required inputs are provided
    if (empty($_POST['team1ID']) || empty($_POST['team2ID']) || empty($_POST['matchDate']) || empty($_POST['matchTime'])) {
        handleMatchError("Please fill all the inputs. Please try again.");
    }

    // Collecting inputs from user
    $team1ID = mysqli_real_escape_string($connection, $_POST['team1ID']);
    $team2ID = mysqli_real_escape_string($connection, $_POST['team2ID']);
    $matchDate = mysqli_real_escape_string($connection, $_POST['matchDate']);
    $matchTime = mysqli_real_escape_string($connection, $_POST['matchTime']);

    // Check if the teams are different
    if ($team1ID === $team2ID) {
        handleMatchError("Please select different teams.");
    }

    // Insert match
    $insert_match_query = "INSERT INTO `Matches`(`matchDate`, `matchTime`, `team1ID`, `team2ID`, `venue`) VALUES ('$matchDate', '$matchTime', '$team1ID', '$team2ID', 'Ash Pitch')";
    if (mysqli_query($connection, $insert_match_query)) {
        // Successful match scheduling
        handleMatchSuccess("Match scheduled successfully");
    } else {
        handleMatchError("Error scheduling match. Please try again.");
    }
}

// Redirect back to schedule matches page
header("Location: ../view/scheduleMatches.php");
exit();

function handleMatchError($errorMessage)
{
    $_SESSION["match_scheduled"] = false;
    $_SESSION["match_message"] = $errorMessage;
    header("Location: ../view/scheduleMatches.php?msg=failed");
    exit();
}

function handleMatchSuccess($successMessage)
{
    $_SESSION["match_scheduled"] = true;
    $_SESSION["match_message"] = $successMessage;
    header("Location: ../view/scheduleMatches.php?msg=success");
    exit();
}
?>
