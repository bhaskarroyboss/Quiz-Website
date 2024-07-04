<?php
// Retrieve data from the request
$data = json_decode(file_get_contents("php://input"), true);

if ($data && isset($data['name']) && isset($data['score']) && isset($data['time'])) {
    // Sanitize and validate data
    $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $score = intval($data['score']);
    $time_taken = intval($data['time']); // Convert time to integer

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

    // Prepare and bind the statement for quiz
    $stmt = $conn_quiz->prepare("INSERT INTO round3 (name, score, time_taken) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn_quiz->error);
    }
    $stmt->bind_param("sid", $name, $score, $time_taken); // Add time_taken parameter

    // Execute the statement for quiz
    if ($stmt->execute()) {
        echo "Score saved successfully.";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection for quiz
    $conn_quiz->close();
} else {
    // Handle invalid or missing data
    echo "Invalid data.";
}
?>
