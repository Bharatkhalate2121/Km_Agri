<!DOCTYPE html>
<html>
  <head>
  <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- <link href="main.css" rel="stylesheet"> -->

    <style>
/* ===== Google Font Import - Poformsins ===== */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #4070f4;
}

.container {
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  margin: 0 20px;
}

.container .forms {
  display: flex;
  align-items: center;
  height: 440px;
  width: 200%;
  transition: height 0.2s ease;
}

.container .form {
  width: 50%;
  padding: 30px;
  background-color: #fff;
  transition: margin-left 0.18s ease;
}

.container.active .login {
  margin-left: -50%;
  opacity: 0;
  transition: margin-left 0.18s ease, opacity 0.15s ease;
}

.container .signup {
  opacity: 0;
  transition: opacity 0.09s ease;
}
.container.active .signup {
  opacity: 1;
  transition: opacity 0.2s ease;
}

.container.active .forms {
  height: 600px;
}
.container .form .title {
  position: relative;
  font-size: 27px;
  font-weight: 600;
}

.form .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  background-color: #4070f4;
  border-radius: 25px;
}

.form .input-field {
  position: relative;
  height: 50px;
  width: 100%;
  margin-top: 30px;
}

.input-field input {
  position: absolute;
  height: 100%;
  width: 100%;
  padding: 0 35px;
  border: none;
  outline: none;
  font-size: 16px;
  border-bottom: 2px solid #ccc;
  border-top: 2px solid transparent;
  transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) {
  border-bottom-color: #4070f4;
}

.input-field i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: #999;
  font-size: 23px;
  transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ i {
  color: #4070f4;
}

.input-field i.icon {
  left: 0;
}
.input-field i.showHidePw {
  right: 0;
  cursor: pointer;
  padding: 10px;
}

.form .checkbox-text {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
}

.checkbox-text .checkbox-content {
  display: flex;
  align-items: center;
}

.checkbox-content input {
  margin-right: 10px;
  accent-color: #4070f4;
}

.form .text {
  color: #333;
  font-size: 14px;
}

.form a.text {
  color: #4070f4;
  text-decoration: none;
}
.form a:hover {
  text-decoration: underline;
}

.form .button {
  margin-top: 35px;
}

.form .button input {
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  letter-spacing: 1px;
  border-radius: 6px;
  background-color: #4070f4;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button input:hover {
  background-color: #265df2;
}

.form .login-signup {
  margin-top: 30px;
  text-align: center;
}

</style>


  </head>
  <body>
  <div class="container active" style="padding: top 0%;">
      <div class="forms" >
          <div class="form signup" >
              <a href="login1.php"><img src="cross.svg" alt="" style="object-fit:contain;height:30px;float:right; "></a>
              <span class="title">Sign-up</span>
              <form method="POST" action="register.php">   
                  
      <div id='veri' >
      <div class="input-field" >
        <!-- <label for="uname"><strong>Phone Number</strong></label> -->
        <input type="text" name="number" id="number" placeholder="Enter phone number" name="uname" required>
        <i class="uil uil-envelope icon"></i>  
    </div>
    
    <div class="input-field" >
      <div id="recaptcha-container"></div>
</div>
<div class="input-field" >
      <button type="button" class="input-field button" style="width:50%; height:60%; background-color: #4070f4 "; onclick="phoneAuth();">Send Otp</button>
</div>

<div class="input-field">
    <!-- <label for="uname"><strong>Verification Code</strong></label> -->
    <input type="text" id="verificationCode" placeholder="Enter recieved OTP">
    <i class="uil uil-lock icon"></i>  
</div>
<div class="input-field">
      <button type="button" class="input-field button" style="background-color: #4070f4" onclick="codeverify();">Verify code</button>
      <!-- <i class="uil uil-envelope icon"></i>   -->
</div>
</div>
    <div  id='dat' hidden="true">
    <div class="input-field">
                <!-- <label for="name">Enter Name</label> -->
                <input type="text" placeholder="rushi mhamane" id="name" name="name" required>
                <i class="uil uil-user icon"></i>
            </div>
            <div class="input-field">
                <!-- <label for="username">User Name</label> -->
                <input type="text" placeholder="Create User Name minimum 4 character" id="username" name="username" required>
                <i class="uil uil-user-md icon"></i>
            </div>
            <div class="input-field">
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password length 6 with symbol eg.abc@123" id="password" name="password" required>
                <i class="uil uil-lock icon"></i>
            </div>
            <div class="input-field">
            <button type="submit" class="input-field button" style="background-color: #4070f4" onclick="ct();">Submit</button>
</div>
<br>
            <!-- <p>To Go Login Page :</p>
            <a href="login.php" class="login-button">Login</a> -->
            <div class="login-signup">

            <span class="text"
              >Already a member?
              <a href="login1.php" class="text">Login Now</a>
             
            </span>
        </form>
    </div>
</div>
</div>

    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
    apiKey: "AIzaSyBRje09z_Mfv2NjFiYNSZ2AkO3UhJ3UY5U",
    authDomain: "connection-php-e6933.firebaseapp.com",
    projectId: "connection-php-e6933",
    storageBucket: "connection-php-e6933.appspot.com",
    messagingSenderId: "425221808180",
    appId: "1:425221808180:web:b843891abfc3cd24d7ea61",
    measurementId: "G-BQRR9Y60CK"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
     firebase.analytics();
</script>
    <script src="firebase.js" type="text/javascript"></script>
    <script >
const container = document.querySelector(".container");
  pwShowHide = document.querySelectorAll(".showHidePw"),
  pwFields = document.querySelectorAll(".password"),
  // signUp = document.querySelector(".signup-link"),
  // login = document.querySelector(".login-link");

//   js code to show/hide password and change icon
pwShowHide.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    pwFields.forEach((pwField) => {
      if (pwField.type === "password") {
        pwField.type = "text";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye-slash", "uil-eye");
        });
      } else {
        pwField.type = "password";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye", "uil-eye-slash");
        });
      }
    });
  });
});

// js code to appear signup and login form
// signUp.addEventListener("click", () => {
//   container.classList.add("active");
// });
// login.addEventListener("click", () => {
//   container.classList.remove("active");
// });

</script>
  </body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "km_agri";
// echo '<script>alert("Registration Done");</script>';
// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate username format (8 alphanumeric characters)
function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9]{4,14}$/', $username);
}

// Function to validate password format (minimum 6 characters with at least one special character)
function validatePassword($password) {
    return strlen($password) >= 6 && preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/', $password);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "called";
    // var_dump($_POST);
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $mno = $_POST["number"];
    
    
    // Check if the username already exists in the database
    $checkUsernameQuery = "SELECT * FROM farmer_data WHERE u_name = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo '<script>alert("Username already exists. Please choose a different username.");</script>';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        echo '<script>alert("Invalid Name format. Only letters and spaces are allowed.");</script>';
    } elseif (!validateUsername($username)) { // Validate the username format
        echo '<script>alert("Invalid Username format. It should contain 8 alphanumeric characters.");</script>';
    } elseif (!validatePassword($password)) { // Validate the password format
        echo '<script>alert("Invalid Password format. It should be at least 6 characters long and contain at least one special character.");</script>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO farmer_data (f_name, u_name, pass,mno) VALUES ('$name', '$username', '$password','$mno')";
        //echo '<script>alert('.$mno.');</script>';
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registration Done");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

