<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');

// Fetch current user information from the database
$user_id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($connection, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle database error
    die("Database error: " . mysqli_error($connection));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user information in the database
    $new_first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $new_last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $new_username = mysqli_real_escape_string($connection, $_POST['username']);
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    $update_query = "UPDATE users SET first_name = '$new_first_name', last_name = '$new_last_name', username = '$new_username', password = '$new_password' WHERE id = $user_id";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        // Redirect to a success page or display a success message
        header("Location: inventory_index.php"); // Replace 'profile.php' with the page where you want to redirect after successful update
        exit();
    } else {
        // Handle update error
        die("Update error: " . mysqli_error($connection));
    }
}
?>

<!-- HTML form for updating user information -->
<div class="container">
    <h2>Update Your Information</h2>
    <form method="post" action="">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Update">
    </form>
</div>

<?php
@include('partials/footer.php');
?>
