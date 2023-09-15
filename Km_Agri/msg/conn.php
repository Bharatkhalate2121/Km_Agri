    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "km_agri";
// echo '<script>alert("Registration Done");</script>';
// Create a connection
$conn = new mysqli($servername, $username, $password, "KM_AGRI");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
