<?php include_once('../settings/select_team_fnx.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Matches</title>
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
            <li class="active">
                <a href="../view/allBookings.php">
                    <i class="fas fa-list-alt"></i>
                    <span class="nav-item">All Training Bookings</span>
                </a>
            </li>
            <li class="active">
                <a href="../view/scheduleMatches.php">
                    <i class="fas fa-calendar-plus"></i>
                    <span class="nav-item">Schedule Matches</span>
                </a>
            </li>
            <li>
                <a href="../view/playerStats.php">
                    <i class="fas fa-book"></i>
                    <span class="nav-item">Player Stats</span>
                </a>
            </li>
            <li>
                <a href="../view/addNewPlayerStats.php">
                    <i class="fas fa-book"></i>
                    <span class="nav-item">Add Player Stats</span>
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
                <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">SCHEDULE MATCHES</h2>
            </div>
            <div class="user">
                <img src="../images/defaultprofile3.png">
            </div>
        </div>

        <section class="booking-form-container">
            <form id="booking-form" action="../action/scheduleMatchesAction.php" method="post">
                <div class="familyBx">
                    <label for="team1ID">Team 1:</label>
                    <select name="team1ID" id="team1ID">
                        <?php foreach ($teamNames as $teams): ?>
                        <option value="<?php echo $teams['tID']; ?>">
                            <?php echo $teams['teamName'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="familyBx">
                    <label for="team2ID">Team 2:</label>
                    <select name="team2ID" id="team2ID">
                        <?php foreach ($teamNames as $teams): ?>
                        <option value="<?php echo $teams['tID']; ?>">
                            <?php echo $teams['teamName'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="matchDate">Match Date:</label>
                    <input type="date" name="matchDate" id="matchDate">
                </div>
                <div class="form-group">
                    <label for="matchTime">Match Time:</label>
                    <input type="time" name="matchTime" id="matchTime">
                </div>
                <div class="submit-form">
                    <button type="submit" name="scheduleMatchBtn" class="submitform">Schedule Match</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>
