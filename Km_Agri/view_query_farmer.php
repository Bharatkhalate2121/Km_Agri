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
       /* Styles for the dialog */
/* Styles for the dialog */
.dialog {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    width: 300px;
    height: 300px; /* Square dimensions */
    padding: 20px;
    z-index: 1000;
}

.dialog-content {
    text-align: center;
}

/* Styles for the close button */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

/* Additional styling for the rating and submit button */
.rating {
    margin: 20px 0;
}

/* Hide radio buttons */
.rating input[type="radio"] {
    display: none;
}

/* Style the labels as star icons */
.rating label::before {
    content: "\2605"; /* Unicode star character */
    font-size: 30px;
    color: #ccc;
    cursor: pointer;
}

/* Style for the selected star */
.rating input[type="radio"]:checked + label::before {
    color: #ffcc00;
}

button#submitRating {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button#submitRating:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <br><br>
    <div class="container">
        <center>
            <h1>Queries Uploaded By <?php echo $_SESSION["name"]; ?></h1>
        </center>
        <br>
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
                   // $solution = $row['']; // Load existing solution if any
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
                            <button class="btn btn-danger" onclick="initializeRatingDialog('.$farmer_id.')">Delete'.$farmer_id.'</button>
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
                        </div>
                        <form method="post" action="process_rating.php">
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
                                <input type="hidden" name="farmer_id" value="' . $farmer_id . '">
                                <button type="submit" id="submitRating">Submit</button>
                            </div>
                        </div>
                    </form>
                    ';
                        
                }
            //}
            ?>
        </ul>
    </div>


    
    <script>


function initializeRatingDialog(farmerId) {
    const dialog = document.getElementById('dialog');
    const closeDialog = document.getElementById('closeDialog');
    const stars = document.querySelectorAll('.rating input[type="radio"]');
    const submitRating = document.getElementById('submitRating');

    // Open the dialog when this function is called
    dialog.style.display = 'block';

    closeDialog.addEventListener('click', () => {
        dialog.style.display = 'none';
    });

    submitRating.addEventListener('click', () => {
        const selectedStars = document.querySelector('.rating input[type="radio"]:checked');
        if (selectedStars) {
            const rating = selectedStars.value;
            // Send the rating to the PHP script using AJAX
            alert(`You rated this item ${rating} stars.`);
            sendRatingToServer(rating);
            deleteEntry(farmerId);            
            dialog.style.display = 'none';
            
        } else {
            alert('Please select a rating before submitting.');
        }
    });

    function sendRatingToServer(rating) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_rating.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the PHP script (if needed)
                console.log(xhr.responseText);
            }
        };
        xhr.send(`rating=${rating}`);
    }
}

// Call the function to initialize the rating dialog



function deleteEntry(farmerId) {
                farmerId:farmerId
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