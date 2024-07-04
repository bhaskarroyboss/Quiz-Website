<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/icon type">
    <title>Round 3 Leaderboard</title>
    <style>
        table {
    width: 94%; /* Adjust width as needed */
    margin: 0 auto; /* Center the table horizontally */
    border-collapse: collapse;
    margin-top: 20px; /* Add top margin */
    margin-bottom: 20px; /* Add bottom margin */
}


        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .highlight {
            background-color: green;
            color: white;
        }
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
        }
        header{
          background-color: #042352;
          color: white;
           display: flex;
            justify-content: center;
            align-items: center;
          padding: 10px 0;
          height: 25vh;
        }
        footer {
          background-color: #020f24;
          height: 3vh;
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
          max-height: 200px; /* Adjust the height as needed */
          margin: 0 80px; /* Adjust the margin as needed */
        }
        #content {
    height: 64.7vh;
    position: relative; /* Added to position the countdown */
}
@media screen and (max-width: 768px) {
  #content {height:60.3vh;}
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
      <h1>Round 3 Leaderboard</h1>
      <div class="logo">
        <img src="logo2.png" alt="Logo 2">
      </div>
    </header>
    <div id="content">
    <main>
        <?php
// Database details for quiz
$db_host_quiz = "localhost";
$db_username_quiz = "u984161579_quiz_3";
$db_password_quiz = "+^UM1k]1fV";
$db_name_quiz = "u984161579_quiz_3";

// Create connection for quiz
$conn_quiz = new mysqli($db_host_quiz, $db_username_quiz, $db_password_quiz, $db_name_quiz);

// Check connection for quiz
if ($conn_quiz->connect_error) {
    die("Connection to quiz database failed: " . $conn_quiz->connect_error);
}

// Prepare SQL statement to retrieve leaderboard data
$sql = "SELECT name, score, time_taken FROM round3 ORDER BY score DESC, time_taken ASC LIMIT 40"; // Limit to top 40 entries
$result = $conn_quiz->query($sql);

if ($result->num_rows > 0) {
    // Output leaderboard table
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Score</th><th>Time Taken</th></tr>";
    $count = 0; // Counter to keep track of top 40 entries
    while ($row = $result->fetch_assoc()) {
        $count++;
        $highlight = ($count <= 40) ? "style='background-color: lightgreen;'" : ""; // Highlight top 40 entries
        echo "<tr $highlight>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["score"] . "</td>";
        echo "<td>" . $row["time_taken"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No leaderboard data available.";
}

// Close connection for quiz
$conn_quiz->close();
?>

    </main>
    </div>
    <footer>
        <p>&copy; Made By Bhaskar Roy</p>
    </footer>
</body>
</html>
