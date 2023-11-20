<?php
session_start();

// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
if ($data) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $position_designation = $_POST['position_designation'];

        // Initialize entered values array
        $entered_values = [
            'name' => $name,
            'department' => $department,
            'position_designation' => $position_designation,
        ];

        // Check if the name already exists for a different staff member
        $query = 'SELECT staff_ID FROM staff_db WHERE name = ? AND staff_ID != ? LIMIT 1';
        $stmt = $data->prepare($query);
        $stmt->bind_param('si', $name, $id);
        $stmt->execute();

        if ($stmt->fetch()) {
            $response = [
                'success' => false,
                'message' => 'Staff name already exists for another staff member.'
            ];
        } else {
            // Update staff information
            $sql = "UPDATE staff_db SET name=?, department=?, position_designation=? WHERE staff_ID=?";
            $updateStmt = $data->prepare($sql);
            $updateStmt->bind_param('sssi', $name, $department, $position_designation, $id);

            if ($updateStmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'Staff information updated successfully.'
                ];

                // Clear entered values if no error
                $entered_values = [];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error updating staff information: ' . $updateStmt->error
                ];
            }
        }
    }

    // Store entered values and response in session
    $_SESSION['entered_values'] = $entered_values;
    $_SESSION['response'] = $response;
}

// Redirect to staff.php outside of the if ($data) block
header('location: ../staff.php');
exit; // Add exit to prevent further execution
?>
