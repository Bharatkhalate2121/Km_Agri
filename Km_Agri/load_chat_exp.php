
<?php
require('conn.php');
$id = $_POST['farmerId']; // Replace with the appropriate chat ID
$query = "SELECT * FROM chat WHERE id='$id'";
$chat = $conn->query($query);

if ($chat) {
    while ($row = $chat->fetch_assoc()) {
        if ($row['msg']) {
            echo '<div class="message contact-message">' . $row['msg'] . '</div>';
        }
        if ($row['user']) {
            echo '<div class="message user-message">' . $row['user'] . '</div>';
        }
    }
}
// Close the database connection when you're done using it
$conn->close();
?>

