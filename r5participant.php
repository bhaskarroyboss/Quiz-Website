<?php
// Start the session
session_start();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user's name from the form
    $userName = $_POST["name"];

    // Store the user's name in session
    $_SESSION["name"] = $userName;

    // Connect to database
    $servername = "localhost";
    $username = "u984161579_round5";
    $password = "J2kAOwLo=d";
    $dbname = "u984161579_round5";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set the timezone to Tbilisi
    date_default_timezone_set('Asia/Tbilisi');

    // Get the current date and time with milliseconds
    $datetime = date("Y-m-d H:i:s") . substr((string)microtime(), 1, 8); // Add milliseconds

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO data5 (name, datetime_column) VALUES (?, ?)");
    $stmt->bind_param("ss", $userName, $datetime);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        // Redirect back to the form page with a success message
header("Location: ".$_SERVER['PHP_SELF']."?message=BUZZER RECORDED&type=success");
exit();

    } else {
        header("Location: ".$_SERVER['PHP_SELF']."?message=Error: ".$stmt->error."&type=error");
exit();
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    // If the form is not submitted, check if the user's name is stored in session
    $userName = isset($_SESSION["name"]) ? $_SESSION["name"] : '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="icon.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Round 5 Finale</title>
    <style>
    body{
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set the body to be at least the height of the viewport */
}
        header{
  background-color: #042352;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
  height: 27%;
}
footer {
  background-color: #020f24;
  height: 1.7vh;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
}
.logo {
  display: flex;
  align-items: center;
}

.logo img {
  max-height: 240px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
}
.content {
    height: 60%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    flex-grow: 1;
}

form {
    width: 100%;
    height:100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

label {
    display: block;
    font-size: 1.2em;
    margin-bottom: 10px;
}

input[type="text"] {
    width: 250px;
    padding: 10px;
    font-size: 1.2em;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-weight:bold;
}

button[type="submit"] {
    width: 700px;
    height:350px;
    margin-top: 20px;
    font-size: 6em;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Make the button look 3D */
button[type="submit"] {
    box-shadow: 0 20px #357a38;
    transform: translateY(-20px);
}

button[type="submit"]:hover {
    box-shadow: 0 3px #357a38;
    transform: translateY(-3px);
}

@media screen and (max-width: 768px) {
  #content {}
  .logo img {
    max-height: 150px;
    margin: 0;
  }
  h1 {
    display: none;
  }
  button[type="submit"] {
    width: 250px;
    height:250px;
      font-size: 3em;
  }
  
}
    </style>
</head>
<body>
    <header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>ROUND 5 Finale</h1>
  <div class="logo">
    <img src="logo2.png" alt="Logo 2">
  </div>
</header>
<div class="content">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Input field for user's name -->
    <label for="name">Enter Your Name:</label>
    
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userName); ?>" required>
    <div id="message"></div>
    
    <button type="submit">BUZZER</button>
</form>
</div>

<footer>&copy Made by Bhaskar Roy</footer>
<script>
    // Function to show the message
    function showMessage(message, type) {
        var messageDiv = document.getElementById('message');
        messageDiv.innerHTML = message;
        messageDiv.style.color = type === 'success' ? 'green' : 'red';

        // Hide the message after 5 seconds
        setTimeout(function() {
            messageDiv.style.display = 'none';
        }, 5000);
    }

    // Check if the message is set in the URL (after form submission)
    var urlParams = new URLSearchParams(window.location.search);
    var message = urlParams.get('message');
    var messageType = urlParams.get('type');

    if (message && messageType) {
        showMessage(message, messageType);
    }
</script>

</body>
</html>
