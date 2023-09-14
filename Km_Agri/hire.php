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
    <title>Sample Form</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Colorful Form</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Custom CSS for background color and animation -->
        <style>
        /* body {
            background-color: #87CEEB; /* Sky-blue background color 
        } */
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
        </style>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="dropdown">Select Crop:</label>
        <select id="dropdown" name="dropdown">
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

        <br>

        <label for="image">Upload an image:</label>
        <input type="file" id="image" name="choosefile" accept="image/*">

        <br>

        <label for="text">Enter some text:</label>
        <input type="text" id="text" name="text">

        <br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$con = mysqli_connect("localhost", "root", "", "KM_AGRI");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    } else {
        $selectedOption = $_POST["dropdown"];
        //$uploadedImageName = $_FILES["image"]["name"];
        $textInput = $_POST["text"];
        $filename = $_FILES["choosefile"]["name"];
        $tempfile = $_FILES["choosefile"]["tmp_name"];
        $fname=$_SESSION['name'];
        $folder = "image/".$filename;
        $microtime = microtime(true) * 10000;
        $random = mt_rand(0, 999);
        $uniqueID = $microtime . $random;
        // Fetch the minimum job value for the selected option
        $query = "SELECT * FROM `$selectedOption` ORDER BY `job` ASC LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tbname = $row['tb_name'];
            $name=$row['name'];
            $updatequery = "UPDATE `$selectedOption` SET  job=job+1 WHERE name='$name';";
            mysqli_query($conn, $updatequery);
            
            // Insert data into the selected table
            $insertQuery1 = "INSERT INTO `problems` ( `id`,`farmer_name`,`img`, `disc` ) VALUES ('$uniqueID', '$fname', '$filename', '$textInput')";  
            $insertQuery = "INSERT INTO `$tbname` ( `id`) VALUES ( '$uniqueID')";  
            $flag=0;
            if($filename == "" && disc=="")
        {
            echo 
            "
            <div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Blank not Allowed</h4>
            </div>
            ";
        }else{
            if (mysqli_query($conn, $insertQuery1) && $conn->query($insertQuery)) {
                
                
                move_uploaded_file($tempfile, $folder);
                echo "Data inserted into the '$tbname' table successfully.<br>";
                echo "Selected Option: " . $selectedOption . "<br>";
                echo "Uploaded Image: " . $filename . "<br>";
                echo "Text Input: " . $textInput . "<br>";
             } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
        } else {
            echo "No data found for the selected option.";
        }
    }
}
?>