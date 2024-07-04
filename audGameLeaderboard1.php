<?php
$servername = "localhost";
$username = "u984161579_audience1";
$password = "Nih*sqC@y4";
$dbname = "u984161579_audience1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select data from database
$sql = "SELECT name, score FROM audience WHERE name <> '' AND score <> '' ORDER BY score DESC";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>

