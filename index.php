
    <?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


    @include('partials/header.php');
    @include('partials/sidebar.php');
    @include('partials/topbar.php');
    ?>




<?php
include('partials/footer.php')
?>