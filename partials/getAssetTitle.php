<?php
// getAccountTitle.php

// Include your database connection file
@include('../Controller/db.php');

// Fetch Account Title based on the provided Account Number
if (isset($_GET['accountNumber'])) {
    $accountNumber = $_GET['accountNumber'];

    // Debugging: Log the received account number
    error_log('Received Account Number: ' . $accountNumber);

    $query = "SELECT Account_Title FROM itemcategory_db WHERE Account_Number = ?";
    
    $stmt = $data->prepare($query);
    $stmt->bind_param('s', $accountNumber);
    $stmt->execute();
    $stmt->bind_result($accountTitle);
    
    if ($stmt->fetch()) {
        // Debugging: Log the retrieved account title
        error_log('Retrieved Account Title: ' . $accountTitle);

        echo json_encode(['account_title' => $accountTitle]);
    } else {
        // Debugging: Log a message if no matching record found
        error_log('No matching record found for Account Number: ' . $accountNumber);

        echo json_encode(['account_title' => '']); // Return an empty string if no matching record found
    }

    $stmt->close();
} else {
    // Debugging: Log a message if no account number provided
    error_log('No Account Number provided');

    echo json_encode(['account_title' => '']); // Return an empty string if no account number provided
}
?>
