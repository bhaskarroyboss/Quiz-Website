<?php
// Database details
$db_host = "localhost";
$db_username = "u984161579_users";
$db_password = "O&JV4a1k";
$db_name = "u984161579_users";

$loginError = $registerError = $registerSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Registration logic
        $name = $_POST["name"];
        $email = $_POST["email"];

        // Check if email belongs to @seu.edu.ge domain
        if (strpos($email, '@seu.edu.ge') === false) {
            $registerError = "Email must belong to '@seu.edu.ge' domain.";
        } else {
            // Connect to database
            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if email is already registered
            $sql = "SELECT * FROM users WHERE email_ID='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $registerError = "Email is already registered. Please login.";
            } else {
                // Insert new user into database
                $sql = "INSERT INTO users (Name, email_ID) VALUES ('$name', '$email')";
                if (mysqli_query($conn, $sql)) {
                    $registerSuccess = "Registration successful. Please check your email for further instructions.";
                    
                    
            }
            }

            mysqli_close($conn);
        }


    } elseif (isset($_POST["login"])) {
        // Login logic
        $email = $_POST["email"];

        // Connect to database
        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if email is registered
        $sql = "SELECT * FROM users WHERE email_ID='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $loginError = "Email not registered. Please register.";
        } else {
            // Redirect to quizlobby.php on successful login
            // Assuming $userEmail contains the user's email
            header("Location: https://quiz.seu-literaryclub.online/quizlobby.php?email=" . urlencode($email));
            exit();

        }

        mysqli_close($conn);
    }


    


    } elseif (isset($_POST["login"])) {
        // Login logic
        $email = $_POST["email"];

        // Connect to database
        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if email is registered
        $sql = "SELECT * FROM users WHERE email_ID='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $loginError = "Email not registered. Please register.";
        } else {
            // Redirect to quizlobby.php on successful login
            // Assuming $userEmail contains the user's email
            header("Location: https://quiz.seu-literaryclub.online/quizlobby.php?email=" . urlencode($email));
            exit();

        }

        mysqli_close($conn);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icon.png" type="image/icon type">
<title>SEU Quiz-a-Tomy Login/Register</title>
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
  height:27.6vh;
  color: white;
  display: flex;
  justify-content: center; /* Distribute items evenly along the main axis */
  align-items: center; /* Add padding to create space around the content */
}

.logo img {
  max-height: 25vh;
  margin:0 40px;
}

h1 {
  margin: 0;
  font-size:50px;
}

footer {
  background-color:#020f24;
  height: 3vh;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
}
#content {
  height: 66.6vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  flex-grow:1;
}

form {
  width: 60%;
  margin: 20px auto;
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="text"],
input[type="email"],
input[type="password"],
button {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  box-sizing: border-box;
}
button {
  background-color: #333;
  color: white;
  border: none;
  cursor: pointer;
}
button:hover {
  background-color: #555;
}
.error {
  color: red;
}
.success {
  color: green;
}
#hehe{
    display: flex; justify-content:center; width:50%;
}
@media screen and (max-width: 768px) {
    #hehe{
        width:90%;
    }
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
#background-video {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  z-index: -1; 
}

</style>
</head>
<body>
    <video id="background-video" autoplay loop muted>
  <source src="v2.mp4" type="video/mp4">
</video>
<header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>SEU QUIZ-A-TOMY 2024</h1>
  <div class="logo">
    <img src="logo2.png" alt="Logo 2">
  </div>
</header>

<div id="content">
<div class="error"><?php echo $loginError . $registerError; ?></div>
<div id="hehe">
  <button style="width: 30%;" onclick="toggleForm('login')">Login</button>
  <button style="width: 30%;" onclick="toggleForm('register')">Register</button>
  
</div>
<p style="margin-top:0; font-size:14px;">**Only @seu.edu.ge mail allowed.**</p>
<form id="loginForm" style="display:block;" method="post">
  <h2>Login</h2>
  <h5>Didn't fill the google form? You can still register. Just click register above and fill out the form.</h5>
  <input type="email" id="loginEmail" name="email" placeholder="Email" required>
  <button type="submit" name="login">Login</button>
</form>
<form id="registerForm" style="display:none;" method="post">
  <h2>Register</h2>
  <input type="text" id="registerName" name="name" placeholder="Name" required>
  <input type="email" id="registerEmail" name="email" placeholder="Email" required>
  <button type="submit" name="register">Register</button>
  <p class="success"><?php echo $registerSuccess; ?></p>
</form>
</div>
<footer>&copy Made by Bhaskar Roy</footer>
<script>
let toggleState = 'login'; // Default toggle state

function toggleForm(formName) {
  if (toggleState !== formName) {
    document.getElementById("loginForm").style.display = formName === 'login' ? 'block' : 'none';
    document.getElementById("registerForm").style.display = formName === 'register' ? 'block' : 'none';
    toggleState = formName;
  }
}
</script>
</body>
</html>
