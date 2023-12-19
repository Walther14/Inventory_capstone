<?php
session_start();

// Include the database connection
@include('C:/xampp/htdocs/Inventory_capstone/Controller/db.php');

// Check if the database connection is successful
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
       
        
        date_default_timezone_set('Asia/Manila');
        $current_time = date('Y-m-d H:i:s');

       
        $query = "UPDATE transfer_db SET custodian_notif = 0, dateTime = '$current_time', archive = 1 WHERE transfer_id = $id";
        
        if ($data->query($query) === TRUE) {

            
        

echo 'anta';
    
    
                // header("Location: ../transfer.php");
            
        } else {
            echo "Error updating record: " . $data->error;
        }

      
    }




?>
