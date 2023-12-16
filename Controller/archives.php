<?php
include('./db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID from the form
    $id = $_POST['id'];

    // Retrieve data from the inventory_db for the selected ID
    $inventory_query = "SELECT * FROM inventory_db WHERE id = ?";
    $stmt = mysqli_prepare($data, $inventory_query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);

        // Insert the data into archive_db using prepared statement
        $insert_query = "INSERT INTO archive_db (Property_Description, Locator, Current_Property_Number, Old_Property_Number, Unit_Measure, Unit_Value, Quantity, Year_Acquired, Date_Acquired, Asset_Category, Asset_Number, Asset_Title, Issued_To, Issued_From, ARE_PAR_ICS_Number, Cancelled_Number, PRS_Number, Estimated_Useful_Life, Fund_Cluster, Fund_Admin_Code, Fund_Admin_Title, Purchase_Order_Contract_Number, Supplier, Acquired_through, Remarks, photo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt_insert = mysqli_prepare($data, $insert_query);
        mysqli_stmt_bind_param($stmt_insert, "ssssssssssssssssssssssssss", 
            $row['Property_Description'], $row['Locator'], $row['Current_Property_Number'], $row['Old_Property_Number'], 
            $row['Unit_Measure'], $row['Unit_Value'], $row['Quantity'], $row['Year_Acquired'], $row['Date_Acquired'], 
            $row['Asset_Category'], $row['Asset_Number'], $row['Asset_Title'], $row['Issued_To'], $row['Issued_From'], 
            $row['ARE_PAR_ICS_Number'], $row['Cancelled_Number'], $row['PRS_Number'], $row['Estimated_Useful_Life'], 
            $row['Fund_Cluster'], $row['Fund_Admin_Code'], $row['Fund_Admin_Title'], $row['Purchase_Order_Contract_Number'], 
            $row['Supplier'], $row['Acquired_Through'], $row['Remarks'], $row['photo']);

        $insert_result = mysqli_stmt_execute($stmt_insert);

        // Check if the insertion was successful
        if ($insert_result) {
            // Delete the row from inventory_db
            $delete_query = "DELETE FROM inventory_db WHERE id = ?";
            $stmt_delete = mysqli_prepare($data, $delete_query);
            mysqli_stmt_bind_param($stmt_delete, "i", $id);
            $delete_result = mysqli_stmt_execute($stmt_delete);

            // Check if the deletion was successful
            if ($delete_result) {
                // Redirect to the inventory_index.php page after successful transfer and deletion
                header("Location: ../inventory_index.php");
                exit();
            } else {
                // Handle the deletion error
                echo "Error deleting row from inventory_db: " . mysqli_error($data);
            }
        } else {
            // Handle the insertion error
            echo "Error inserting row into archive_db: " . mysqli_error($data);
        }
    } else {
        // Handle the query error
        echo "Error retrieving row from inventory_db: " . mysqli_error($data);
    }

    // Close the database connection
    mysqli_close($data);
}
?>
