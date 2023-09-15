<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "km_agri";

$conn = new mysqli($servername, $username, $password, $dbname);
$data = json_decode(file_get_contents("php://input"));
echo $data;
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the rating value from the AJAX request
if (isset($_POST['rating'])) {
    $rating = $_POST['rating'];

    // Insert the rating into the database (replace 'ratings' with your table name)
    $sql = "INSERT INTO ratings (rating_value) VALUES ('$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Rating saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
