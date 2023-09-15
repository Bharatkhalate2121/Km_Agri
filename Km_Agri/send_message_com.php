<?php
session_start();
$name=$_SESSION['name'];
require('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    //$msg=$_POST['disc'];
     // Replace with the appropriate chat ID
    $msg = $_POST['message'];
    $query = "INSERT INTO `chat_com` (`id`, `user`, `msg`, `close`) VALUES ('$id', '$name', '$msg', '');";
    $result = $conn->query($query);
}
// Close the database connection when you're done using it
$conn->close();
?>
