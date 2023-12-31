<?php
session_start();
// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Account_Number = $_POST['Account_Number'];
        $Account_Title = $_POST['Account_Title'];

        // Initialize entered values array
        $entered_values = [
            'Account_Number' => $Account_Number,
            'Account_Title' => $Account_Title,
        ];

            // Check if the username already exists
            $query = 'SELECT Account_Number FROM itemcategory_db WHERE Account_Number = ? LIMIT 1';
            $stmt = $data->prepare($query);
            $stmt->bind_param('s', $Account_Number);
            $stmt->execute();

            if ($stmt->fetch()) {
                $response = [
                    'success' => false,
                    'message' => 'Account Number already exists. Please choose a different number.'
                ];
            } else {
                // Insert the user if the username is not found
                $insertQuery = 'INSERT INTO itemcategory_db (Account_Number, Account_Title) 
                                VALUES (?, ?)';

                $insertStmt = $data->prepare($insertQuery);
                $insertStmt->bind_param('ss', $Account_Number, $Account_Title);

                if ($insertStmt->execute()) {
                    $response = [
                        'success' => true,
                        'message' => $Account_Number . ' is successfully added as ' . $Account_Title
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
    
    header('location: ./item_Category.php');
?>
