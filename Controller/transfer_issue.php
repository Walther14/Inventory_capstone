<?php
session_start();

// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['item_id'];
        $name = $_POST['user_id'];
        $transfer_id = $_POST['transfer_id'];
       

       
        // Check if the name already exists for a different staff member
        $query = "UPDATE inventory_db SET Issued_to = '$name' WHERE id = $id";
        if ($data->query($query) === TRUE) {


            $query2 = "DELETE FROM transfer_db WHERE transfer_id = $transfer_id";

            if ($data->query($query2) === TRUE) {


    
    
                header("Location: ../transfer.php");
            }
        } else {
            echo "Error updating record: " . $data->error;
        }

      
    }




?>
