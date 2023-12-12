<?php
// getAccountTitle.php

// Include your database connection file
@include('../Controller/db.php');

// Fetch Account Title based on the provided Account Number
if (isset($_GET['adminCode'])) {
    $adminCode = $_GET['adminCode'];

    // Debugging: Log the received account number
    error_log('Received Admin Code: ' . $adminCode);

    $query = "SELECT Fund_Admin_Title FROM fundcode_db WHERE Fund_Admin_Code = ?";
    
    $stmt = $data->prepare($query);
    $stmt->bind_param('s', $adminCode);
    $stmt->execute();
    $stmt->bind_result($fund_admin_title);
    
    if ($stmt->fetch()) {
        // Debugging: Log the retrieved account title
        error_log('Retrieved Account Title: ' . $fund_admin_title);

        echo json_encode(['Fund_Admin_Title' => $fund_admin_title]);
    } else {
        // Debugging: Log a message if no matching record found
        error_log('No matching record found for Account Number: ' . $adminCode);

        echo json_encode(['Fund_Admin_Title' => '']); // Return an empty string if no matching record found
    }

    $stmt->close();
} else {
    // Debugging: Log a message if no account number provided
    error_log('No Account Number provided');

    echo json_encode(['Fund_Admin_Title' => '']); // Return an empty string if no account number provided
}
?>
