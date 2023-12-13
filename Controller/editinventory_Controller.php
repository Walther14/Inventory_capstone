<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../Controller/db.php');

// Ensure that the form fields are set
if (
    isset($_POST['id'], $_POST['Property_Description'], $_POST['Locator'], $_POST['Current_Property_Number'], $_POST['Old_Property_Number'],
    $_POST['Unit_Measure'], $_POST['Unit_Value'], $_POST['Quantity'], $_POST['Year_Acquired'], $_POST['Date_Acquired'], $_POST['Asset_Category'],
    $_POST['Asset_Number'], $_POST['Asset_Title'], $_POST['Issued_To'], $_POST['Issued_From'], $_POST['ARE_PAR_ICS_Number'], $_POST['Cancelled_Number'],
    $_POST['PRS_Number'], $_POST['Estimated_Useful_Life'], $_POST['Fund_Cluster'], $_POST['Fund_Admin_Code'], $_POST['Fund_Admin_Title'],
    $_POST['Purchase_Order_Contract_Number'], $_POST['Supplier'], $_POST['Acquired_through'], $_POST['Remarks'])
) {
    // Assign values from POST data
    $id = $_POST['id'];
    $property_description = $_POST['Property_Description'];
    $locator = $_POST['Locator'];
    $current_property_Number = $_POST['Current_Property_Number'];
    $old_property_number = $_POST['Old_Property_Number'];
    $unit_measure = $_POST['Unit_Measure'];
    $unit_value = $_POST['Unit_Value'];
    $quantity = $_POST['Quantity'];
    $year_acquired = $_POST['Year_Acquired'];
    $date_acquired = $_POST['Date_Acquired'];
    $asset_category = $_POST['Asset_Category'];
    $asset_number = $_POST['Asset_Number'];
    $asset_title = $_POST['Asset_Title'];
    $issued_to = $_POST['Issued_To'];
    $issued_from = $_POST['Issued_From'];
    $aRE_PAR_ICS_number = $_POST['ARE_PAR_ICS_Number'];
    $cancelled_number = $_POST['Cancelled_Number'];
    $pRS_number = $_POST['PRS_Number'];
    $estimated_useful_life = $_POST['Estimated_Useful_Life'];
    $fund_cluster = $_POST['Fund_Cluster'];
    $fund_admin_code = $_POST['Fund_Admin_Code'];
    $fund_admin_title = $_POST['Fund_Admin_Title'];
    $purchase_order_contract_number = $_POST['Purchase_Order_Contract_Number'];
    $supplier = $_POST['Supplier'];
    $acquired_through = $_POST['Acquired_through'];
    $remarks = $_POST['Remarks'];

    // Check if a file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get the temporary file name
        $tempName = $_FILES['image']['tmp_name'];

        // Read the file contents into a variable
        $photo = file_get_contents($tempName);

        // Escape the binary data to prevent SQL injection
        $photo = $data->real_escape_string($photo);
    } else {
        // Handle file upload error if needed
        $photo = null; // or set a default value
    }

    $sql = "UPDATE inventory_db SET Property_Description='$property_description', Locator='$locator',  Current_Property_Number='$current_property_Number', Old_Property_Number='$old_property_number',
 Unit_Measure='$unit_measure', Unit_Value='$unit_value', Quantity='$quantity', Year_Acquired='$year_acquired', Date_Acquired='$date_acquired', Asset_Category='$asset_category',
 Asset_Number='$asset_number', Asset_Title='$asset_title', Issued_To='$issued_to', Issued_From='$issued_from', ARE_PAR_ICS_Number='$aRE_PAR_ICS_number',
 Cancelled_Number='$cancelled_number', PRS_Number='$pRS_number', Estimated_Useful_Life='$estimated_useful_life', Fund_Cluster='$fund_cluster',
 Fund_Admin_Code='$fund_admin_code', Fund_Admin_Title='$fund_admin_title', Purchase_Order_Contract_Number='$purchase_order_contract_number', Supplier='$supplier', Acquired_through='$acquired_through',
 Remarks='$remarks', Photo='$photo' WHERE id='$id'";

    if ($data->query($sql) === TRUE) {
        header("Location: ../inventory_index.php");
    } else {
        echo "Error updating record: " . $data->error;
    }

    $data->close();
} else {
    echo "Error: Missing required form fields.";
}
?>
