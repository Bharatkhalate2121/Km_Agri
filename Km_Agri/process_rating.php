<?php
// Include your database connection script (e.g., conn.php)
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the rating from the POST data
    $rating = $_POST["rating"];
    $farmer = $_POST["farmer_id"];
    // Validate and sanitize the rating (you can add more validation as needed)
    if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
        echo "Invalid rating value.";
    } else {
        // Perform the database insert query to store the rating
        $updateQuery = "UPDATE `rating_value` SET `rating_value` = '$rating' WHERE `id` = '$farmerId'";

        if ($conn->query($insertQuery)) {
            // Successfully stored the rating in the database
            echo "Rating submitted successfully.";
        } else {
            // Error occurred during database insert
            echo "Error submitting the rating: " . $conn->error;
        }
    }
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
}
?>
