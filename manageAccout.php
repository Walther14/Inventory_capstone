<?php
ob_start(); // Start output buffering
session_start(); // Start the session to access session variables

// Include necessary files
include 'Controller/db.php';
include 'partials/header.php';
include 'partials/sidebar.php';
include 'partials/topbar.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Initialize error messages
$password_match_error = $password_length_error = $duplicate_username_error = '';

// Retrieve the user's information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($data, $query);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($data));
}

$user = mysqli_fetch_assoc($result);

// Update user information when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data to prevent SQL injection
    $first_name = mysqli_real_escape_string($data, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($data, $_POST['last_name']);
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $password = $_POST['password'];

    // Confirm password
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $password_match_error = "Passwords do not match";
    }

    // Check password length and alphanumeric characters
    if (strlen($password) < 8 || !preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $password)) {
        $password_length_error = "Password must be at least 8 characters long and contain both letters and numbers";
    }

    // Check for duplicate username
    $duplicate_check_query = "SELECT id FROM users WHERE username = '$username' AND id != $user_id";
    $duplicate_check_result = mysqli_query($data, $duplicate_check_query);

    if (!$duplicate_check_result) {
        die("Error checking duplicate username: " . mysqli_error($data));
    }

    if (mysqli_num_rows($duplicate_check_result) > 0) {
        $duplicate_username_error = "Username already exists. Please choose a different username.";
    }

    // If there are no errors, proceed with the update
    if (empty($password_match_error) && empty($password_length_error) && empty($duplicate_username_error)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Update user information in the database
        $update_query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username', password = '$hashed_password' WHERE id = $user_id";
        $update_result = mysqli_query($data, $update_query);

        if (!$update_result) {
            die("Error updating user data: " . mysqli_error($data));
        }
    }
     // If there are no errors, proceed with the update
     if (empty($password_match_error) && empty($password_length_error) && empty($duplicate_username_error)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Update user information in the database
        $update_query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username', password = '$hashed_password' WHERE id = $user_id";
        $update_result = mysqli_query($data, $update_query);

        if (!$update_result) {
            die("Error updating user data: " . mysqli_error($data));
        }

        // Close the session and redirect to success.php
        session_write_close();
        header("Location: success.php");
        exit();
    }
}
ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<style>
        body {


            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>

<body>
    <h2 style="text-align: center; margin-top: 10vh;">Update Profile</h2>

    <!-- Display error messages -->
    <?php if (!empty($password_match_error)) : ?>
        <p style="text-align: center;" class="error-message"><?= $password_match_error ?></p>
    <?php endif; ?>
    <?php if (!empty($password_length_error)) : ?>
        <p  style="text-align: center;" class="error-message"><?= $password_length_error ?></p>
    <?php endif; ?>
    <?php if (!empty($duplicate_username_error)) : ?>
        <p style="text-align: center;" class="error-message"><?= $duplicate_username_error ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $user['first_name'] ?>" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $user['last_name'] ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <input type="submit" style="background-color: #530000;" value="Update">
    </form>
    <?php include('./partials/footer.php') ?>
</body>


</html>
