
    <?php
session_start();

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