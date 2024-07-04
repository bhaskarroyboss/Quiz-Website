<?php
// Set timezone to Tbilisi
date_default_timezone_set('Asia/Tbilisi');

// Database details
$db_host = "localhost";
$db_username = "u984161579_users";
$db_password = "O&JV4a1k";
$db_name = "u984161579_users";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user email from URL parameter (replace with actual parameter name)
$userEmail = isset($_GET['email']) ? mysqli_real_escape_string($conn, explode('?', $_GET['email'])[0]) : '';

// Debug: Check if email parameter is correctly retrieved
error_log("Email parameter: " . $userEmail);

// Query to get user's name based on email
$sql = "SELECT Name FROM users WHERE email_ID='$userEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, fetch the name
    $row = mysqli_fetch_assoc($result);
    $userName = $row["Name"];
} else {
    // User not found
    $userName = "Guest";
}

// Event start and end times
$eventStartTime = strtotime("2024-05-30 22:00:00");
$eventEndTime = strtotime("2024-05-30 22:15:00");
$currentTime = time();

// Calculate countdown timer
if ($currentTime < $eventStartTime) {
    $timeRemaining = $eventStartTime - $currentTime;
    $countdown = gmdate("d-H-i-s", $timeRemaining);
    $startButtonVisible = false;
    $eventStatus = $countdown;
} elseif ($currentTime >= $eventStartTime && $currentTime <= $eventEndTime) {
    $startButtonVisible = true;
    $eventStatus = "Quiz ongoing.";
} else {
    $eventStatus = "Quiz ended.";
    $startButtonVisible = false;
}

// Close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icon.png" type="image/icon type">
<title>SEU Quiz-A-Tomy Lobby</title>
<style>
  body{
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set the body to be at least the height of the viewport */
}

header {
  background-color: #042352;
  height:21.3vh;
  color: white;
  display: flex;
  justify-content: center; /* Distribute items evenly along the main axis */
  align-items: center; /* Add padding to create space around the content */ /*<button class="startButton1" id="startButton1" onclick="window.location.href='participant.php?email=<?php echo urlencode($userEmail); ?>'">Start</button>*/
}

.logo img {
  max-height: 21.3vh;
  margin:0 40px;
}

h1 {
  margin: 0;
  font-size:45px;
}

  .userinfo {
    height: 4vh;
    background-color: #f1f1f1;
    display:flex;
    align-items:center;
    justify-content: center;
    
  }

  .content {
    height: 64.6vh;
    padding: 20px;
    text-align: center;
    flex-grow:1;
    }
  

  .footer {
    height: 5vh;
    background-color: #020f24;
    color: white;
    text-align: center;
    display:flex;
    justify-content: center;
    align-items: center;
  }

  table {
    width: 80%;
    margin: 0 auto;
    margin-top: 30px;
    border-collapse: collapse;
  }

  table, th, td {
    border-bottom: 1px solid #ddd;
  }

  th, td {
    padding: 10px;
  }

  th {
    background-color: #f1f1f1;
  }

  .startButton {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
  }
@media screen and (max-width: 768px) {
    #content {
  
}
  .logo img {
    max-height: 150px;
    margin: 0;
  }
  h1 {
    display: none;
  }
}

    
</style>
</head>
<body>
  <header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>SEU QUIZ-A-TOMY 2024</h1>
  <div class="logo">
    <img src="logo2.png" alt="Logo 2">
  </div>
</header>
  <div class="userinfo">
    <p>Welcome, <?php echo $userName; ?></p>
  </div>
  
  <div class="content">
    <table>
      <tr>
        <th>Round</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>Round 1</td>
        <td><?php echo "Quiz Concluded"; ?></td> 
      </tr>
      <tr>
        <td>Round 2</td>
        <td><span id="countdown"><?php echo $eventStatus; ?></span>
          <?php if ($startButtonVisible): ?>
            <button class="startButton" id="startButton" onclick="window.location.href='round2quiz.php?email=<?php echo urlencode($userEmail); ?>'">Start</button>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>Round 3</td>
            <td><button class="startButton" id="startButton1" onclick="window.location.href='participant.php?email=<?php echo urlencode($userEmail); ?>'">Start</button></td> 
      </tr> 
      <tr>
        <td>Round 4</td>
        <td><button class="startButton" id="startButton2" onclick="window.location.href='round4quiz.php?email=<?php echo urlencode($userEmail); ?>'">Start</button></td>
      </tr>
      <tr>
        <td>Round 5</td>
        <td><?php echo "31st April 2024"; ?></td>
      </tr>
    </table>
  </div>
  <div class="footer">
    <p>&copy; Made by Bhaskar Roy</p>
  </div>

<script>
// Function to get URL parameter by name
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Check if the page was just reloaded
var reloaded = getParameterByName('reloaded') === 'true';

// Countdown timer update function
function updateCountdown() {
    var now = new Date().getTime();
    var eventStartTime = <?php echo $eventStartTime * 1000; ?>;
    var eventEndTime = <?php echo $eventEndTime * 1000; ?>;
    
    if (now < eventStartTime) {
        var distance = eventStartTime - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("countdown").innerHTML = "Starts in: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        var startButton = document.getElementById("startButton");
        if (startButton && !reloaded) {
            startButton.style.display = "none";
        }
    } else if (now >= eventStartTime && now <= eventEndTime) {
        document.getElementById("countdown").innerHTML = "Event ongoing.";
        var startButton = document.getElementById("startButton");
        if (startButton && !reloaded) {
            startButton.style.display = "block";
        }
    } else {
        document.getElementById("countdown").innerHTML = "Event ended.";
        var startButton = document.getElementById("startButton");
        if (startButton) {
            startButton.style.display = "none";
        }
    }

    // Refresh the page when countdown reaches 1 second remaining
    if (distance <= 1000 && !reloaded) {
        setTimeout(function() {
            window.location.href = window.location.href + '?reloaded=true'; // Add flag to URL
        }, 1000); // Reload after 1 second
    }
}

// Update countdown every second
setInterval(updateCountdown, 1000);
</script>

</body>
</html>
