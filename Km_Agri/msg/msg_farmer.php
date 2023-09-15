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
    <script>
        $(document).ready(function() {
            // Function to load chat messages
            function loadChat() {
                $.ajax({
                    url: 'load_chat.php', // PHP script to retrieve chat messages
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
                    url: 'send_message.php', // PHP script to send chat message
                    type: 'POST',
                    data: { message: message },
                    success: function() {
                        $('#message').val(''); // Clear the input field
                    }
                });
            });
        });
    </script>
</body>
</html>
