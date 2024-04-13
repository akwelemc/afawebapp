<?php include_once('../settings/select_player_fnx.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player Stats</title>
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
                <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">ADD PLAYER STATS</h2>
            </div>
            <div class="user">
                <img src="../images/defaultprofile3.png">
            </div>
        </div>

        <section class="booking-form-container">
            <form id="add-stats-form" action="../action/addStatsAction.php" method="post">
                <div class="familyBx">
                    <label for="playerName">Player Name:</label>
                    <select name="playerName" id="playerName">
                        <?php foreach ($playerNames as $player): ?>
                        <option value="<?php echo $player['playerName']; ?>">
                            <?php echo $player['playerName']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position" id="position">
                </div>
                <div class="form-group">
                    <label for="appearances">Appearances:</label>
                    <input type="number" name="appearances" id="appearances">
                </div>
                <div class="form-group">
                    <label for="goalsScored">Goals Scored:</label>
                    <input type="number" name="goalsScored" id="goalsScored">
                </div>
                <div class="form-group">
                    <label for="assists">Assists:</label>
                    <input type="number" name="assists" id="assists">
                </div>
                <div class="form-group">
                    <label for="passAccuracy">Pass Accuracy:</label>
                    <input type="number" name="passAccuracy" id="passAccuracy" step="0.01">
                </div>
                <div class="form-group">
                    <label for="shotAccuracy">Shot Accuracy:</label>
                    <input type="number" name="shotAccuracy" id="shotAccuracy" step="0.01">
                </div>
                <div class="form-group">
                    <label for="tackles">Tackles:</label>
                    <input type="number" name="tackles" id="tackles">
                </div>
                <div class="form-group">
                    <label for="yellowCard">Yellow Cards:</label>
                    <input type="number" name="yellowCard" id="yellowCard">
                </div>
                <div class="form-group">
                    <label for="redCard">Red Cards:</label>
                    <input type="number" name="redCard" id="redCard">
                </div>
                <div class="submit-form">
                    <button type="submit" name="addStats" class="submitform">Add Player Stats</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>
