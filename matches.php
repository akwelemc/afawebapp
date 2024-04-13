<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Matches</title>
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> 
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
            <li>
                <a href="../view/Profile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="../view/trainingBooking.php">
                    <i class="fas fa-calendar-plus"></i>
                    <span class="nav-item">Training Booking</span>
                </a>
            </li>
            <li>
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
                <a href="../login/coachLogout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="main">
        <div class="firstbar">
            <div class="head-title">
                <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">UPCOMING MATCHES</h2>
            </div>
            <div class="user">
                <img src="../images/defaultprofile3.png">
            </div>
        </div>

        

        <table>
            <thead>
                <tr>
                    <th>Match ID</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>Date</th>
                    <th>Time</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                
                include '../settings/connection.php';

                // Fetch matches from the database
                $sql = "SELECT m.matchID, t1.teamName AS team1, t2.teamName AS team2, m.matchDate, m.matchTime 
                        FROM Matches m
                        INNER JOIN Teams t1 ON m.team1ID = t1.tID
                        INNER JOIN Teams t2 ON m.team2ID = t2.tID";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    // Output data forof each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["matchID"] . "</td>";
                        echo "<td>" . $row["team1"] . "</td>";
                        echo "<td>" . $row["team2"] . "</td>";
                        echo "<td>" . $row["matchDate"] . "</td>";
                        echo "<td>" . $row["matchTime"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No matches found</td></tr>";
                }

                // Close the database connection
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
