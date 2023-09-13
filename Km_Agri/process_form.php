<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "km_agri";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    echo 'post called';
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO farmer_data (f_name, u_name, pass) VALUES ('$name', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
