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
<html>
<head>
    <title>Insert Data into Database</title>
</head>
<body>
    <h2>Insert Data into Database</h2>

    <?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection details
        require('conn.php');

        // Get data from the form
        $text_data = $_POST["text_data"];

        // Insert the data into the database
        $sql = "INSERT INTO pik (name) VALUES ('$text_data')";


        if ($conn->query($sql) === TRUE) {
            
            $createQuery = "CREATE TABLE $text_data(`name` TEXT NOT NULL,`job` INT(32) NOT NULL,`tb_name` TEXT NOT NULL)";
            if ($conn->query($createQuery) === TRUE)
            {
                echo "Data inserted successfully! and table created";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="text_data">Text:</label>
        <input type="text" id="text_data" name="text_data" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

