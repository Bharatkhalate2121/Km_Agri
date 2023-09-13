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
    <title>expert</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <center>
            <h1>Expert Profiles</h1>
        </center>
        <ul class="list-group" style="margin-top: 10px;">
            <?php
            require('conn.php');
            $log_name = $_SESSION['name'];
            $query = "SELECT * FROM `$log_name`;";
            
            $result = $conn->query($query);
            
            while ($ro = $result->fetch_assoc()){
                $id=$ro['id'];
                $query1 = "SELECT * FROM `problems` WHERE id='$id';";
                $result1 = $conn->query($query1);
                while ($row = $result1->fetch_assoc()) {
                    $farmer_name = $row['farmer_name'];
                    $farmer_id = $row['id']; // Assuming you have a unique ID for each farmer
                    $img="./image/".$row['img'];
                    $sol=$row['ans'];
                    // echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                    // <div><h5 class="mt-2">' . $farmer_name . '</h5></div>
                    // <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                    // </li>';
                    
                   if ($sol != null) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><h5 class="mt-2">' . $farmer_name . '</h5></div>
                                <button class="btn btn-danger" onclick="deleteEntry(' . $farmer_id . ')">Delete'.$farmer_id.'</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                              </li>';
                    } else {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><h5 class="mt-2">' . $farmer_name . '</h5></div>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                              </li>';
                    }

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
                                    
                                    
                                    <form method="post">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="option" id="askQueryRadio" value="askQuery" checked>
                                    <label class="form-check-label" for="askQueryRadio">
                                    Ask a Query to Farmer
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="option" id="submitSolutionRadio" value="submitSolution">
                                    <label class="form-check-label" for="submitSolutionRadio">
                                    Submit Solution
                                    </label>
                                    </div>
                                    <div class="form-group">
                                    <label for="query'.$farmer_id.'">Your Query or Solution:</label>
                                    <textarea class="form-control" name="text" id="query'.$farmer_id.'" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" name="farmer_id" value="' . $id . '">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
   
    
    
    </div>
    </div>
    </div>';
}}
?>
            <script>
            function deleteEntry(farmerId) {
                if (confirm("Are you sure you want to delete this entry?" + farmerId)) {
                    // Send an AJAX request to delete the entry from the database
                    $.ajax({
                        type: "POST",
                        url: "delete_entry.php", // Replace with the actual URL to your delete script
                        data: {
                            farmerId: farmerId
                        },
                        success: function(response) {
                            // Handle the response here if needed
                            // You can also reload the page or remove the entry from the list
                            location.reload(); // Reload the page to reflect the changes
                            //confirm(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle the error here
                            console.error(error);
                        }
                    });
                }
            }
            </script>

        </ul>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require('conn.php'); // Include your database connection script
        
        // Get the data from the form
        $farmerId = $_POST["farmer_id"];
        $text = $_POST["text"];
        if (isset($_POST["option"])) {
            $option = $_POST["option"];
            

    if ($option === "askQuery") {
        $updateQuery = "UPDATE `problems` SET `que` = '$text' WHERE `id` = '$farmerId'";
        
        // Use prepared statements to prevent SQL injection
        if ($stmt = $conn->query($updateQuery)) {
            echo $text."".$farmerId;
            echo "query submitted successfully.";
            
        }  } elseif ($option === "submitSolution") {
            $updateQuery = "UPDATE `problems` SET `ans` = '$text' WHERE `id` = '$farmerId'";
            
            // Use prepared statements to prevent SQL injection
            if ($stmt = $conn->query($updateQuery)) {
                echo $text."".$farmerId;
                echo "Solution submitted successfully.";
                
            }  }
            
            // Display a success message based on the selected option
            echo "Operation completed successfully.";
} else {
    echo "Please select an option."; // Handle the case where no option is selected.
}
}

?>



    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>