<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('conn.php'); // Include your database connection script
    
    // Get the data from the form
    $farmerId = $_POST["farmer_id"];
    $solutionText = $_POST["solution"];
    echo $solutionText."".$farmerId;
    // Update or insert the solution text into the database
    $updateQuery = "UPDATE `problems` SET `ans` = '$solutionText' WHERE `id` = '$farmerId'";
    
    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->query($updateQuery)) {
    //     $stmt->bind_param("si", $solutionText, $farmerId);
    //     if ($stmt->execute()) {
    //         // Success
             echo "Solution submitted successfully.";
    //     } else {
    //         // Error
    //         echo "Error submitting solution: " . $stmt->error;
    //     }
    //     $stmt->close();
    // } else {
    //     // Error preparing the statement
    //     echo "Error preparing statement: " . $con->error;
    }
}
?>
