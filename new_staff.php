<?php
session_start();
// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $department = $_POST['department'];
        $position_designation = $_POST['position_designation'];


        // Initialize entered values array
        $entered_values = [
            'name' => $name,
            'department' => $department,     
            'position_designation' => $position_designation,
        ];

            // Check if the username already exists
            $query = 'SELECT name FROM staff_db WHERE name = ? LIMIT 1';
            $stmt = $data->prepare($query);
            $stmt->bind_param('s', $name);
            $stmt->execute();

            if ($stmt->fetch()) {
                $response = [
                    'success' => false,
                    'message' => 'Staff already exists'
                ];
            } else {
                // Insert the user if the username is not found
                $insertQuery = 'INSERT INTO staff_db (name, department, position_designation ) 
                                VALUES (?, ?, ?)';

                $insertStmt = $data->prepare($insertQuery);
                $insertStmt->bind_param('sss', $name, $department, $position_designation);

                if ($insertStmt->execute()) {
                    $response = [
                        'success' => true,
                        'message' => $name. ' is successfully added as ' . $position_designation
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
    
    header('location: ./staff.php');
?>
