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
            $farmer_name=$_SESSION['name'];
            $query = "SELECT * FROM `problems` WHERE farmer_name='$farmer_name';";
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
                   $sol=$row['que'];

    
                    if($sol){
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><h5 class="mt-2">' . $farmer_id . '</h5></div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                        </li>';
                    }
                    else{
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><h5 class="mt-2">' . $farmer_id . '</h5></div>
                            <button class="btn btn-danger" onclick="deleteEntry('.$farmer_id.')">Delete'.$farmer_id.'</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#farmerModal' . $farmer_id . '">View Query</button>
                        </li>';
                        echo '<script>const farmerId1 = ' . json_encode($farmer_id) . ';</script>';
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
                                        
                                        <!-- Simple HTML form for submitting solutions -->
                                        <form method="post" action="get_solution.php">
                                            <input type="hidden" name="farmer_id" value="' . $farmer_id . '">
                                            <button type="submit" class="btn btn-primary">Submit Solution</button>
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

    <script>
                function deleteEntry(farmerId) {
                farmerId =farmerId;
                if (confirm("Are you sure you want to delete this entry?" + farmerId1)) {
                    // Send an AJAX request to delete the entry from the database
                    $.ajax({
                        type: "POST",
                        url: "delete_entry_far.php", // Replace with the actual URL to your delete script
                        data: {
                            farmerId: farmerId1
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

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    


</body>
</html>