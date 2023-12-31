<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/-->
<!DOCTYPE html>
<html>
<head>
<title>FeedbacK Engine</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body class="agileits_w3layouts">
    <h1 class="agile_head text-center">Feedback Form</h1>
    <div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form method="post" class="agile_form">
		  <h2>How satisfied were you with our Service?</h2>
			 <ul class="agile_info_select">
			 <li><input type="radio" name="view" value="5" id="excellent" required> 
				 	  <label for="excellent">excellent</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="view" value="4" id="excellent" required> 
				 	  <label for="excellent">good</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="view" value="3" id="good"> 
					  <label for="good"> avrage</label>
				      <div class="check w3ls"></div>
				 </li>
				 <li><input type="radio" name="view" value="2" id="neutral">
					 <label for="neutral">neutral</label>
				     <div class="check wthree"></div>
				 </li>
				 <li><input type="radio" name="view" value="1" id="poor"> 
					  <label for="poor">poor</label>
				      <div class="check w3_agileits"></div>
				 </li>
			 </ul>	  
			<h2>If you have specific feedback, please write to us...</h2>
			<textarea placeholder="Additional comments" class="w3l_summary" name="comments" required=""></textarea>
			<input type="text" placeholder="Your Name (optional)" name="name"  />
			<input type="email" placeholder="Your Email (optional)" name="email"/>
			<input type="text" placeholder="Your Number (optional)" name="num"  /><br>
			<center><input type="submit"  class="agileinfo" /></center>
	  </form>
	</div>
	<div class="agileits_copyright text-center">
			<p>© 2019 </p>
	</div>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the rating from the form
    $selectedColor = $_POST["view"];

    // Validate the rating (you can add more validation as needed)
    if ($selectedColor) {
        // Database connection details
        require('conn.php');

        // Create a database connection
        
        // Insert the rating into the database
        $sql = "INSERT INTO ratings (rating) VALUES ('$selectedColor')";

        if ($conn->query($sql) === TRUE) {
            echo "Rating stored successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Invalid rating.";
    }
} else {
    echo "Form not submitted.";
}
?>
