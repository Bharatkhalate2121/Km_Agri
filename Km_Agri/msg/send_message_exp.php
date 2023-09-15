<?php
require('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = 1234; // Replace with the appropriate chat ID
    $msg = $_POST['message'];
    $query = "INSERT INTO `chat` (`id`, `user`, `expt`, `close`) VALUES ('$id', '', '$msg', '');";
    $result = $conn->query($query);
}
// Close the database connection when you're done using it
$conn->close();
?>
