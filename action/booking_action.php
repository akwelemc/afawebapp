<?php

include_once "../settings/connection.php";
include_once "../settings/core.php";


if (isset($_POST["bookingBtn"])) {
    // Check if user is logged in
    //$userID = checkLogin();-


    // Check if all required inputs are provided
    if (empty($_POST['start-time']) || empty($_POST['date']) || empty($_POST['teamName']) || empty($_POST['fieldPortion'])) {
        handleBookingError("Please fill all the inputs. Please try again.");
    }

    // Collecting inputs from user
    $time = mysqli_real_escape_string($connection, $_POST['start-time']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $teamID = mysqli_real_escape_string($connection, $_POST['teamName']);
    $portionID = mysqli_real_escape_string($connection, $_POST['fieldPortion']);

    // Check if date and time are in the future
    $currentDateTime = date("Y-m-d");
    if (strtotime($date) <= strtotime($currentDateTime)) {
        handleBookingError("Training date must be in the future!");
    }

    // Check if the selected day is Saturday or Sunday
    $selectedDayOfWeek = date('l', strtotime($date));
    if ($selectedDayOfWeek === 'Saturday' || $selectedDayOfWeek === 'Sunday') {
        handleBookingError("Game days are Saturdays and Sundays. No training allowed.");
    }

    // Check if the team has already booked for this day
    $check_booking_query = "SELECT COUNT(*) AS booked_slots FROM `Bookings` WHERE tID = '$teamID' AND dateBooked = '$date'";
    $check_booking_result = mysqli_query($connection, $check_booking_query);
    $row = mysqli_fetch_assoc($check_booking_result);
    $bookedSlots = $row['booked_slots'];
    if ($bookedSlots >= 4) {
        handleBookingError("Sorry, all slots for this day are already booked.");
    }

    // Check if the selected portion is already booked for the selected day
    $check_booking_query = "SELECT COUNT(*) AS booked_slots FROM `Bookings` WHERE dateBooked = '$date' AND fieldID = '$portionID'";
    $check_booking_result = mysqli_query($connection, $check_booking_query);
    $row = mysqli_fetch_assoc($check_booking_result);
    $bookedSlots = $row['booked_slots'];
    if ($bookedSlots >= 1) {
        handleBookingError("Sorry, the selected portion is already booked for this day.");
    }

     // Check if the team has booked for more than 2 days in the current week
     $currentWeek = date('W');
     $check_weekly_booking_query = "SELECT COUNT(DISTINCT dateBooked) AS booked_days FROM `Bookings` WHERE tID = '$teamID' AND WEEK(dateBooked) = '$currentWeek'";
     $check_weekly_booking_result = mysqli_query($connection, $check_weekly_booking_query);
     $weeklyBookedDays = mysqli_fetch_assoc($check_weekly_booking_result)['booked_days'];
     if ($weeklyBookedDays >= 2) {
         handleBookingError("Sorry, a team cannot book for more than 2 days in a week.");
     }

    // Insert booking
    $insert_booking_query = "INSERT INTO `Bookings`(`tID`, `dateBooked`, `startTime`, `fieldID`) VALUES ('$teamID', '$date', '$time', '$portionID')";
    if (mysqli_query($connection, $insert_booking_query)) {
        // Successful booking
        handleBookingSuccess("Booking successful");
    } else {
        handleBookingError("Error booking a slot. Please try again.");
    }
}

// Redirect back to booking page
header("Location: ../view/trainingBooking.php");
exit();

function handleBookingError($errorMessage) {
    $_SESSION["booked"] = false;
    $_SESSION["booking_message"] = $errorMessage;
    header("Location: ../view/trainingBooking.php?msg=failed");
    exit();
}

function handleBookingSuccess($successMessage) {
    $_SESSION["booked"] = true;
    $_SESSION["booking_message"] = $successMessage;
    header("Location: ../view/trainingBooking.php?msg=success");
    exit();
}
?>
