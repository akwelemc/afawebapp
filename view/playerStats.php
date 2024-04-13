<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players Stats</title>
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
            <li>
                <a href="../view/matches.php">
                    <i class="fas fa-list-alt"></i>
                    <span class="nav-item">Upcoming Matches</span>
                </a>
            </li>
            <li class="active">
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
                <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">Players Stats Table</h2>
            </div>
            <div class="user">
                <img src="../images/defaultprofile3.png">
            </div>
        </div>


        <table>
            <thead>
                <tr>
                    <th>Player ID</th>
                    <th>Player Name</th>
                    <th>Position</th>
                    <th>Appearances</th>
                    <th>Goals Scored</th>
                    <th>Assists</th>
                    <th>Pass Accuracy</th>
                    <th>Shot Accuracy</th>
                    <th>Tackles</th>
                    <th>Yellow Cards</th>
                    <th>Red Cards</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the connection file
                include_once "../settings/connection.php";

                // SQL query
                $sql = "SELECT * FROM PlayersStats";

                // Execute query
                $result = $connection->query($sql);

                // Check if there are rows in the result
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["pID"] . "</td>";
                        echo "<td>" . $row["playerName"] . "</td>";
                        echo "<td>" . $row["position"] . "</td>";
                        echo "<td>" . $row["appearances"] . "</td>";
                        echo "<td>" . $row["goalsScored"] . "</td>";
                        echo "<td>" . $row["assists"] . "</td>";
                        echo "<td>" . $row["passAccuracy"] . "</td>";
                        echo "<td>" . $row["shotAccuracy"] . "</td>";
                        echo "<td>" . $row["tackles"] . "</td>";
                        echo "<td>" . $row["yellowCard"] . "</td>";
                        echo "<td>" . $row["redCard"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No players found</td></tr>";
                }

                // Close connection
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
