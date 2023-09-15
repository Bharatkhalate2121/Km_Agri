<?php
// Include your database connection script (e.g., conn.php)
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the farmerId from the POST data
    $farmerId = $_POST["farmerId"];
    
    // Sanitize the input to prevent SQL injection
    $farmerId = mysqli_real_escape_string($conn, $farmerId);
    
    // Perform the UPDATE query to mark the entry with the specified farmerId as "1"
    $updateQuery = "UPDATE `problems` SET `que` = 1 WHERE `id` = '$farmerId'";
    
    if ($conn->query($updateQuery)) {
        // Successfully updated the entry
        echo "Entry updated successfully. ID: " . $farmerId;
    } else {
        // Error occurred during the update
        echo "Error updating the entry: " . $conn->error;
    }
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
}
?>
