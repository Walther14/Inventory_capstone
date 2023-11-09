<?php

include('./Controller/db.php');
// User information
$username = "Admin";
$defaultPassword = "password"; // You should hash this password in a real-world scenario

// Hash the password using a strong hashing algorithm like password_hash()
$hashedPassword = password_hash($defaultPassword, PASSWORD_DEFAULT);

// SQL query to insert the new user into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

// Execute the query
if ($data->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
