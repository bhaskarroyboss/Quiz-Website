<?php
    // Check if the email, score, and timeTaken are provided
    if(isset($_POST['email']) && isset($_POST['score']) && isset($_POST['timeTaken'])) {
        $email = $_POST['email'];
        $score = $_POST['score'];
        $timeTaken = $_POST['timeTaken'];

        // Connect to your database
        $servername = "localhost";
        $username = "u984161579_quiz_3";
        $password = ";M1$62~uiz9d";
        $dbname = "u984161579_quiz_3";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the current score and time taken for the user's session
        $sql = "SELECT score, time_taken FROM quiz_3results WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentScore = $row['score'];
            $currentTimeTaken = $row['time_taken'];

            // Update the database with the new score and time taken
            $updatedScore = $currentScore + $score;
            $updatedTimeTaken = $currentTimeTaken + $timeTaken;
            $sql = "UPDATE quiz_3results SET score = $updatedScore, time_taken = $updatedTimeTaken WHERE email = '$email'";
            if ($conn->query($sql) === TRUE) {
                echo "Score and time taken updated successfully";
            } else {
                echo "Error updating score and time taken: " . $conn->error;
            }
        } else {
            // If no existing record found, insert a new record for the user
            $sql = "INSERT INTO quiz_3results (email, score, time_taken) VALUES ('$email', $score, $timeTaken)";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "Email, score, or timeTaken not provided";
    }
?>
