<?php
$file = "data.txt"; // File to store the value

if (isset($_GET['newValue'])) {
    $newValue = intval($_GET['newValue']);
    if ($newValue === 0) {
        // Reset the value to 0
        file_put_contents($file, "-1");
    } else {
        // Increment the value
        $currentValue = file_get_contents($file);
        $currentValue += $newValue;
        file_put_contents($file, $currentValue);
    }
}
?>
