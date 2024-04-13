
<?php include_once('../settings/select_portion_fnx.php');?>
<?php include_once('../settings/select_team_fnx.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
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
            <h2><img src="../images/apllogo.png" alt="logo" style="width:120px;height:120px">TRAINING BOOKINGS</h2>
        </div>
        <div class="user">
            <img src="../images/defaultprofile3.png">
        </div>
    </div>

    <section class="booking-form-container">
      <form id="booking-form" method="POST" action="../action/booking_action.php">
      <h3>Please take note of the following rules:</h3>
      <ul>
        <li>Only 4 teams can train on one day</li>
        <li>Training days are Monday to Fridays only</li>
        <li>No team can book for more than 2 days in a week</li>
        <li>The pitch has been divided into 4, and no more than 1 team can book for the same portion of the field in a day</li>
      </ul>
      <div class = "familyBx">
        <label for="teamName">Team Name:</label>
        <select name="teamName" id="teamName">
          <?php foreach ($teamNames as $teams): ?>
            <option value="<?php echo $teams['tID']; ?>">
              <?php echo $teams['teamName'];?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

        <div class="form-group">
          <h3>Note: Training must end at 18:00.</h3>
          <label for="start-time">Start Time:</label>
          <input type="time" id="start-time" name="start-time" required>
        </div>

        <div class="form-group">
          <label for="date">Training Date:</label>
          <input type="date" id="date" name="date" required>
        </div>

        <div class="field-selection">
            <h3>Choose your preferred portion of the field:</h3>
    
            <div id="portion1" class="field-portion" fID="2">
                <h3>Goal Area 1</h3>
                <img src="../images/pitch2.jpg" alt="Portion 2" style="width: 710px; height: 297px;" onclick="selectFieldPortion(2)">
            </div>

    
            <div id="portion3" class="field-portion" fID="3">
                <h3>Midfield Area 1 & 2</h3>
                <img src="../images/pitch3.jpg" alt="Portion 3" style="width: 350px; height: 449px;"onclick="selectFieldPortion(3)">"   "<img src="../images/pitch4.jpg" alt="Portion 4" style="width: 350px; height: 449px;"onclick="selectFieldPortion(4)">
            </div>


            <div id="portion2" class="field-portion" fID="1">
                <h3>Goal Area 2</h3>
                <img src="../images/pitch1.jpg" alt="Portion 1" style="width: 715px; height: 270px;"onclick="selectFieldPortion(1)">
            </div>
        </div>

        <div class = "familyBx">
          <label for="portionName">Portion Name:</label>
          <select name="fieldPortion" id="fieldPortion">
            <?php foreach ($portionNames as $portion): ?>
            <option value="<?php echo $portion['fID']; ?>">
              <?php echo $portion['portionName'];?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>


        <div class="submitform">
            <button name="bookingBtn" class="submitform" type="submit">Submit Booking</button>
        </div>
      </form>
    </section>


  </div>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg');

    if(msg == "success"){
      showAlert("Added successfully", "success") 
    }
    else if (msg == "failed"){
      showAlert("Failed booking", "error") 
    }
  
  
  

  function showAlert(message, type) {
    Swal.fire({
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 2000
    });
  }
</script>
</body>
</html>