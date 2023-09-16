<?php
require('nav.php');
require('sec_nav.php');
if(isset($_SESSION['name']))
{

}
else{
    exit();
    header("Location: index.php");
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('conn.php'); // Include your database connection script
    // Get the data from the form
    $farmerId = $_POST["farmer_id"];
    //$solutionText = $_POST["solution"];
    //echo $solutionText."".$farmerId;
    // Update or insert the solution text into the database
    //$updateQuery = "UPDATE `problems` SET `ans` = '$solutionText' WHERE `id` = '$farmerId'";
    
    // Use prepared statements to prevent SQL injection
   // if ($stmt = $conn->query($updateQuery)) {
    //     $stmt->bind_param("si", $solutionText, $farmerId);
    //     if ($stmt->execute()) {
    //         // Success
            // echo "Solution submitted successfully.";
    //     } else {
    //         // Error
    //         echo "Error submitting solution: " . $stmt->error;
    //     }
    //     $stmt->close();
    // } else {
    //     // Error preparing the statement
    //     echo "Error preparing statement: " . $con->error;
    ////}
    echo '<script>const farmerId='.json_encode($farmerId).'</script>' ;
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>WhatsApp-like Chat</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .chat-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .message {
            background-color: #DCF8C6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .user-message {
            background-color: #DCF8C6;
            text-align: right;
        }
        .contact-message {
            background-color: #E2E2E2;
        }
        .input-container {
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .send-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .send-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="input-container">
            <input type="text" id="message" name="message" placeholder="Type your message" required>
            <button type="button" id="send-button" class="send-button">Send</button>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load chat messages
        function loadChat(farmerId) {
            $.ajax({
                type: "POST",
                url: 'load_chat_com.php', // PHP script to retrieve chat messages
                data: {
                    farmerId: farmerId
                },
                success: function(data) {
                    $('#chat-messages').html(data);

                    // After loading messages, initiate another request
                    loadChat(farmerId);
                }
            });
        }

        // Load chat messages on page load
        loadChat(farmerId);

        // Send chat message
        $('#send-button').click(function() {
            var message = $('#message').val();
            $.ajax({
                url: 'send_message_com.php', // PHP script to send chat message
                type: 'POST',
                data: {
                    message: message,
                    id: farmerId
                },
                success: function() {
                    $('#message').val(''); // Clear the input field
                }
            });
        });
    });
</script>

</body>
</html>
