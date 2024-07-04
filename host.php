<!DOCTYPE html>
<html>
<head>
    <title>Results Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Function to refresh results
            function refreshResults() {
                $.ajax({
                    url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', // Same page
                    type: 'POST',
                    data: {start_time: '<?php echo isset($_SESSION["start_time"]) ? $_SESSION["start_time"] : ""; ?>'},
                    success: function(data) {
                        $('#results').html(data); // Update results
                    }
                });
            }

            // Refresh results every 5 seconds
            setInterval(refreshResults, 500);
        });
    </script>
</head>
<body>

<?php
// Start the session
session_start();

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

// Function to get results from the database based on start time
function getResults($startTime, $conn) {
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM data5 WHERE datetime_column >= ?");
    $stmt->bind_param("s", $startTime);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Close statement
    $stmt->close();

    // Return results
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Check if the start button is clicked
if (isset($_POST['start'])) {
    // Get the current time
    $startTime = date("Y-m-d H:i:s");

    // Get results from the database based on start time
    $_SESSION['start_time'] = $startTime; // Store start time in session
    $results = getResults($startTime, $conn);

    // Limit to first 5 results
    $results = array_slice($results, 0, 5);
}

// Check if the end button is clicked
if (isset($_POST['end'])) {
    // Unset start time session variable
    unset($_SESSION['start_time']);
    // Clear results
    $results = [];
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <button type="submit" name="start">Start</button>
    <button type="submit" name="end">End</button>
</form>

<div id="results">
    <?php if (isset($results) && !empty($results)) : ?>
        <h2>Results</h2>
        <ul>
            <?php foreach ($results as $row) : ?>
                <li><?php echo $row['name'] . ' - ' . $row['datetime_column']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
