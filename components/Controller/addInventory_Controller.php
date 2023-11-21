<?php
include('./db.php');

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
$fund_admin_title = $_POST['Fund_Admin_Title'];
$purchase_order_contract_number = $_POST['Purchase_Order_Contract_Number'];
$supplier = $_POST['Supplier'];
$acquired_through = $_POST['Acquired_through'];
$remarks = $_POST['Remarks'];

$insert = "INSERT INTO inventory_db (Property_Description, Locator, Current_Property_Number, Old_Property_Number, Unit_Measure, Unit_Value, Quantity, Year_Acquired, Date_Acquired, Asset_Category, Asset_Number, Asset_Title, Issued_To, Issued_From, ARE_PAR_ICS_Number, Cancelled_Number, PRS_Number, Estimated_Useful_Life, Fund_Cluster, Fund_Admin_Title, Purchase_Order_Contract_Number, Supplier, Acquired_through, Remarks) VALUES ('$property_description', '$locator', '$current_property_Number', '$old_property_number', '$unit_measure', '$unit_value', '$quantity', '$year_acquired', '$date_acquired', '$asset_category', '$asset_number', '$asset_title', '$issued_to', '$issued_from', '$aRE_PAR_ICS_number', '$cancelled_number', '$pRS_number', '$estimated_useful_life', '$fund_cluster', '$fund_admin_title', '$purchase_order_contract_number', '$supplier', '$acquired_through', '$remarks')";

if ($data->query($insert) === TRUE) {
    header("Location: ../inventory.php");
    exit();
} else {
    echo "Error: " . $insert . "<br>" . $data->error;
}

$data->close();
?>
