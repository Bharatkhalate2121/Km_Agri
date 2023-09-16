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
        //$text = $_POST["text"];
//         if (isset($_POST["option"])) {
//             $option = $_POST["option"];
            

//     if ($option === "askQuery") {
//         $updateQuery = "UPDATE `problems` SET `que` = '$text' WHERE `id` = '$farmerId'";
        
//         // Use prepared statements to prevent SQL injection
//         if ($stmt = $conn->query($updateQuery)) {
//             echo $text."".$farmerId;
//             echo "query submitted successfully.";
            
//         }  } elseif ($option === "submitSolution") {
//             $updateQuery = "UPDATE `problems` SET `ans` = '$text' WHERE `id` = '$farmerId'";
            
//             // Use prepared statements to prevent SQL injection
//             if ($stmt = $conn->query($updateQuery)) {
//                 echo $text."".$farmerId;
//                 echo "Solution submitted successfully.";
                
//             }  }
            
//             // Display a success message based on the selected option
//             echo "Operation completed successfully.";
// } else {
//     echo "Please select an option."; // Handle the case where no option is selected.
// }
}
echo '<script>var farmerId = ' . json_encode($farmerId) . ';</script>';

?>







<!DOCTYPE html>
<html>
<head>
    <title>WhatsApp-like Chat</title>
    <link rel="stylesheet" type="text/css" href="viewchatcss.css">
</head>
<body>
    <br>
    <br>
    <br>
<div class="chat-container">
    <div id="chat-messages">
        <!-- Chat messages will be displayed here -->
    </div>
    <div class="input-containers">
        <input type="text" id="message" name="message" placeholder="Type your message" required>
        <div class="button-container">
            <button type="button" id="send-button" class="send-button">Send</button>
            <form method="post" action="redirect.php">
                <button type="submit" class="send-button">Back</button>
            </form>
        </div>
    </div>
</div>


    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to load chat messages
            function loadChat() {
                $.ajax({
                    type:"POST",
                    url: 'load_chat_exp.php',
                    data: {
                            farmerId: farmerId
                        }, // PHP script to retrieve chat messages
                    success: function(data) {
                        $('#chat-messages').html(data);
                        
                        // After loading messages, initiate another request
                        loadChat();
                    }
                });
            }
            
            // Load chat messages on page load
            loadChat();
            
            // Send chat message
            $('#send-button').click(function() {
                
                var message = $('#message').val();
                $.ajax({
                    url: 'send_exp_message.php', // PHP script to send chat message
                    type: 'POST',
                    data: { message: message,
                            id:farmerId },
                    success: function() {
                        $('#message').val(''); // Clear the input field
                    }
                });
            });
        });
    </script>
</body>
</html>
