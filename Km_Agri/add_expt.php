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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Colorful Form</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Custom CSS for background color and animation -->
        <style>
            body{
                background-color: #87CEEB; /* Sky-blue background color */
            }
            .container {
                background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Box shadow for card effect */
            }
            .btn-primary {
                background-color: #ff6666; /* Button color */
                border-color: #ff6666; /* Button border color */
            }
            .btn-primary:hover {
                background-color: #ff3333; /* Button color on hover */
                border-color: #ff3333; /* Button border color on hover */
                animation: pulse 0.5s ease infinite; /* Simple pulse animation */
            }
            @keyframes pulse {
                0% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.1);
                }
                100% {
                    transform: scale(1);
                }
            }
            .imgupl {
                background-image: url('https://cdn-icons-png.flaticon.com/512/4983/4983580.png');
                background-size: 100% 100%; /* Set the width and height of the background image to cover the label */
                background-repeat: no-repeat; /* Prevent the background image from repeating */
                width: 200px;
                height: 200px; /* Set the height to match the background image's height */
                margin: 0 auto; /* Center horizontally */
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }
            .custom-file-input {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center">Upload Query</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dropdown">Choose Crops</label>
                            <select class="form-control" id="dropdown" name="dropdown">
                                <?php
                                require('conn.php');
                                $query = "SELECT * FROM `pik`;";
                                $result = $conn->query($query);
                    
                                while ($row = $result->fetch_assoc()) {
                                    $optionName = $row['name'];
                                    echo "<option value='$optionName'>$optionName</option>";
                                }
                                ?>
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label for="name">Enter the expert name :</label>
                            <input type="name" class="form-control" id="name" name="name">

                            <label for="uid">Enter the user id :</label>
                            <input type="uid" class="form-control" id="uid" name="uid">

                            <label for="pass">Enter the expert pass :</label>
                            <input type="pass" class="form-control" id="pass" name="pass">
                        </div>
                        <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('conn.php');
    
    $selectedOption = $_POST["dropdown"];
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $pass = $_POST["pass"];

    // Construct a multi-query to perform multiple operations in one go
    $query = "
        INSERT INTO `$selectedOption` (name, job, tb_name) VALUES ('$name', 0, '$name');
        CREATE TABLE `$name` (id TEXT DEFAULT NULL);
        INSERT INTO `farmer_data` (`f_name`, `u_name`, `pass`, `exp`) VALUES ('$name', '$uid', '$pass', 1);
    ";

    if ($conn->multi_query($query)) {
        // All three queries executed successfully
    } else {
        echo "Error executing multi-query: " . $conn->error;
    }
}
?>




        <!-- Include Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>