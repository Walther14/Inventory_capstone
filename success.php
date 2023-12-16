<?php
session_start(); // Start the session to access session variables

// Include necessary files
include 'partials/header.php';

include 'partials/topbar.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            text-align: center;
        }

        .image-container {
    
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20vh;
            margin-top: 20px;
        }

        img {
            height: 100%;
        }
    </style>
</head>

<body>
    <h2 style="margin-top: 15vh;">Update Successful</h2>

    <p>Your profile has been successfully updated, please log out and try your new credentials.</p>

    <div>
        <a href="logout.php" style=" padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;">Logout</a>
    </div>

    <div class="image-container">
        <img style="margin-top: 30vh;" src="./img/prime.png" alt="prime">
    </div>

    <?php include 'partials/footer.php'; ?>
</body>

</html>
