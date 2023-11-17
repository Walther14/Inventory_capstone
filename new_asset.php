<?php
session_start();
// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Asset_Code = $_POST['Asset_Code'];
        $Asset_Title = $_POST['Asset_Title'];

        // Initialize entered values array
        $entered_values = [
            'Asset_Code' => $Asset_Code,
            'Asset_Title' => $Asset_Title,
        ];

            // Check if the username already exists
            $query = 'SELECT Asset_Code FROM asset_db WHERE Asset_Code = ? LIMIT 1';
            $stmt = $data->prepare($query);
            $stmt->bind_param('s', $Asset_Code);
            $stmt->execute();

            if ($stmt->fetch()) {
                $response = [
                    'success' => false,
                    'message' => 'Asset Code already exists. Please choose a different code.'
                ];
            } else {
                // Insert the user if the username is not found
                $insertQuery = 'INSERT INTO asset_db (Asset_Code, Asset_Title) 
                                VALUES (?, ?)';

                $insertStmt = $data->prepare($insertQuery);
                $insertStmt->bind_param('ss', $Asset_Code, $Asset_Title);

                if ($insertStmt->execute()) {
                    $response = [
                        'success' => true,
                        'message' => $Asset_Code . ' is successfully added as ' . $Asset_Title
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
    
    header('location: ./Asset_Class.php');
?>
