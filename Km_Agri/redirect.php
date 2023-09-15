<?php
if ($_SESSION['des']=="1")
{
header('Location: view_query_expert.php');
}
else {
    header('Location: view_query_farmer.php');
}
exit; // Make sure to exit the script to prevent further execution
?>