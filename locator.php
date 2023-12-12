<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>

<!-- Your existing HTML content -->

<!-- Add the following HTML and inline CSS code to center and make the image responsive -->
<div style="text-align: center;">
    <img src="./img/first-floor.png" alt="Example Image" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
</div>

<div style="text-align: center;">
    <img src="./img/second-floor.png" alt="Example Image" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
</div>

<div style="text-align: center;">
    <img src="./img/third-floor.png" alt="Example Image" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
</div>

<?php
include('partials/footer.php')
?>
