<?php
$servername = "localhost";
$username = "u984161579_audience";
$password = "Spirit#1310";
$dbname = "u984161579_audience";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from Unity
$name = $_POST['name'];
$score = $_POST['score'];

// Insert data into database
$sql = "INSERT INTO audience (name, score) VALUES ('$name', '$score')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
