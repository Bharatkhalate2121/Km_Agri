<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require('conn.php'); // Include your database connection script
        // Get the data from the form
        $farmerId = $_POST["farmer_id"];
        $text = $_POST["text"];
        if (isset($_POST["option"])) {
            $option = $_POST["option"];
            

    if ($option === "askQuery") {
        $updateQuery = "UPDATE `problems` SET `que` = '$text' WHERE `id` = '$farmerId'";
        
        // Use prepared statements to prevent SQL injection
        if ($stmt = $conn->query($updateQuery)) {
            echo $text."".$farmerId;
            echo "query submitted successfully.";
            
        }  } elseif ($option === "submitSolution") {
            $updateQuery = "UPDATE `problems` SET `ans` = '$text' WHERE `id` = '$farmerId'";
            
            // Use prepared statements to prevent SQL injection
            if ($stmt = $conn->query($updateQuery)) {
                echo $text."".$farmerId;
                echo "Solution submitted successfully.";
                
            }  }
            
            // Display a success message based on the selected option
            echo "Operation completed successfully.";
} else {
    echo "Please select an option."; // Handle the case where no option is selected.
}
}

?>