<?php
require('conn.php');

$id = 1234; // Replace with the appropriate chat ID
$query = "SELECT * FROM chat WHERE id='$id'";
$chat = $conn->query($query);

if ($chat) {
    while ($row = $chat->fetch_assoc()) {
        if ($row['user']) {
            echo '<div class="message contact-message">' . $row['user'] . '</div>';
        }
        if ($row['expt']) {
            echo '<div class="message user-message">' . $row['expt'] . '</div>';
        }
    }
}
// Close the database connection when you're done using it
$conn->close();
?>

