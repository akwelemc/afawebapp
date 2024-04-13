<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Training Bookings</title>
  <link rel="stylesheet" href="../css/booking.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <nav>
    <ul>
      <li>
        <a href="../view/homepage.php" class="logo">
          <img src="../images/apllogo.png" alt="">
          <span class="nav-item">AFA</span>
        </a>
      </li>
      <li>
        <a href="../view/homepage.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a>
      </li>
      
      <li class="active">
        <a href="../view/trainingBooking.php">
          <i class="fas fa-calendar-plus"></i>
          <span class="nav-item">Training Booking</span>
        </a>
      </li>
      <li class="active">
        <a href="../view/allBookings.php">
          <i class="fas fa-list-alt"></i>
          <span class="nav-item">All Training Bookings</span>
        </a>
      </li>
      <li class="active">
        <a href="../view/matches.php">
          <i class="fas fa-list-alt"></i>
          <span class="nav-item">Upcoming Matches</span>
        </a>
      </li>
      <li>
        <a href="../view/playerStats.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Player Stats</span>
        </a>
      </li>
      <li>
        <a href="../view/homepage.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="main">
    <div class="firstbar">
      <div class="head-title">
        <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">ALL TRAINING BOOKINGS</h2>
      </div>
      <div class="user">
        <img src="../images/defaultprofile3.png">
      </div>
    </div>

    
    <table>
      <thead>
        <tr>
          <th>Booking ID</th>
          <th>Team Name</th>
          <th>Date Booked</th>
          <th>Start Time</th>
          <th>Field Portion</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once "../settings/connection.php";

        // Fetch and display booking information
        $query = "SELECT Bookings.bID, Teams.teamName, dateBooked, startTime, FootballField.portionName 
                  FROM Bookings
                  INNER JOIN Teams ON Bookings.tID = Teams.tID
                  INNER JOIN FootballField ON Bookings.fieldID = FootballField.fID
                  ORDER BY dateBooked ASC"; // ASC for ascending order
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['bID'] . "</td>";
            echo "<td>" . $row['teamName'] . "</td>";
            echo "<td>" . $row['dateBooked'] . "</td>";
            echo "<td>" . $row['startTime'] . "</td>";
            echo "<td>" . $row['portionName'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No bookings found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>
