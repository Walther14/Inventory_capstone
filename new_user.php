<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Initialize entered values array
        $entered_values = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'role' => $role,
            'username' => $username,
        ];

        // Validation (you can customize this based on your requirements)
        if ($password !== $confirm_password) {
            $response = [
                'success' => false,
                'message' => 'Passwords do not match. Please make sure both passwords are the same.'
            ];
            $entered_values['password'] = $entered_values['confirm_password'] = '';
        } elseif (strlen($password) < 8) {
            $response = [
                'success' => false,
                'message' => 'Password is weak. It should be at least 8 characters long.'
            ];
            $entered_values['password'] = $entered_values['confirm_password'] = '';
        } elseif (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
            $response = [
                'success' => false,
                'message' => 'Password is weak. It should contain both alphabets and numbers.'
            ];
        } else {
            // Password is strong, proceed with the rest of the code
            $encrypted = password_hash($password, PASSWORD_DEFAULT);

            // Check if the username already exists
            $query = 'SELECT username FROM users WHERE username = ? LIMIT 1';
            $stmt = $data->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();

            if ($stmt->fetch()) {
                $response = [
                    'success' => false,
                    'message' => 'Username already exists. Please choose a different username.'
                ];
            } else {
                // Insert the user if the username is not found
                $insertQuery = 'INSERT INTO users (first_name, last_name, role, username, password, created_at, updated_at) 
                                VALUES (?, ?, ?, ?, ?, NOW(), NOW())';

                $insertStmt = $data->prepare($insertQuery);
                $insertStmt->bind_param('sssss', $first_name, $last_name, $role, $username, $encrypted);

                if ($insertStmt->execute()) {
                    $response = [
                        'success' => true,
                        'message' => $first_name . ' ' . $last_name . ' is successfully added as ' . $role
                    ];

                    // Clear entered values if no error
                    $entered_values = [];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'An error occurred while adding the user.'
                    ];
                }
            }
        }

        // Store entered values in session
        $_SESSION['entered_values'] = $entered_values;
    }

    $_SESSION['response'] = $response;
    
    header('location: ./User_Management.php');
}
?>
