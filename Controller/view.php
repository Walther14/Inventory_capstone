<?php
// view.php

// Include your database connection or configuration file
@include('db.php');

// Assuming you want to fetch data based on the 'id' parameter
if (isset($_GET['id'])) {
    // Use prepared statements to prevent SQL injection
    $id = $_GET['id'];
    $stmt = $data->prepare("SELECT inventory_db.*, users.*
    FROM inventory_db 
    LEFT JOIN users ON inventory_db.Issued_To = users.user_id
    WHERE inventory_db.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result) {
        // Fetch data
        $row = $result->fetch_assoc();

        // Return the data as JSON
        header('Content-Type: application/json');

        // Check if 'photo' field exists before encoding
        if (isset($row['photo'])) {
            $imageData = $row['photo'];
            $row['photo'] = base64_encode($imageData);
        }

        echo json_encode( [$row]);
    } else {
        // Handle the case when the query fails
        echo json_encode(array('error' => 'Query failed'));
    }
    $stmt->close(); // Close the prepared statement
} else {
    // Handle the case when 'id' parameter is not provided
    echo json_encode(array('error' => 'Invalid request'));
}
?>
