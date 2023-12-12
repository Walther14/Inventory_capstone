<?php
// view.php

// Include your database connection or configuration file
@include('db.php');

// Assuming you want to fetch data based on the 'id' parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform your database query here using $id
    $query = "SELECT * FROM inventory_db WHERE id = $id";
    $result = $data->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        $row = $result->fetch_assoc();

        // Return the data as JSON
        header('Content-Type: application/json');
        $imageData = $row['photo'];
        echo json_encode([$row, 'photo' => base64_encode($imageData)]);
    } else {
        // Handle the case when the query fails
        echo json_encode(array('error' => 'Query failed'));
    }
} else {
    // Handle the case when 'id' parameter is not provided
    echo json_encode(array('error' => 'Invalid request'));
}
?>
