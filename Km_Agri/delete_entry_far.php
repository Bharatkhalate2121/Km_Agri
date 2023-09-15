
<?php
// Include your database connection script (e.g., conn.php)
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the farmerId from the POST data
    $farmerId =( $_POST["farmerId"]);
    
    // Perform the DELETE query to remove the entry with the specified farmerId
    $updatequery = "UPDATE `problems` SET `que` = '1' WHERE `id` = '$farmerId'";

    //$deleteQuery = "UPDATE `problems` WHERE `id` = '$farmerId'";
  
    if ($conn->query($updatequery)) {
        // Successfully deleted the entry
        echo "Entry deleted successfully.".$farmerId;
    } else {
        // Error occurred during deletion
        echo "Error deleting the entry: " . $conn->error;
    }
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
}


?>