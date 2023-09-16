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
    <title>Expert Profiles</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container1 {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="file"],
input[type="text"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
.hidden {
    display: none;
}
.button{
    float: left;
}
.btn-primary:hover {
                background-color: #ff3333; /* Button color on hover */
                border-color: #ff3333; /* Button border color on hover */
                animation: pulse 0.5s ease infinite; /* Simple pulse animation */
            }
 </style>

</head>
<body>
    <br>
<button class='btn btn-primary' id="createPostButton">Create Post</button>

    <div id="postFormContainer" class="container1 hidden">
        <form method="post" enctype="multipart/form-data">
        <label for="image">Upload an image:</label>
        <input type="file" id="image" name="choosefile" accept="image/*">

        <br>

        <label for="text">Enter some text:</label>
        <input type="text" id="text" name="text">

        <br>

        <input type="submit" value="Submit" name="submit">
        </form>
    </div>
    
    <script>document.addEventListener("DOMContentLoaded", function () {
    const createPostButton = document.getElementById("createPostButton");
    const postFormContainer = document.getElementById("postFormContainer");

    createPostButton.addEventListener("click", function () {
        postFormContainer.classList.toggle("hidden");
    });
});
</script>
    <div class="container">
        <center>
            <h1>Community Query</h1>
        </center>
        <ul class="list-group" style="margin-top: 10px;">
            <?php
            require('conn.php');
            $log_name = $_SESSION['name'];
            $farmer_name=$_SESSION['name'];
            $query = "SELECT * FROM `community`";
            $result = $conn->query($query);
            
            while ($row = $result->fetch_assoc()){
                // $id=$ro['id'];
                //$query1 = "SELECT * FROM `problems` WHERE id='$id';";
                // $result1 = $con->query($query1);
                //while ($row = $result1->fetch_assoc()) {
                   // $farmer_name = $row['farmer_name'];
                    $farmer_id = $row['id']; // Use the unique ID for each farmer's query
                    $img = "./image/".$row['img'];
                   // $solution = $row['ans']; // Load existing solution if any
                    
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><h5 class="mt-2">' . $row['disc'] . '</h5></div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                        </li>';

                    // Create a modal for each farmer
                    echo '<div class="modal fade" id="farmerModal' . $farmer_id . '" tabindex="-1" role="dialog" aria-labelledby="farmerModalLabel' . $farmer_id . '" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="farmerModalLabel' . $farmer_id . '">' . $farmer_name . ' Query</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <img src="' . $img . '" alt="' . $farmer_name . '" class="img-fluid">
                                        </div>
                                        <p> ' . $row['disc'] . '.</p>
                                        
                                        <!-- Simple HTML form for submitting solutions -->
                                        <form method="post" action="get_solution_com.php">
                                            <div class="form-group">
                                               </div>
                                            <input type="hidden" name="farmer_id" value="' . $farmer_id . '">
                                            <button type="submit" class="btn btn-primary">Viw replies</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            //}
            ?>
        </ul>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$con = mysqli_connect("localhost", "root", "", "KM_AGRI");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    } else {
        //$selectedOption = $_POST["dropdown"];
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
        //$query = "SELECT * FROM `$selectedOption` ORDER BY `job` ASC LIMIT 1";
        //$result = $conn->query($query);

        //if ($result->num_rows > 0) {
          //  $row = $result->fetch_assoc();
            //$tbname = $row['tb_name'];
            //$name=$row['name'];
           // $updatequery = "UPDATE `$selectedOption` SET  job=job+1 WHERE name='$name';";
           // mysqli_query($conn, $updatequery);
            
            // Insert data into the selected table
            $insertQuery1 = "INSERT INTO `community` ( `id`,`farmer_name`,`img`, `disc` ) VALUES ('$uniqueID', '$fname', '$filename', '$textInput')";  
            //$insertQuery = "INSERT INTO `$tbname` ( `id`) VALUES ( '$uniqueID')";  
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
            if (mysqli_query($conn, $insertQuery1) ) {
                
                
                move_uploaded_file($tempfile, $folder);
                // echo "Data inserted into the '$tbname' table successfully.<br>";
                // echo "Selected Option: " . $selectedOption . "<br>";
                echo "Uploaded Image: " . $filename . "<br>";
                echo "Text Input: " . $textInput . "<br>";
             } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
        // } else {
        //     echo "No data found for the selected option.";
        // }
    }
}
?>

