<?php
// Include your database connection script (e.g., conn.php)
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the farmerId from the POST data
    $farmerId =( $_POST["farmerId"]);
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rating Dialog Box</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="dialog" class="dialog">
            <div class="dialog-content">
                <span class="close" id="closeDialog">&times;</span>
                <h2>Rate this item</h2>
                <div class="rating">
                    <input type="radio" name="rating" id="star5" value="5" /><label for="star5"></label>
                    <input type="radio" name="rating" id="star4" value="4" /><label for="star4"></label>
                    <input type="radio" name="rating" id="star3" value="3" /><label for="star3"></label>
                    <input type="radio" name="rating" id="star2" value="2" /><label for="star2"></label>
                    <input type="radio" name="rating" id="star1" value="1" /><label for="star1"></label>
                </div>
                <button id="submitRating">Submit</button>
            </div>
        </div>
    
        <script src="script.js"></script>
    </body>
    </html>
    ';
    
    
?>