<?php
// Database connection details for quiz_results
$host = "localhost";
$username = "u984161579_quiz2_results";
$password = "@Pi?U3*0";
$database = "u984161579_quiz2_results";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from quiz_results table
$sql = "SELECT * FROM quiz2_results";
$result = $conn->query($sql);

// Array to store the results
$leaderboard = array();

if ($result->num_rows > 0) {
    // Fetching results and storing them in the leaderboard array
    while ($row = $result->fetch_assoc()) {
        $leaderboard[] = $row;
    }
}

// Close the connection
$conn->close();

// Database connection details for users
$db_host = "localhost";
$db_username = "u984161579_users";
$db_password = "O&JV4a1k";
$db_name = "u984161579_users";

// Connect to the database
$conn_users = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn_users->connect_error) {
    die("Connection failed: " . $conn_users->connect_error);
}

// Fetch names from users table using email ID
foreach ($leaderboard as &$user) {
    $email = $user['email']; // Assuming 'email' is the column name in quiz_results
    $sql_users = "SELECT Name FROM users WHERE email_ID='$email'";
    $result_users = $conn_users->query($sql_users);

    if ($result_users->num_rows > 0) {
        $row = $result_users->fetch_assoc();
        $user['name'] = $row['Name'];
    } else {
        $user['name'] = "Unknown";
    }
}

// Close the connection
$conn_users->close();

// Sort the leaderboard array
usort($leaderboard, function ($a, $b) {
    if ($a['score'] != $b['score']) {
        return $b['score'] - $a['score']; // Sort by score descending
    } else {
        if ($a['time_taken'] != $b['time_taken']) {
            return $a['time_taken'] - $b['time_taken']; // Sort by time_taken ascending
        } else {
            return strcmp($a['name'], $b['name']); // Sort by name alphabetically
        }
    }
});
$serialNumber = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icon.png" type="image/icon type">
    <title>Round2 Leaderboard</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #042352;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
    height: 25vh;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    max-height: 200px; /* Adjust the height as needed */
    margin: 0 80px; /* Adjust the margin as needed */
}
footer {
  background-color: #333;
  height: 3vh;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
}
#content{
    height:66.6vh;
    flex-direction: column;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
h1{
    font-size:3em;
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
<div id="content">
    <h1>Round 2 Qualified</h1>
    <h4>Qualified People Results</h4>
    <table>
        <tr>
            <th>Sl. No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Score</th>
            <th>Time Taken</th>
        </tr>
        <?php foreach ($leaderboard as $user): ?>
            <tr <?php echo ($serialNumber <= 39) ? 'style="background-color: lightgreen;"' : ''; ?>>
                <td><?php echo $serialNumber; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['score']; ?></td>
                <td><?php echo $user['time_taken']; ?></td>
            </tr>
            <?php $serialNumber++; ?>
        <?php endforeach; ?>
    </table>

</div>

<footer>Made by Bhaskar Roy</footer>
</body>
</html>
