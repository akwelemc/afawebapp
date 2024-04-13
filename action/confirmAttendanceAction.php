<?php
// Include the connection file
include_once('../settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve match ID and attendance status from the form
    $matchID = $_POST["matchID"];
    $attendanceStatus = $_POST["attendanceStatus"]; // This could be "Confirmed" or "Denied"
    // Assuming you have a way to retrieve player ID, for example from session or another form field
    $playerID = $_SESSION["playerID"]; // Adjust this according to your actual implementation

    // Prepare and execute SQL query to update attendance status
    $sql = "UPDATE Attendance SET attendance = ? WHERE matchID = ? AND playerID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sii", $attendanceStatus, $matchID, $playerID);

    // Check if the query executed successfully
    if ($stmt->execute()) {
        // Redirect back to the attendance confirmation page with a success message
        header("Location: ../action/confirmAttendanceAction.php?success=1");
        exit();
    } else {
        // Redirect back to the attendance confirmation page with an error message
        header("Location: ../action/confirmAttendanceAction.php?error=1");
        exit();
    }
} else {
    // Redirect back to the attendance confirmation page if the form is not submitted
    header("Location: ../action/confirmAttendanceAction.php");
    exit();
}

// Close the database connection
$connection->close();
?>
