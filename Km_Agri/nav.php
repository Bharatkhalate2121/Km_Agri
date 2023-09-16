<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>KM Agri</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include Bootstrap CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <title>km agri</title>
</head>
<body>


<!-- Topbar Start -->
<div class="container-fluid " style="background-color: #ffffff;">
        <div class="row gx-5 py-3 align-items-left">
            <div class="col-lg-2">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.html" class="navbar-brand ms-lg-5">
                        <h1 class=" display-4 text-primary"><span class="text-secondary">Km</span>_Agri</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="d-flex  justify-content-end">
                <?php
                 require('conn.php');
                 if(isset($_SESSION["name"]))
                    {
                        echo '
                        <h3 class="" >'.$_SESSION['name'].'</h3> &nbsp;&nbsp;
                        <form method="post">
                        <button type="submit" name="logout" id="logout" class="btn btn-primary" data-bs-toggle="modal"  >Log Out
</button> </form>';
if (isset($_POST["logout"])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to a login page or wherever you want
    exit();
}       

                    }
                    else
                    {
                        echo '
                         <form method="post">
                        <button type="submit" name="login" id="login" class="btn btn-primary" data-bs-toggle="modal"  >Log In
</button> </form>';
if (isset($_POST["login"])) {
    header("Location: login1.php"); // Redirect to a login page or wherever you want
    //exit();
}  
                    }
                    ?>
            </div>
            </div>
        </div>
    </div>
    
    <!-- Topbar End -->


</body>
</html>