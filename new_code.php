<?php
session_start();
// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Fund_Admin_Code = $_POST['Fund_Admin_Code'];
        $Fund_Admin_Title = $_POST['Fund_Admin_Title'];

        // Initialize entered values array
        $entered_values = [
            'Fund_Admin_Code' => $Fund_Admin_Code,
            'Fund_Admin_Title' => $Fund_Admin_Title,
        ];

            // Check if the username already exists
            $query = 'SELECT Fund_Admin_Code FROM fundcode_db WHERE Fund_Admin_Code = ? LIMIT 1';
            $stmt = $data->prepare($query);
            $stmt->bind_param('s', $Fund_Admin_Code);
            $stmt->execute();

            if ($stmt->fetch()) {
                $response = [
                    'success' => false,
                    'message' => 'Fund Code already exists. Please choose a different code.'
                ];
            } else {
                // Insert the user if the username is not found
                $insertQuery = 'INSERT INTO fundcode_db (Fund_Admin_Code, Fund_Admin_Title) 
                                VALUES (?, ?)';

                $insertStmt = $data->prepare($insertQuery);
                $insertStmt->bind_param('ss', $Fund_Admin_Code, $Fund_Admin_Title);

                if ($insertStmt->execute()) {
                    $response = [
                        'success' => true,
                        'message' => $Fund_Admin_Code . ' is successfully added as ' . $Fund_Admin_Title
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
    
    header('location: ./fund.php');
?>
