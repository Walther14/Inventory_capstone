<?php


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}


?>

<div class="m-3" style="margin-right: 5rem; height: calc(100vh - 118px); background-color: #fbfcf8; width: 0rem; position: relative;">
</div>

<?php
include('./partials/footer.php')
?>